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
use App\Http\Middleware\checkAdmin;
use App\Http\Middleware\checkManager;
use App\Http\Middleware\checkUser;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/testRedis', 'RedisController@testRedis')->name('profile');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testQueueJob', 'RedisController@testQueueJob')->name('Queue.testJob');

//admin
Route::get('/admin', function () {
    return 'Admin access';
})->middleware(checkAdmin::class)->name('admin');

//manager
Route::get('/manager', function () {
    return 'Manager access';
})->middleware(checkManager::class)->name('manager');

//user
Route::get('/user', function () {
    return 'User access';
})->middleware(checkUser::class)->name('user');
