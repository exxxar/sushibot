<?php

namespace App\Conversations;

use App\CashBackHistory;
use App\User;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class VipConversation extends Conversation
{
    protected $bot;

    function mainMenu($bot, $message)
    {
        $telegramUser = $bot->getUser();
        $id = $telegramUser->getId();

        $user = User::where("telegram_chat_id",$id)->first();

        if (is_null($user))
            $user=createUser($bot);


        $keyboard = [

        ];

        array_push($keyboard, ["\xF0\x9F\x8D\xB1Новое меню"]);
        if (!$user->is_vip)
            array_push($keyboard, ["\xE2\x9A\xA1Анкета VIP-пользователя"]);
        else
            array_push($keyboard, ["\xE2\x9A\xA1Special CashBack system"]);

        array_push($keyboard,["\xF0\x9F\x8E\xB0Розыгрыш"]);
        array_push($keyboard,["\xF0\x9F\x92\xADО Нас"]);

        $bot->sendRequest("sendMessage",
            [
                "chat_id" => "$id",
                "text" => $message,
                "parse_mode" => "Markdown",
                'reply_markup' => json_encode([
                    'keyboard' => $keyboard,
                    'one_time_keyboard' => false,
                    'resize_keyboard' => true
                ])
            ]);
    }

    public function __construct($bot)
    {
        $telegramUser = $bot->getUser()->getId();
        $this->bot = $bot;
        $this->user = User::where("telegram_chat_id", $telegramUser)->first();
    }


    public function askPhone()
    {
        $question = Question::create('Скажие мне свой телефонный номер в формате 071XXXXXXX')
            ->fallback('Спасибо что пообщался со мной:)!');

        $this->ask($question, function (Answer $answer) {
            $vowels = array("(", ")", "-", " ");
            $tmp_phone = $answer->getText();
            $tmp_phone = str_replace($vowels, "", $tmp_phone);
            if (strpos($tmp_phone, "+38") === false)
                $tmp_phone = "+38" . $tmp_phone;

            Log::info("phone=$tmp_phone");

            $pattern = "/^\+380\d{3}\d{2}\d{2}\d{2}$/";
            if (preg_match($pattern, $tmp_phone) == 0) {
                $this->bot->reply("Номер введен не верно...\n");
                $this->askPhone();
                return;
            } else {
                $this->user->phone = $tmp_phone;
                $this->user->is_vip = true;
                $this->user->cashback_money +=100 ;
                $this->user->save();

                CashBackHistory::create([
                    'amount'=>100,
                    'bill_number'=>'Gift From Isushi',
                    'money_in_bill'=>0,
                    'employee_id'=>null,
                    'user_id'=>$this->user->id,
                    'type'=>0,
                ]);

                $this->bot->reply("Вам начислено 100 руб. CashBack");

                $this->mainMenu("Теперь Вы VIP-пользователь и у вас есть возможность накапливать CashBack!");

            }

        });
    }



    public function sendOrder()
    {

        $basket = json_decode($this->bot->userStorage()->get("basket")) ?? [];

        $order_tmp = "Новая заявка:\n"
            . "*Имя*:" . ($this->user->fio_from_telegram ?? $this->user->name) . "\n"
            . "*Телефон*:" . $this->user->phone . "\n"
            . "*Дата заказа*:" . (Carbon::now()) . "\n*Заказ*:\n";

        $summary = 0;

        foreach ($basket as $key => $product) {
            $summary += $product->price;
            $order_tmp .= ($key + 1) . ")" . $product->title . "_#" . $product->id . "_ " . $product->price . "₽ \n";
        }

        $custom_order = json_decode($this->bot->userStorage()->get("order")) ?? null;

        if ($custom_order) {
            $order_tmp .=
                "*Форма*:" . ($custom_order->form ?? "Не установлено") . "\n"
                . "*Верхний слой*:" . ($custom_order->upper ?? "Не установлено") . "\n"
                . "*Начинка*:" . ($custom_order->inner ?? "Не установлено") . "\n"
                . "*Колличество*:" . ($custom_order->count ?? "Не установлено") . "\n"
                . "*Цена*:" . ($custom_order->price ?? "Не установлено") . "\n+50₽ Нори и рис\n";

            $summary += $custom_order->price + 50;
        }
        $order_tmp .= "*Сумма заказа*:" . $summary . "₽";

        try {
            Telegram::sendMessage([
                'chat_id' => env("CHANNEL_ID"),
                'parse_mode' => 'Markdown',
                'text' => $order_tmp,
                'disable_notification' => 'false'
            ]);
        } catch (\Exception $e) {
            Log::info("Ошибка отправки заказа в канал!");
        }

        $this->bot->userStorage()->save([
            'basket' => json_encode([])
        ]);

        $this->bot->userStorage()->delete();

        $this->mainMenu("Заказ отправлен!");

    }

    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        //
        if (!$this->user->is_vip)
            $this->askPhone();

    }
}
