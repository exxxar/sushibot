<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use \ATehnix\VkClient\Requests\Request as VkRequest;
use \ATehnix\VkClient\Auth as VkAuth;
use \Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/', function () {
    $products = \App\Product::getLatestProducts();
    $categories = \App\Product::getAllCategroies();

    $defaultCat = rand(0,count($categories)-1);

    return view('main.main',compact('products','categories','defaultCat'));
});




Route::get('vkauth', function (Request $request,VkAuth $auth) {
    echo "<a href='{$auth->getUrl()}'> Войти через VK.Com </a><hr>";

    if ($request->exists('code')) {
        echo 'Token: '.$auth->getToken($request->exists('code'));
    }
});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get("/", "HomeController@index");

    Route::post('/search', 'HomeController@search')
        ->name('users.search');
    Route::get('/search_ajax/', 'HomeController@searchAjax')
        ->name('users.ajax.search');

    Route::resources([
        'users' => 'UsersController',
        'ingredients' => 'IngredientController',
        'prizes' => 'PrizeController',
        'products' => 'ProductController',
        'promocodes' => 'PromocodeController',
    ]);
});

