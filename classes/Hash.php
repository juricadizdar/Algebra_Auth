<?php 

class Hash
{
	private function __construct(){}
	
	public static function salt($length=null)
	{
		return uniqid('',true);
	}
	
	public static function make($string, $salt='')
	{
		return hash('sha256', $string.$salt);
	}
}