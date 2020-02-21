<?php

namespace App\Http\Controllers;

use App\Enums\UseIngredientType;
use App\Ingredient;
use App\Prize;
use App\Promocode;
use App\User;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class WelcomeController extends Controller
{

    public function phone(Request $request)
    {
        $user = User::where("telegram_chat_id", $request->get("chat_id"))->first();

        return response()
            ->json([
                "hasPhone" => !is_null($user->phone)
            ]);
    }

    public function getList()
    {
        $prizes = Prize::all();
        return response()
            ->json([
                "card_list" => $prizes
            ]);
    }

    public function promoValidate(Request $request)
    {
        $promocode = $request->get("promocode") ?? null;
        $phone = $request->get("phone") ?? null;
        $chat_id = $request->get("chat_id") ?? null;

        if (is_null($promocode) || is_null($chat_id))
            return response()
                ->json([
                    "message" => "Ошибка передачи данных",
                    "status" => "error"
                ]);

        $user = User::where("telegram_chat_id", $chat_id)
            ->first();

        if (is_null($user->phone)) {
            $user->phone = $phone;
            $user->save();
        }

        $promocode = Promocode::where("code", $promocode)
            ->first();

        if (is_null($promocode))
            return response()
                ->json([
                    "message" => "Такой промокод не существует",
                    "status" => "error"
                ]);

        if ($promocode->activated == true)
            return response()
                ->json([
                    "message" => "Такой промокод уже был активирован",
                    "status" => "error"
                ]);


        return response()
            ->json([
                "code_id"=>$promocode->id,
                "status" => "success"
            ]);
    }

    public function check(Request $request)
    {
        $code_id = $request->get("code_id");
        $chat_id = $request->get("chat_id");

        $prizes = Prize::all();
        $prizes->shuffle();

        $user = User::where("telegram_chat_id",$chat_id)->first();


        $promocode = Promocode::find($code_id);
        $promocode->activated = true;
        $promocode->user_id = $user->id;
        $promocode->save();

        $prize = $prizes->random(1);

        Telegram::sendMessage([
            'chat_id' => env("CHANNEL_ID"),
            'parse_mode' => 'Markdown',
            'text' => sprintf("*Заявка на получение приза*\n_%s_\n_%s_\nПриз:[%s]%s",
                $user->name,
                $user->phone,
                $prize[0]->id,
                $prize[0]->title),
            'disable_notification' => 'false'
        ]);


        return response()
            ->json([
                "results" => $prize
            ]);
    }

    public function sendRequest(Request $request) {
        $name = $request->get("name")??'';
        $phone = $request->get("phone")??'';
        $message = $request->get("message")??'';
        Telegram::sendMessage([
            'chat_id' => env("CHANNEL_ID"),
            'parse_mode' => 'Markdown',
            'text' => sprintf("*Заявка на обратный звонок*\n_%s_\n_%s_\n%s",$name,$phone,$message),
            'disable_notification' => 'false'
        ]);
    }

    public function getIngredients(Request $request,$type){
        return response()
            ->json([
                "ingredients"=>Ingredient::where("use_type",$type)
                    ->orWhere("use_type",0)
                    ->get()
            ]);
    }
}
