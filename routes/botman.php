<?php

use App\Http\Controllers\BotManController;
use App\Prize;
use App\Product;
use App\User;
use BotMan\BotMan\BotMan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

$botman = resolve('botman');

function createUser($bot)
{
    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();
    $username = $telegramUser->getUsername();
    $lastName = $telegramUser->getLastName();
    $firstName = $telegramUser->getFirstName();

    $user = User::where("telegram_chat_id", $id)->first();
    if ($user == null)
        $user = \App\User::create([
            'name' => $username ?? "$id",
            'email' => "$id@t.me",
            'password' => bcrypt($id),
            'fio_from_telegram' => "$firstName $lastName",
            'telegram_chat_id' => $id,
            'is_admin' => false,
            'phone' => '',
            'birthday' => '',
        ]);
    return $user;
}

function basketMenu($bot, $message)
{
    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $basket = json_decode($bot->userStorage()->get("basket")) ?? [];

    $count = count($basket) ?? null;

    foreach ($basket as $product) {
        $count += $product->price;
    }


    $keyboard = [
        ["Оформить заказ " . ($count == null ? "(0₽)" : "(" . $count . "₽)")],
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

function mainMenu($bot, $message)
{
    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $basket = json_decode($bot->userStorage()->get("basket")) ?? [];

    $count = count($basket) ?? null;

    foreach ($basket as $product) {
        $count += $product->price;
    }

    $custom_order_price = $bot->userStorage()->get("order") != null ? json_decode($bot->userStorage()->get("order"))->price : 0;
    $count += $custom_order_price;

    $keyboard = [
        ["\xF0\x9F\x8D\xB1Меню", "\xF0\x9F\x92\xB0Корзина" . ($count == null ? "(0₽)" : "(" . $count . "₽)")],
        ["\xF0\x9F\x8D\xA3Собрать ролл"],
        ["\xF0\x9F\x8E\xB0Розыгрыш"],
        ["\xF0\x9F\x92\xADО Нас"],
        [
            ["text"=>"Отправить локацию","request_location"=>true]
        ],
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

    $upper_layer = $bot->userStorage()->get("upper") ?? null;
    $inner_filling = $bot->userStorage()->get("inner") ?? null;
    $form = $bot->userStorage()->get("form") ?? null;
    $count = $bot->userStorage()->get("count") ?? null;

    $keyboard = [
        ["Заказать свой ролл"],
        ["Покрытие" . ($upper_layer == null ? "\xE2\x9D\x8E" : "\xE2\x9C\x85"), "Начинка" . ($inner_filling == null ? "\xE2\x9D\x8E" : "(" . count(json_decode($inner_filling, true)) . ")\xE2\x9C\x85")],
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

    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $form = $bot->userStorage()->get("form") ?? -1;

    $keyboard = [
        [
            ['text' => "Круглая" . ($form == 0 ? "\xE2\x9C\x85" : ""), 'callback_data' => "/filter form 0"],
            ['text' => "Квадратная" . ($form == 1 ? "\xE2\x9C\x85" : ""), 'callback_data' => "/filter form 1"],
            ['text' => "Треугольная" . ($form == 2 ? "\xE2\x9C\x85" : ""), 'callback_data' => "/filter form 2"],
        ],

    ];


    $bot->sendRequest("sendMessage",
        [
            "chat_id" => "$id",
            "text" => "Форма ролла",
            'reply_markup' => json_encode([
                'inline_keyboard' =>
                    $keyboard
            ])
        ]);
});

$botman->hears('Количество.*', function ($bot) {
    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $keyboard = [];

    $count = $bot->userStorage()->get("count") ?? -1;

    $tmp_keyboard_row = [];
    for ($i = 1; $i <= 40; $i++) {

        array_push($tmp_keyboard_row, ['text' => "$i шт." . ($i == $count ? "\xE2\x9C\x85" : ""), 'callback_data' => "/filter count $i"]);

        if ($i % 5 == 0) {
            array_push($keyboard, $tmp_keyboard_row);
            $tmp_keyboard_row = [];
        }
    }

    $bot->sendRequest("sendMessage",
        [
            "chat_id" => "$id",
            "text" => "Колличество роллов",
            'reply_markup' => json_encode([
                'inline_keyboard' =>
                    $keyboard
            ])
        ]);
});

$botman->hears('Покрытие.*', function ($bot) {
    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $ingridients = \App\Ingredient::where("use_type", "=", "0")
        ->orWhere("use_type", "=", "1")
        ->get();

    $keyboard = [];

    $upper = $bot->userStorage()->get("upper") ?? -1;

    $tmp_keyboard_row = [];
    foreach ($ingridients as $key => $value) {

        array_push($tmp_keyboard_row, ['text' => $value->title . ($upper == $key ? "\xE2\x9C\x85" : ""), 'callback_data' => "/filter upper " . $key]);

        $index = $key + 1;
        if ($index % 2 == 0 || count($ingridients) == $index) {
            array_push($keyboard, $tmp_keyboard_row);
            $tmp_keyboard_row = [];
        }
    }

    $bot->sendRequest("sendMessage",
        [
            "chat_id" => "$id",
            "text" => "Форма ролла",
            'reply_markup' => json_encode([
                'inline_keyboard' =>
                    $keyboard
            ])
        ]);
});

$botman->hears('Начинка.*', function ($bot) {
    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();


    $ingridients = \App\Ingredient::where("use_type", "=", "0")
        ->orWhere("use_type", "=", "2")
        ->get();

    $keyboard = [];

    $inner = json_decode($bot->userStorage()->get("inner"), true) ?? [];

    $tmp_keyboard_row = [];
    foreach ($ingridients as $key => $value) {


        array_push($tmp_keyboard_row, ['text' => $value->title . (in_array($key, $inner) ? "\xE2\x9C\x85" : ""), 'callback_data' => "/filter inner " . $key]);

        $index = $key + 1;
        if ($index % 2 == 0 || count($ingridients) == $index) {
            array_push($keyboard, $tmp_keyboard_row);
            $tmp_keyboard_row = [];
        }
    }

    $bot->sendRequest("sendMessage",
        [
            "chat_id" => "$id",
            "text" => "Форма ролла",
            'reply_markup' => json_encode([
                'inline_keyboard' =>
                    $keyboard
            ])
        ]);
});

$botman->hears('.*Корзина.*', function ($bot) {

    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $basket = json_decode($bot->userStorage()->get("basket")) ?? [];

    if (count($basket) == 0) {
        $bot->reply("Корзина пуста:(");
        return;
    }

    basketMenu($bot, "Cодержимое корзины");


    foreach ($basket as $key => $product) {
        $keybord = [
            [
                ['text' => "\xF0\x9F\x91\x89Детальнее", 'callback_data' => "/product_info " . $product->id],
                ['text' => "Убрать (" . $product->price . "₽)", 'callback_data' => "/remove_from_basket " . $product->id]
            ],
        ];

        $bot->sendRequest("sendPhoto",
            [
                "chat_id" => "$id",
                "photo" => $product->image_url,
                'reply_markup' => json_encode([
                    'inline_keyboard' =>
                        $keybord
                ])
            ]);


    }


});

$botman->hears('.*Собрать ролл.*', function ($bot) {
    filterMenu($bot, "Собери свой ролл сам!");
});

$botman->hears("\xF0\x9F\x8D\xB1Меню", function ($bot) {
    $categories = \App\Product::all()->unique('category');

    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();


    $bot->sendRequest("sendPhoto",
        [
            "chat_id" => "$id",
            "photo" => "https://sun9-35.userapi.com/c205328/v205328682/56913/w8tBXIcG91E.jpg",
            "parse_mode" => "Markdown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ["text" => "Акци и скидки", "url" => "https://t.me/skidki_dn_bot"]
                    ]
                ],
            ])
        ]);

    foreach ($categories as $key => $category) {
        //array_push($inline_keyboard, [["text" => $category->category, "callback_data" => "/category 0 $key"]]);

        $bot->sendRequest("sendPhoto",
            [
                "chat_id" => "$id",
                "caption" => $category->category,
                "photo" => $category->image_url,
                "parse_mode" => "Markdown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ["text" => "\xF0\x9F\x91\x89Детальнее", "callback_data" => "/category 0 $key"]
                        ]
                    ],
                ])
            ]);
    }

});

$botman->hears('.*Розыгрыш', function ($bot) {
    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $keybord = [
        [
            ['text' => "Условия розыгрыша и призы", 'url' => "https://telegra.ph/Usloviya-rozygrysha-01-01"]
        ],
        [
            ['text' => "Ввести код и начать", 'callback_data' => "/lottery"]
        ]
    ];
    $bot->sendRequest("sendMessage",
        [
            "chat_id" => "$id",
            "text" => "Розыгрыш призов",
            "parse_mode" => "Markdown",
            'reply_markup' => json_encode([
                'inline_keyboard' =>
                    $keybord
            ])
        ]);
});

$botman->hears('.*О нас', function ($bot) {
    $bot->reply("https://telegra.ph/O-Nas-02-11");
});


$botman->hears('/start|Главное меню', function ($bot) {
    createUser($bot);
    mainMenu($bot, 'Главное меню');
})->stopsConversation();

$botman->hears('/category ([0-9]+) ([0-9]+)', function ($bot, $page, $catIndex) {

    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $categories = Product::all()->unique('category');

    $products = \App\Product::where("category", $categories[$catIndex]->category)
        ->where("is_active", 1)
        ->take(10)
        ->skip($page * 10)
        ->get();

    if (count($products) == 0) {
        $bot->reply("Товары в категории не найдены");
        return;
    }

    foreach ($products as $key => $product) {
        $keybord = [
            [
                ['text' => "\xF0\x9F\x91\x89Детальнее", 'callback_data' => "/product_info " . $product->id],
                ['text' => "\xE2\x86\xAAВ корзину(" . $product->price . "₽)", 'callback_data' => "/add_to_basket " . $product->id]
            ],

        ];

        if (count($products) - 1 == $key && $page == 0 && count($products) == 10)
            array_push($keybord, [
                ['text' => "\xE2\x8F\xA9Далее", 'callback_data' => "/category  " . ($page + 1) . " " . $catIndex]
            ]);

        if (count($products) - 1 == $key && $page != 0 && count($products) == 10)
            array_push($keybord, [
                ['text' => "\xE2\x8F\xAAНазад", 'callback_data' => "/category  " . ($page - 1) . " " . $catIndex],
                ['text' => "\xE2\x8F\xA9Далее", 'callback_data' => "/category  " . ($page + 1) . " " . $catIndex]
            ]);

        if (count($products) - 1 == $key && $page != 0 && count($products) < 10)
            array_push($keybord, [
                ['text' => "\xE2\x8F\xAAНазад", 'callback_data' => "/category  " . ($page - 1) . " " . $catIndex],
            ]);

        $bot->sendRequest("sendPhoto",
            [
                "chat_id" => "$id",
                "photo" => $product->image_url,
                'reply_markup' => json_encode([
                    'inline_keyboard' =>
                        $keybord
                ])
            ]);
    }
});

$botman->hears('/product_info ([0-9]+)', function ($bot, $productId) {

    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $product = \App\Product::find($productId);

    $message = "*" . $product->title . "*\n"
        . "_" . $product->description . "_\n"
        . "*Вес*:" . $product->mass . "гр.\n"
        . "*Цена*:" . $product->price . "₽\n"
        . "*Порция*:" . $product->portion_count . "шт.\n";


    $keyboard = [

        [
            ['text' => "\xE2\x86\xAAВ корзину(" . $product->price . "₽)", 'callback_data' => "/add_to_basket " . $product->id]
        ]
    ];

    $bot->sendRequest("sendPhoto",
        [
            "chat_id" => "$id",
            "photo" => $product->image_url,
            "caption" => $message,
            "parse_mode" => "Markdown",
            'reply_markup' => json_encode([
                'inline_keyboard' =>
                    $keyboard
            ])
        ]);

});


$botman->hears('/lottery', BotManController::class . '@lotteryConversation');
$botman->hears('/add_to_basket ([0-9]+)', function ($bot, $prodId) {
    $basket = json_decode($bot->userStorage()->get("basket"), true) ?? [];

    $product = Product::find($prodId);

    array_push($basket, $product);

    $bot->userStorage()->save([
        'basket' => json_encode($basket)
    ]);

    mainMenu($bot, "Товар добавлен в корзину");

});
$botman->hears('/check_lottery_slot ([0-9]+)', function ($bot, $slotId) {


    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $prize = Prize::find($slotId);

    $message = "*" . $prize->title . "*\n"
        . "_" . $prize->description . "_\n";


    $bot->sendRequest("sendPhoto",
        [
            "chat_id" => "$id",
            "photo" => $prize->image_url,
            "caption" => $message,
            "parse_mode" => "Markdown",
        ]);

    $user = User::where("telegram_chat_id", $id)->first();

    $message = "*Заявка на получение приза*\n$message"
        . "*Имя*:" . ($user->fio_from_telegram ?? $user->name) . "\n"
        . "*Телефон*:" . $user->phone . "\n"
        . "*Дата заказа*:" . (Carbon::now()) . "\n";

    try {
        Telegram::sendMessage([
            'chat_id' => env("CHANNEL_ID"),
            'parse_mode' => 'Markdown',
            'text' => $message,
            'disable_notification' => 'true'
        ]);
    } catch (\Exception $e) {
        Log::info("Ошибка отправки заказа в канал!");
    }


});

$botman->hears('/remove_from_basket ([0-9]+)', function ($bot, $prodId) {
    $basket = json_decode($bot->userStorage()->get("basket")) ?? [];

    $basket_tmp = [];

    foreach ($basket as $product) {
        if ($product->id != $prodId)
            array_push($basket_tmp, $product);
    }

    $bot->userStorage()->save([
        'basket' => json_encode($basket_tmp)
    ]);

    if (count($basket_tmp) == 0)
        mainMenu($bot,"Товар удален из корзины");
    else
        basketMenu($bot, "Товар удален из корзины");

});
$botman->hears('Заказать свой ролл', function ($bot) {

    $custom_roll_complete = $bot->userStorage()->get("upper")
        && $bot->userStorage()->get("inner")
        && $bot->userStorage()->get("count")
        && $bot->userStorage()->get("form");

    if (!$custom_roll_complete) {
        $bot->reply("Вы еще не закончили собирать свой ролл!");
        return;
    }
    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $form = ["Круглая", "Квадратная", "Треугоьная"];
    $ingridients_upper = \App\Ingredient::where("use_type", "=", "0")
        ->orWhere("use_type", "=", "1")
        ->get();
    $ingridients_inner = \App\Ingredient::where("use_type", "=", "0")
        ->orWhere("use_type", "=", "2")
        ->get();


    $inner_ingredients = json_decode($bot->userStorage()->get("inner")) ?? [];

    $ingredient_title_inner = $ingredient_title_upper = "";
    $price_ingredient = 0;
    foreach ($inner_ingredients as $i) {

        $price_ingredient += $ingridients_inner[$i]->price;
        $ingredient_title_inner .= "\n_" . $ingridients_inner[$i]->title . "_ " . $ingridients_inner[$i]->mass . " гр. " . $ingridients_inner[$i]->price . "₽";

    }

    $price_ingredient += $ingridients_upper[$bot->userStorage()->get("upper")]->price;
    $ingredient_title_upper .= "\n_" . $ingridients_upper[$bot->userStorage()->get("upper")]->title . "_ "
        . $ingridients_upper[$bot->userStorage()->get("upper")]->mass . " гр. "
        . $ingridients_upper[$bot->userStorage()->get("upper")]->price . "₽\n";

    $count = $bot->userStorage()->get("count") ?? 0;

    $bot->userStorage()->save([
        "order" => json_encode([
            "form" => $form[$bot->userStorage()->get("form")] ?? "Не выбрана",
            "upper" => $ingredient_title_upper,
            "inner" => $ingredient_title_inner,
            "count" => $count,
            "price" => $price_ingredient * $count
        ])
    ]);

    $custom_order_price = $bot->userStorage()->get("order") != null ? json_decode($bot->userStorage()->get("order"))->price + 50 : 0;


    $keyboard = [
        [
            ['text' => "Перейти в корзину (" . $custom_order_price . "₽)", 'callback_data' => "/do_order"],
        ],
    ];

    $bot->sendRequest("sendMessage",
        [
            "chat_id" => "$id",
            "text" => "Спасибо за ваше исскуство!",
            'reply_markup' => json_encode([
                'inline_keyboard' =>
                    $keyboard
            ])
        ]);

});

$botman->hears('/do_order|Оформить заказ.*', BotManController::class . "@orderConversation");

$botman->hears('/filter ([a-zA-Z0-9]+) ([0-9]+)', function ($bot, $name, $value) {


    if ($name != "inner")
        $bot->userStorage()->save([
            "$name" => $value
        ]);
    else {
        $inner_layer = json_decode($bot->userStorage()->get("inner"), true) ?? [];

        if (in_array($value, $inner_layer)) {
            $tmp_array = [];

            foreach ($inner_layer as $inner_item)
                if ($inner_item != $value)
                    array_push($tmp_array, $inner_item);

            $bot->userStorage()->save([
                "$name" => json_encode($tmp_array)
            ]);
        }

        if (count($inner_layer) == 4) {
            $bot->reply("Максимум 4 элемента начинки!");
        }

        Log::info(count($inner_layer));

        if (count($inner_layer) < 4 && !in_array($value, $inner_layer)) {

            Log::info("TEST");

            array_push($inner_layer, $value);


            Log::info(print_r($inner_layer, true));
            Log::info("value=$value");

            $bot->userStorage()->save([
                "$name" => json_encode($inner_layer)
            ]);
        }


    }


    filterMenu($bot, "Так держать, твой рол всё лучше и лучше!");
});
