<?php 

class IndexController extends BaseController
{
	public function indexAction()
	{
		/*
		$this->assets->addCss('css/style.css');
		$this->assets->addJs('third-party/js/jquery-1.12.0.min.js');	
		*/

		$this->assets->collection('footer')
					->addJs('third-party/js/fake.js');

		echo "Hello World";
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