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

Route::get('/', 'PageCon@login');
Route::get('/about','PageCon@about');

//untuk testing
Route::post('/testJson','pageCon@testJson');
Route::post('/updateSup', 'pageCon@updateSup');
Route::get('/editForm', 'PageCon@editForm');