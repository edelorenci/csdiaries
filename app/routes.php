<?php

/*
|--------------------------------------------------------------------------
| Children's Science Diaries Routes
|--------------------------------------------------------------------------
|
*/


/*
----------------------------------------------------------------------------------
Home page
----------------------------------------------------------------------------------
*/

Route::get('/', function() {			
	return View::make('index');
});

/*
---------------------------------------------------------------------------------
User
---------------------------------------------------------------------------------
*/

Route::get('/signup', 'UserController@getSignup'); 
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', ['before' => 'csrf', 'uses' => 'UserController@postSignup'] );
Route::get('/logout', ['before' => 'auth', 'uses' => 'UserController@getLogout'] );
Route::post('/login', ['before' => 'csrf', 'uses' => 'UserController@postLogin'] );

/*
---------------------------------------------------------------------------------
Diary 
---------------------------------------------------------------------------------
*/

Route::get('/diary', 'DiaryController@getIndex');
Route::get('/diary/create', 'DiaryController@getCreate');
Route::post('/diary/create', 'DiaryController@postCreate');
Route::get('/diary/list', 'DiaryController@getList');       // List diaries of authenticated user
Route::post('/diary/list', 'DiaryController@postList');     // List diaries of authenticated user

/*
---------------------------------------------------------------------------------
Pages
__________________________________________________________________________________
*/

Route::get('/page/add-data/{id}', 'PageController@getAddData'); 
Route::post('/page/add-data/{id}', 'PageController@postAddData');

/*
---------------------------------------------------------------------------------
Debugging the system
---------------------------------------------------------------------------------
*/

Route::controller('debug', 'DebugController');





