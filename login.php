<?php 
	include_once 'core/init.php';
	
	$user = new User();
	
	if($user->check()){
		Redirect::to('dashbord');
	}
	
	$validation = new Validation();
	
	if(Request::exists('post')){
	
		if(Token::check(Request::getPost('CSRF_token'))){
			$validate = $validation->check([
			'username' => [
				'required' => true,
			],
			'password' => [
				'required' => true,
			]
		]);
		
		if ($validate->getPassed()){
			$username = Request::getPost('username');
			$password = Request::getPost('password');
			
			
			if($user->login($username, $password)){
				Redirect::to('dashbord');
			} else {
				Session::flash('danger', 'Sorry, login failed! Please try again.');
				Redirect::to('login');
			}
			
		}
		
		}
		//dd($validate->getErrors());
		//dump($validate->getPassed());
		//$name = Request::getPost('name');
		//dump($name);
	}
	
	Helper::getHeader('header', 'User Login');
	
	include_once 'includes/notifications.php';
?>

<div class="row">
	<div class="clo-md-4 offset-md-4">
		<div class="card">
		  <div class="card-header">
			<h5 class="card-title">User Login</h5>
		  </div>
		  <div class="card-body">			
			<form method="post">
				<input type="hidden" name="CSRF_token" value="<?php echo Token::generate();?>">
				 
				 <div class="form-group">
					<label for="username">Username*</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter your UserName">
					<?php echo $validation->hasError('username') ? '<p class="text-danger">'.$validation->hasError('username').'</p>': '' ?>
				 </div>
				 
				 <div class="form-group">
					<label for="password">Password*</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password">
					<?php echo $validation->hasError('password') ? '<p class="text-danger">'.$validation->hasError('password').'</p>': '' ?>
				 </div>
				 
				 <button class="btn btn-primary">LogIn</button>
			</form>
		  </div>
		</div>
	</div>
</div>



<?php 
	Helper::getFooter('footer');
?>