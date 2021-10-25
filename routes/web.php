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
    App::setLocale('en');
    return view('index');
});
Route::get('/statistics', function () {
    App::setLocale('en');
    return view('statistics');
});
Route::get('/{lang}', function ($lang) {
    App::setLocale($lang);
    return view('index');
});
Route::get('{lang}/statistics', function ($lang) {
    App::setLocale($lang);
    return view('statistics');
});
