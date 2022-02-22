<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

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

Route::middleware([])->namespace('App\Http\Controllers\Frontside')->group(function () {
    Route::get('/careers', 'CareerController@index')->name('frontside.careers.index');
    Route::get('/careers/{slug}', 'CareerController@detail')->name('frontside.careers.detail');

    Route::get('/blog', 'PostController@index')->name('frontside.post.index');
    Route::get('/blog/{slug}', 'PostController@detail')->name('frontside.post.detail');
    Route::get('/service/{slug}', 'ServiceController@detail')->name('frontside.service.detail');
    Route::get('/about/{slug}', 'PageController@detail')->name('frontside.page.detail');
});

Route::get('/', function () {
    return view('frontside.home.index');
});
Route::get('/about', function () {
    return view('frontside.about.index');
});

Route::get('/contact', function () {
    return view('frontside.contact.index');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::middleware('admin.user')->name('voyager.')->group(function () {
        Route::match(['get', 'post'], '/services/{service}/order-slider', [ServiceController::class, 'orderSlider'])
            ->name('services.order-slider');
    });
});
