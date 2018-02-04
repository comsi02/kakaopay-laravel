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

Route::get('/', function () {
    return view('index');
});

# PC layer
Route::get('/ready/pc/layer', function () { return view('pc/layer/ready'); });

# PC popup
Route::get('/ready/pc/popup', function () { return view('pc/popup/ready'); });

# Mobile 
Route::get('/ready/mobile/redirect', function () { return view('mobile/redirect/approve'); });

# Webview
Route::get('/ready/app/webview', function () { return view('app/webview/ready'); });
