<?php 
	include_once 'core/init.php';
	
	Helper::getHeader('header', 'Home');
	
	include_once 'includes/notifications.php';
?>
	
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="jumbotron">
					  <h1 class="display-4">Hello, world!</h1>
					  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
					  <hr class="my-4">
					  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
					  <a class="btn btn-primary btn-lg" href="login.php" role="button">Sign In</a>
					  or
					  <a class="btn btn-primary btn-lg" href="register.php" role="button">Create an account</a>
					</div>
				</div>
			</div>

<?php 
	Helper::getFooter('footer');
?>


		
<?php 
	
	/*//$user = 'peroždero';
	//$pass = 1234567890;
	
	//$db = DB::getInstance()->action('SELECT * ','users', array('username','=',$user));
	$db = DB::getInstance()->get('name, salt','users', array('id','=',1));
	$db = DB::getInstance()->find(1,'users');
	//$db = DB::getInstance()->destroy('users',array('id','=',2));
	//dump($db->results()[0]->username);
	
	
	$user = array(
		'username' => 'perožderokro',
		'password' => '123456789454',
		'salt' => 'stdurgutr',
		'name' => 'Perooad'
	);
	
	$user1 = array(
		'password' => '664567474',
		'salt' => 'hljhjh'
	);
	
	
	$db=DB::getInstance()->insert('users',$user);
	
	$db = DB::getInstance()->update('users', $user1, array('id','=',9));
	dump($db);
	// SQL injection   1 OR 1 = 1 ???? 
	
	// query('SELECT * FROM users WHERE name=? AND password=?', array($user, $pass))*/
	
	