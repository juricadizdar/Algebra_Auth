<?php 

class User 
{
	private $db;
	private $data;
	private $sessionName;
	private $isLoggedIn = false;
	
	public function __construct($user=null)
	{
		$this->db = DB::getInstance();
		$this->sessionName = 'user';
		
		if(!$user){
			//dd('Nema user');
			if(Session::exists($this->sessionName)){
				$user = Session::get($this->sessionName);
				
				if($this->find($user)){
					$this->isLoggedIn = true;
				} else {
					$this->logout();
				}
			}
		} else {						// ako smo poslali argument odlazi u else
			//dd('Ima usera');
			$this->find($user);
		}
	}
	
	public function find($user=null)
	{
		if($user){
			$field = is_int($user) ? 'id' : 'username';
			$data = $this->db->get('*','users',array($field,'=',$user));
			
			if($data->countRow()){
				$this->data = $data->first();
				return true;
			}
		}
		
		return false;
	}
	
	public function create($user)
	{
		if(!$this->db->insert('users',$user)){ // ako metoda insert vraća false
			throw new Exception ('There was a problem creating new user!');
		}
	}
	
	public function login($username, $password)
	{
		if($this->find($username)){
			if($this->data->password === Hash::make($password, $this->data->salt)){
				Session::put($this->sessionName, $username);
				return true;
			}
		}
		return false;
	}
	
	public function logout()
	{
		Session::destroy($this->sessionName);
	}
	
	public function check()
	{
		return $this->isLoggedIn;
	}
}









