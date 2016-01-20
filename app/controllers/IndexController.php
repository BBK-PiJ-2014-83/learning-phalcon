<?php 

use Phalcon\Tag;

class IndexController extends BaseController
{
	public function indexAction()
	{

		Tag::setTitle('Home');
		parent::initialize();
	}

	public function startSessionAction() 
	{
		$this->session->set('name', 'John');
		$this->session->set('user', [
			"name" => "ted",
			"age" => 43
		]);
		$this->session->set('age', 32);
	}

	public function signoutAction()
	{
		$this->session->destroy();
		$this->response->redirect('index/');
	}

	public function generatePasswordAction($password)
	{
		echo $this->security->hash($password);
	}
	public function getSessionAction($item)
	{
		echo $this->session->get($item);
	}

	public function removeSessionAction($item)
	{
		echo $this->session->remove('name');
	}

	public function destroySessionAction()
	{
		echo $this->session->destroy();
	}			
}