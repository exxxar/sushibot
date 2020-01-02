<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

function mainMenu($bot, $message)
{
    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $count = $bot->userStorage()->get("basket_count") ?? null;

    $keyboard = [
        ["\xF0\x9F\x8D\xB1Меню", "\xF0\x9F\x92\xB0Корзина" . ($count == null ? "(0)" : "$count")],
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
    $price = $bot->userStorage()->get("price") ?? null;


    $keyboard = [
        ["Результат", "В корзину" . ($price == null ? "(0 ₽)" : "$price ₽")],
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

$botman->hears('.*Собрать ролл.*', function ($bot) {
    filterMenu($bot, "Собери свой ролл сам!");
});

$botman->hears("\xF0\x9F\x8D\xB1Меню", function ($bot) {
    $categories = \App\Product::all()->unique('category');

    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $inline_keyboard = [];
    $tmp_menu = [];
    foreach ($categories as $key => $category) {
        array_push($inline_keyboard, [["text" => $category["category"], "callback_data" => "/category 0 " . $category["category"]]]);
    }
    $bot->sendRequest("sendMessage",
        [
            "chat_id" => "$id",
            "text" => "Выбор категории",
            "parse_mode" => "Markdown",
            'reply_markup' => json_encode([
                'inline_keyboard' => $inline_keyboard,
            ])
        ]);
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
    $bot->reply("https://telegra.ph/O-Nas-01-01");
});


$botman->hears('/start|Главное меню', function ($bot) {
    mainMenu($bot, 'Главное меню');
});

$botman->hears('/category ([0-9]+) ([а-яА-Я)(_- ])', function ($bot, $page, $category) {

    $telegramUser = $bot->getUser();
    $id = $telegramUser->getId();

    $products = \App\Product::where("category", $category)
        ->take(10)
        ->skip($page * 10)
        ->get();

    foreach ($products as $key => $product) {
        $keybord = [
            [
                ['text' => "\xE2\x86\xAAДетальнее", 'callback_data' => "/product_info " . $product->id]
            ]
        ];

        if (count($product) - 1 == $key && $page == 0)
            array_push($keybord, [
                ['text' => "\xE2\x8F\xA9Далее", 'callback_data' => "/category  " . ($page + 1) . " " . $product->category]
            ]);

        if (count($product) - 1 == $key && $page != 0)
            array_push($keybord, [
                ['text' => "\xE2\x8F\xAAНазад", 'callback_data' => "/category  " . ($page - 1) . " " . $product->category],
                ['text' => "\xE2\x8F\xA9Далее", 'callback_data' => "/category  " . ($page + 1) . " " . $product->category]
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
    $product = \App\Product::find($productId);
    $bot->reply($productId);
});


$botman->hears('/lottery', BotManController::class . '@lotteryConversation');
