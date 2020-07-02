<?php namespace App\Controllers;
use App\Models\UserModel;
class Users extends BaseController
{
	// login form 
	public function index()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|validateUser[email,password]'
			];
			$errors = [
				'password' => [
					'validateUser' => 'You don\'t have account yet!! Please Register Now'
				]
			];

			if(!$this->validate($rules,$errors)){
				$data['validation'] = $this->validator;
			}else{
				$pizza = new UserModel();
				$user = $pizza->where('email',$this->request->getVar('email'))
							  ->first();
				$user = $pizza->where('password',$this->request->getVar('password'))
							  ->first();
				$this->setUserSession($user);
				return redirect()->to('dashboard');
			}
		}
		return view('auths/login',$data);
	}
	// set role to user 
	public function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'email' => $user['email'],
			'password' => $user['password'],
			'address' => $user['address'],
			'role' => $user['role'],
		];

		session()->set($data);
		return true;
	}

	// register account before login
	public function register()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required',
				'address' => 'required',
			];
			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
			}else{
				$pizza = new UserModel();

				$newData = [
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
					'address' => $this->request->getVar('address'),
					'role' => $this->request->getVar('role'),
				];

				$pizza->createUsers($newData);
				$session = session();
				$session->setFlashdata('success','successful Register');
				return redirect()->to('/');
			}
		}
		return view('auths/register',$data);
	}
	// back to login form
	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

}
