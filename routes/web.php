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

Route::get('/', function () {
    return view('frontside.home.index');
});
Route::get('/about', function () {
    return view('frontside.about.index');
});
Route::get('/blog', function () {
    return view('frontside.blog.index');
});
Route::get('/careers', function () {
    return view('frontside.careers.index');
});
Route::get('/contact', function () {
    return view('frontside.contact.index');
});
Route::get('/service', function () {
    return view('frontside.service.index');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::middleware('admin.user')->name('voyager.')->group(function () {
        Route::match(['get', 'post'], '/services/{service}/order-slider', [ServiceController::class, 'orderSlider'])
            ->name('services.order-slider');
    });
});
