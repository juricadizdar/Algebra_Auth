<?php 
	include_once 'core/init.php';
	
	$user = new User();
	
	if(!$user->check()){
		Redirect::to('index');
	}
	
	Helper::getHeader('header', 'Dashbord');
	
	include_once 'includes/notifications.php';
	?>
	
	<h1>Dashbord</h1>
	<a href="logout.php">Logout</a>
	
	<?php
	Helper::getFooter('footer');
?>