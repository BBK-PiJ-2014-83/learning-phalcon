<?php

class TestController extends BaseController
{

	public function jumpAction($id = 1) 
	{
		echo __FUNCTION__;
		echo $id;
	}	

	public function flyAction()
	{
		echo __FUNCTION__;
		print_r($this->dispatcher->getParams());
	}
}