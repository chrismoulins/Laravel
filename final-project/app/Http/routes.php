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


Route::get('/', 'SiteController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => ['auth','App\Http\Middleware\EditorMiddleware']], function(){
    Route::resource('articles', 'ArticleController');

    Route::resource('pages', 'PageController');

    Route::resource('template', 'TemplateController');

    Route::resource('contentarea', 'ContentAreaController');
});

Route::group(['middleware' => ['auth','App\Http\Middleware\AdminMiddleware']], function(){
    Route::resource('user', 'UserController');
});

Route::resource('site', 'SiteController');

//Route::group(['middleware' => ['auth','App\Http\Middleware\AuthorMiddleware']], function(){

//    Route::get('site/create', 'SiteController');
//    Route::get('site/{id}', 'SiteController');

//});


