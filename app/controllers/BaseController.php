<?php 

class BaseController extends \Phalcon\Mvc\Controller
{
	public function initialize()
	{
		$this->assets
			->collection('js')
			->addJs('third-party/js/jquery-1.12.0.min.js');
		$this->assets
			->collection('css')
			->addCss('css/style.css');
	}
}	
