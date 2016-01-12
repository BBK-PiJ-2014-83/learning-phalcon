<?php
use \Phalcon\Mvc\Model\Behavior\SoftDelete;

class User extends BaseModel
{
	public function initialize() 
	{
		//local field, referenced model, referenced field.
		//Phalcon keeps no record of foreign key relationships so you need to enter them in.
		$this->hasMany('id', 'Project', 'user_id');

		$this->addBehavior(new SoftDelete([
			'field' => 'deleted',
			'value' => 1	
		]));
	}	

	//https://docs.phalconphp.com/en/latest/reference/models.html
	/*
	public function beforeValidationOnCreate() 
	{
		if($this->email == 'test@test.com') {
			die('This email is too common!');
		}
	}
	*/
	/*use this if the table name is something different to the class name
	public function getSource() {
		return 'users';
	}
	..Another way of setting a different table name
	public function initalize() {
		$this->setSource('users');
	}
	*/

}