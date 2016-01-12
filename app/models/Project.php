<?php

class Project extends BaseModel
{
	public function initialize() 
	{
		//local field, referenced model, referenced field.
		//Phalcon keeps no record of foreign key relationships so you need to enter them in.
		$this->belongsTo('user_id', 'User', 'id');

	}	
}