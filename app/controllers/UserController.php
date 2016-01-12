<?php 

class UserController extends BaseController
{

	public function indexAction()
	{
		$this->view->setVars([
			'single' => User::findFirstById(1),
			'all' => User::find([
				'deleted is NULL'
			])
		]);
	}

	//login/process/<username>/<age>
	public function createAction()
	{
		$user = new User();
		$user->email = "test@test.com";
		$user->password = "test";
		$result = $user->create();
		if (!$result) {
			print_r($user->getMessages());
		}
	}

	public function createAssocAction() 
	{
		$user =  User::findFirst();
		$project = new Project();
		$project->user = $user;
		$project->title = "Moon walker";
		$result = $project->save();
	}

	public function updateAction($userId = 1)
	{
		$user = User::findFirstById($userId);
		if (!$user) {
			echo "User does not exist";
			die;
		}
		$user->email = "updated{$userId}@test.com";
		$result = $user->save();
		if (!$result) {
			print_r($user->getMessages());
		}
	}

	public function deleteAction($userId = 1) 
	{
		$user = User::findFirstById(7);
		if(!$user) {
			echo "User does not exist";
			die();
		}
		$result = $user->delete();
		if (!$result) {
			print_r($user->getMessages());
		}
	}


}