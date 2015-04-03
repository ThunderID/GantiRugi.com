<?php namespace App\Http\Controllers\API;

use \App\User as Model;
use \ThunderID\JSend as Jsend;
use Input;

class UserController extends BaseController {

	protected $model;
	
	function __construct(Model $model) 
	{
		parent::__construct();

		$this->model = $model;
	}

	function getAuthenticate()
	{
		$input = Input::only('email', 'password');

		return new Jsend('success', []);
		if (Auth::attempt($credential))
		{
			$response = new Jsend('success', Auth::user()->toArray());
			return Response::json($response->toJson(), 200);
		}
		else
		{
			$response = new Jsend('fail', ['credential' => 'Invalid Username and/or password']);
			return Response::json($response->toJson(), 200);
		}
	}

}
