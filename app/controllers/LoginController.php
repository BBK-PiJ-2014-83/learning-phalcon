<?php 

class LoginController extends BaseController
{
	//Standard constructor cannot be overridden
	public function onConstruct(){
		echo "hididid";
	}

	public function initialize() {
		//$this->view->setTemplateAfter('login');
	}
	public function indexAction()
	{
		echo "Login";
	}

	//login/process/<username>/<age>
	public function processAction($username = false, $age = 12)
	{

		$this->view->setVar('username', $username);
		$this->view->setVar('age', $age);
	}


}