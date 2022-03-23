<?php

use App\Http\Controllers\Admin\CareerSettingController;
use App\Http\Controllers\Admin\HomepageSettingController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/careers', 'CareerController@index')->name('careers.index');
    Route::get('/careers/{slug}', 'CareerController@detail')->name('frontside.careers.detail');

    Route::get('/blog', 'PostController@index')->name('blogs.index');
    Route::get('/blog/search', 'PostController@search')->name('blogs.search');
    Route::get('/blog/{slug}', 'PostController@detail')->name('frontside.post.detail');
    Route::get('/service/{slug}', 'ServiceController@detail')->name('services.show');
    Route::get('/about/{slug}', 'PageController@detail')->name('pages.show');
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

        Route::controller(HomepageSettingController::class)
            ->prefix('homepage-settings')
            ->name('homepage-settings.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::put('/', 'update')->name('update');
                Route::put('/{id}/delete_value', 'delete_value')->name('delete_value');
        });

        Route::controller(CareerSettingController::class)
            ->prefix('career-settings')
            ->name('career-settings.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::put('/', 'update')->name('update');
                Route::put('/{id}/delete_value', 'delete_value')->name('delete_value');
        });
    });
});
