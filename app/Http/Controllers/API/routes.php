<?php

// ------------------------------------------------------------------------
// ROUTES FOR API
// ------------------------------------------------------------------------
Route::group(['prefix' => 'api'], function() {
	Route::controller('users', '\App\Http\Controllers\API\UserController', [
									'postAuthenticate'		=> 'api.users.authenticate'
	]);
});