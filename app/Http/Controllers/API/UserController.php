<?php namespace App\Http\Controllers\API;

use \App\Model as Model;

class UserAPI extends BaseController {

	protected $model;
	
	function __construct(Model $model) 
	{
		parent::__construct();
		
		$this->model = $model;
	}

}
