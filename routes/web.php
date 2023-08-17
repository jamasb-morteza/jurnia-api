<?php

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

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__ . '/auth.php';
Route::controller(App\Http\Controllers\OAuth\GoogleOAuthConstoller::class)->group(function () {
    Route::get('social/google', 'redirect')->name('auth.google');
    Route::get('social/google/callback', 'googleCallback')->name('auth.google.callback');
});
