<?php 

class Session
{
	private function __construct(){}
	
	public static function exists($name)
	{
		return isset($_SESSION[$name]) ? true : false;
	}
	
	public static function all()
	{
		return $_SESSION;
	}
	
	public static function get($name)
	{
		if(self::exists($name)){
			return $_SESSION[$name];
		}
		
		return false;
	}
	
	public static function put($name, $value)
	{
		return $_SESSION[$name] = $value;
	}
	
	public static function destroy($name)
	{
		if(self::exists($name)){
			unset($_SESSION[$name]);
			return true;
			
		}
		
		return false;
	}

	public static function flash($name, $string = '')
	{
		if(self::exists($name)){
			$session = self::get($name);
			self::destroy($name);
			return $session;
		} else{
			self::put($name, $string);
		}
		return false;
	}

}