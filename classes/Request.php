<?php 

class Request
{
	private function __construct(){}
	
	public static function exists($method)
	{
		switch($method){
			
			case 'post':
				return !empty($_POST) ? true : false;
				break;
				
			case 'get':
				return !empty($_GET) ? true : false;
				break;
				
			default:
				return false;
				break;
		}
	}
	
	public static function getPost($item)
	{
		return isset($_POST[$item]) ? $_POST[$item] : false;
	}
	
	public static function get($item)
	{
		return isset($_GET[$item]) ? $_GET[$item] : false;
	}
}






