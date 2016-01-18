<?php

use Phalcon\Mvc\Dispatcher,
	Phalcon\Events\Event,
	Phalcon\Acl;

class Permission extends \Phalcon\Mvc\User\Plugin
{
	/**
	* Constants to prevent a typo
	*/
	const GUEST = 'guest';
	const USER = 'user';
	const ADMIN = 'admin';
	protected $_publicResources = [
		'index' => ['*'],
		'signin' => ['*']
	];	
	protected $_userResources = [
		'dashboard' => ['*']
	];

	protected $_adminResources = [
		self::ADMIN => ['*']
	];

	public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
	{
		//return;
		$role = $this->session->get('role');

		if(!$role) {
			$role = 'guest';
		}

		//Get the current controller/action from dispatcher
		$controller = $dispatcher->getControllerName();
		$action = $dispatcher->getActionName();

		//Get the ACL rule lists
		$acl = $this->_getAcl();
		$allowed = $acl->isAllowed($role, $controller, $action);

		//See if they have permission
		if ($allowed != Acl::ALLOW) {
			$this->flash->error("You do not have permission to access this area");
			$this->response->redirect('index');
			
			/*$dispatcher->forward([
				'controller' => 'index',
				'action' => 'index'
			]);*/
			//Stops the dispatcher at the current action and returns them to the home page
			return false;
		}
	}

	protected function _getAcl()
	{
		if (!isset($this->persistent->acl))
		{
			$acl = new Acl\Adapter\Memory();
			$acl->setDefaultAction(Acl::DENY);
			$roles = [
				self::GUEST => new Acl\Role(self::GUEST),
				self::USER => new Acl\Role(self::USER),
				self::ADMIN => new Acl\Role(self::ADMIN)				
			];
			foreach($roles as $role){
				$acl->addRole($role);
			}
			// Public resources
			foreach($this->_publicResources as $resource => $action) {
				$acl->addResource(new Acl\Resource($resource), $action);
			}
			// User resources
			foreach($this->_userResources as $resource => $action) {
				$acl->addResource(new Acl\Resource($resource), $action);
			}
			// Admin resources
			foreach($this->_adminResources as $resource => $action) {
				$acl->addResource(new Acl\Resource($resource), $action);
			}	
			//Allow all roles to acces the public resources
			foreach($roles as $role) {
				foreach($this->_publicResources as $resource => $action) {
					$acl->allow($role->getName(), $resource, '*');
				}
			}
			//Allow user and admin to access the user resource
			foreach($this->_userResources as $resource => $actions) {
				foreach($actions as $action){
					$acl->allow(self::USER, $resource, $action);
					$acl->allow(self::ADMIN, $resource, $action);					
				}
			}
			//Allow admin to access the admin resources
			foreach($this->_adminResources as $resource => $actions) {
				foreach($actions as $action){
					$acl->allow(self::ADMIN, $resource, $action);					
				}
			}
			$this->persistent->acl = $acl;				
		}

		return $this->persistent->acl;
	}	
}