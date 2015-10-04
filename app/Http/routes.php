<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'pets.index', 'uses' => 'PetsController@index']);

Route::get('/pets', ['as' => 'pets.index', 'uses' => 'PetsController@index']);
Route::get('/pets/{pet_id}', ['as' => 'pets.show', 'uses' => 'PetsController@show']);

Route::post('/pets/{pet_id}/donate', ['as' => 'donations.submit', 'uses' => 'DonationsController@makeDonation']);

Route::get('/donate', ['as' => 'donations.general', 'uses' => 'DonationsController@general']);