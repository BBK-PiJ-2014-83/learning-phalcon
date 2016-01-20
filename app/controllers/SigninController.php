<?php 

use Phalcon\Tag;

class SigninController extends BaseController
{


	public function indexAction()
	{
		Tag::setTitle('Sign In');
		$this->assets->collection('additional')
			 ->addCss('css/signin.css');
		parent::initialize();
	}

	public function doSigninAction()
	{

		if ($this->security->checkToken() == false) {
			$this->flash->error('Invalid CSRF token!');
			$this->response->redirect("signin/index");	
			return;		
		}

		$this->view->disable();

		$password = $this->request->getPost('password');
		$email = $this->request->getPost('email');

		$user = User::findFirstByEmail($email);

		if ($user) {
			if ($this->security->checkHash($password, $user->password)) 
			{
				$this->session->set('id', $user->id);
				$this->session->set('role', $user->role);
				$this->response->redirect("dashboard/index");						
				return;
			} 
		} 
		/*
		$user = User::findFirst([
			"email = :email: AND password = :password:",
			"bind" => [
				"email" => $this->request->getPost('email'),
				"password" => $this->request->getPost('password')
			]
		]);*/



		$this->flash->error('Incorrect credentials');
		$this->response->redirect("signin/index");

	}


}