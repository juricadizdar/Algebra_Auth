<?php 

class Helper
{
	private function __construct(){}	// zabrana instanciranja objekta
	
	public static function getHeader($file, $title)
	{
		if($file){
			$partial = include_once 'includes/layouts/'.$file.'.php';
			
			return $partial;
		}
		
		return false;
	}
	
	public static function getFooter($file)
	{
		if($file){
			$partial = include_once 'includes/layouts/'.$file.'.php';
			
			return $partial;
		}
		
		return false;
	}
	
	
}