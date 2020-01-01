<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

function mainMenu($bot, $message)
{
    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $price= $bot->userStorage()->get("basket") ?? null;

    $keyboard = [
        ["\xF0\x9F\x8D\xB1Меню","\xF0\x9F\x92\xB0Корзина".($price==null?"(0 ₽)":"$price ₽")],
        ["\xF0\x9F\x8D\xA3Собрать ролл"],
        ["\xF0\x9F\x8E\xB0Розыгрыш"],
        ["\xF0\x9F\x92\xADО Нас"],
    ];
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

function filterMenu($bot, $message)
{
    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $upper_layer = $bot->userStorage()->get("upper_layer") ?? null;
    $inner_filling = $bot->userStorage()->get("inner_filling") ?? null;
    $form = $bot->userStorage()->get("form") ?? null;
    $count = $bot->userStorage()->get("count") ?? null;
    $price= $bot->userStorage()->get("price") ?? null;


    $keyboard = [
        ["Результат","В корзину".($price==null?"(0 ₽)":"$price ₽")],
        ["Верхнее покрытие" . ($upper_layer == null ? "\xE2\x9D\x8E" : "\xE2\x9C\x85"), "Начинка" . ($inner_filling == null ? "\xE2\x9D\x8E" : "\xE2\x9C\x85")],
        ["Форма ролла" . ($form == null ? "\xE2\x9D\x8E" : "\xE2\x9C\x85"), "Количество" . ($count == null ? "\xE2\x9D\x8E" : "\xE2\x9C\x85")],
        ["Сбросить фильтр"],
        ["Главное меню"],
    ];
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

$botman->hears('Сбросить фильтр', function ($bot) {
    $bot->userStorage()->delete();
    filterMenu($bot, "Вы сбросили собранный ролл");
});

$botman->hears('Форма ролла.*', function ($bot) {
    $bot->reply('Форма ролла');
});

$botman->hears('Количество.*', function ($bot) {
    $bot->reply('Количество');
});

$botman->hears('Верхнее покрытие.*', function ($bot) {
    $bot->reply('Верхнее покрытие');
});

$botman->hears('Начинка.*', function ($bot) {
    $bot->reply('Начинка');
});

$botman->hears('/start|Главное меню', function ($bot) {
    mainMenu($bot,'Главное меню');
});


//$botman->hears('Start conversation', BotManController::class.'@startConversation');
