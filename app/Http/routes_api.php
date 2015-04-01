<?php

// ------------------------------------------------------------------------
// ROUTES FOR API
// ------------------------------------------------------------------------
Route::group(['prefix' => 'api', 'namespace' => 'App\Http\Controllers\API'], function() {
	Route::controller('users', 'UserController', [
						'getFind'			=> 'api.users.find',
						'postAuthenticate'	=> 'api.users.login',
						''	=> 'api.users.find',
		]);
});