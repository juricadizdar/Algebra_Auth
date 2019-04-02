<?php 

class Token
{
	private function __construct(){}
	
	public static function generate()
	{
		return Session::put('CSRF_token', md5(uniqid()));
	}
	
	public static function check($token)
	{
		if(Session::get('CSRF_token') === $token){
			Session::destroy('CSRF_token');
			return true;
		}
		return false;
	}
}