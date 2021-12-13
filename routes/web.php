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
    return view('pages/home');
})->name('home');

Route::get('/stats', 'StatsController@index');
Route::get('/stats/{stats_link}', 'StatsController@showСertainStats');

Route::post('/create', 'ShortLinkController@create');
Route::get('{short}', 'ShortLinkController@open');
