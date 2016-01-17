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



}