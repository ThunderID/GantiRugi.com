<?php

// ------------------------------------------------------------------------
// ROUTES FOR ADMIN
// ------------------------------------------------------------------------
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function() {

	Route::get('/', ['as' => 'admin.login', 'uses' => '\App\Http\Controllers\Admin\LoginController@getLogin']);
	Route::post('/', ['as' => 'admin.login.post', 'uses' => '\App\Http\Controllers\Admin\LoginController@postLogin']);
	Route::get('/logout', ['as' => 'admin.logout', 'uses' => '\App\Http\Controllers\Admin\LoginController@getLogout']);

	Route::group([], function(){
		
	});

});