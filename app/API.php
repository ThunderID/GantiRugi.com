<?php namespace App;

class API {

	static protected $url;
	static protected $method;
	static protected $post_field;
	static protected $basic_url = 'http://localhost:8000/api/';

	function __construct() 
	{
	}

	protected static function run()
	{
		// create a new cURL resource
		$ch = curl_init();

		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, self::$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::$method);

		if (self::$post_field)
		{
			curl_setopt($ch, CURLOPT_POSTFIELDS, self::$post_field);
		}


		// grab URL and pass it to the browser
		$results = curl_exec($ch);
		echo self::$url;exit;

		// close cURL resource, and free up system resources
		curl_close($ch);

		return $results;
	}
	
	static function authenticate($email, $password)
	{
		self::$url = self::$basic_url . 'users/authenticate';
		self::$method = 'POST';
		self::$post_field = ['email' => $email, 'password' => $password];

		return self::run();
	}
}