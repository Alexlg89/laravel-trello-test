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

Route::get('/', 'TrelloController@index');
Route::get('card/{cardId}/addComment', 'TrelloController@addRandomComment');
Route::post('/card/create', 'TrelloController@createCard');
Route::put('/card/{cardId}', 'TrelloController@updateCard');
