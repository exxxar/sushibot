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
        Route::get("/list","UsersController@list"); //step 0

        Route::post("/validate","UsersController@promoValidate"); //step 1

        Route::get("/check/{id}","UsersController@check"); //step 2
    });

});


Route::get("/test",function (){
   return "test";
});
