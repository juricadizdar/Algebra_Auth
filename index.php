<?php 
	include_once 'core/init.php';
	
	$user = 'peroždero';
	$pass = 1234567890;
	
	$db = DB::getInstance()->action('SELECT * ','users', array('username','=',$user));
	dump($db);
	
	// SQL injection   1 OR 1 = 1 ???? 
	
	// query('SELECT * FROM users WHERE name=? AND password=?', array($user, $pass))
	
	