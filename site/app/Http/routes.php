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

Route::get('/', ['as'=>'home', function () {
    return view('welcome');
}]);

Route::get('/logout', function() {
  Auth::logout();
  return redirect()->route('home')->with('success', 'You have been logged out.');
});

Route::get('auth/linkedin', 'Auth\AuthController@redirectToProvider');
Route::get('auth/linkedin/callback', 'Auth\AuthController@handleProviderCallback');