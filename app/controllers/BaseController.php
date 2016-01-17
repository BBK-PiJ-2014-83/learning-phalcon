<?php 

class BaseController extends \Phalcon\Mvc\Controller
{
	public function initialize()
	{
		$this->assets
			 ->collection('style')
			 ->addCss('third-party/css/bootstrap.min.css', false, false)
			 ->addCss('css/style.css')
			 ->setTargetPath('css/production.css')
			 ->setTargetUrl('css/production.css')
			 ->join(true)
			 ->addFilter(new \Phalcon\Assets\Filters\Cssmin());
		//takes the js or css files and combines / minifies them for faster page loads
		$this->assets
			->collection('js')
			->addJs('third-party/js/jquery-1.12.0.min.js', false, false)
			->addJs('third-party/js/bootstrap.min.js', false, false)
			->setTargetPath('js/production.css')
			->setTargetUrl('js/production.css')
			->join(true)
			->addFilter(new \Phalcon\Assets\Filters\Jsmin());

	}
}	
