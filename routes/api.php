<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function (){
    Route::post("/phone","UsersController@phone");

    Route::prefix('promo')->group(function (){
        Route::get("/list","UsersController@getList"); //step 0

        Route::post("/validate","UsersController@promoValidate"); //step 1

        Route::post("/check","UsersController@check"); //step 2
    });

});


Route::post('/send-request', function (Request $request) {
    $name = $request->get("name")??'';
    $phone = $request->get("phone")??'';
    $message = $request->get("message")??'';
    Telegram::sendMessage([
        'chat_id' => env("CHANNEL_ID"),
        'parse_mode' => 'Markdown',
        'text' => sprintf("*Заявка на обратный звонок*\n_%s_\n_%s_\n%s",$name,$phone,$message),
        'disable_notification' => 'false'
    ]);
})->name("callback.request");
