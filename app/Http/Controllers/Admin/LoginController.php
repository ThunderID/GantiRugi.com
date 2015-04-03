<?php namespace App\Http\Controllers\Admin;

use Input, Auth, \Illuminate\Support\MessageBag;
use \App\API;

class LoginController extends BaseController {

	/**
	 * login form
	 *
	 * @return void
	 * @author 
	 **/
	function getLogin()
	{
		$this->layout->content = view('admin.login.form');
		return $this->layout;
	}

	/**
	 * handle login
	 *
	 * @return void
	 * @author 
	 **/
	function postLogin()
	{
		$results = json_decode(API::authenticate(Input::get('email'), Input::get('password')));
		dd($results);
		if ($results->status == 'success')
		{
			return 1;
			// return redirect()->route('admin.dashboard.overview');
		}
		else
		{
			return 0;
			// return redirect()->back()->withErrors(new MessageBag(['Invalid Username & Password']));
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return redirect()->route('admin.login');
	}
}
