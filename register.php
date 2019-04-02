<?php 
	include_once 'core/init.php';
	
	//$user = new User();
	
	$validation = new Validation();
	
	if(Request::exists('post')){
	
		if(Token::check(Request::getPost('CSRF_token'))){
			$validate = $validation->check([
			'name' => [
				'required' => true,
				'min' => 2,
				'max' => 50
			],
			'username' => [
				'required' => true,
				'min' => 2,
				'max' => 50,
				'unique' => 'users' 
			],
			'password' => [
				'required' => true,
				'min' => 10
			],
			'confirmPassword' => [
				'match' => 'password'
			]
		]);
		
		if ($validate->getPassed()){
			$salt = Hash::salt(32);
			
			$userData = [
				'username' => Request::getPost('username'),
				'password' => Hash::make(Request::getPost('password'), $salt),
				'salt' => $salt,
				'name' => Request::getPost('name')
			];
			
			try{
				//$user->create($userData);
				throw new Exception ('There was a problem creating new user!');
			}catch(Exception $e){
				Session::flash('danger', $e->getMessage());
				Redirect::to('register');
			}
			
			
			Session::flash('success','You are registered successfully!');
			Redirect::to(404);
		}
		
		}
		//dd($validate->getErrors());
		//dump($validate->getPassed());
		//$name = Request::getPost('name');
		//dump($name);
	}
	
	Helper::getHeader('header', 'User Registration');
	
	include_once 'includes/notifications.php';
?>

<div class="row">
	<div class="clo-md-4 offset-md-4">
		<div class="card">
		  <div class="card-header">
			<h5 class="card-title">User Registration</h5>
		  </div>
		  <div class="card-body">			
			<form method="post">
				<input type="hidden" name="CSRF_token" value="<?php echo Token::generate();?>">
				 <div class="form-group">
					<label for="name">Name*</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
					<?php echo $validation->hasError('name') ? '<p class="text-danger">'.$validation->hasError('name').'</p>': '' ?>
				 </div>
				 
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
				 
				 <div class="form-group">
					<label for="confirmPassword">Confirm Password*</label>
					<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm your Password">
					<?php echo $validation->hasError('confirmPassword') ? '<p class="text-danger">'.$validation->hasError('confirmPassword').'</p>': '' ?>
				 </div>
				 
				 <button class="btn btn-primary">Confirm your action</button>
			</form>
		  </div>
		</div>
	</div>
</div>



<?php 
	Helper::getFooter('footer');
?>