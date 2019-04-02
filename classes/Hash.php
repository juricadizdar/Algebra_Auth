<?php 

class Hash
{
	private function __construct(){}
	
	public static function salt($length)
	{
		return random_bytes($length);
	}
	
	public static function make($string, $salt='')
	{
		return hash('sha256', $string.$salt);
	}
}