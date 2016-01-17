<?php

use Phalcon\Mvc\Dispatcher,
	Phalcon\Events\Event;

class Permission extends \Phalcon\Mvc\User\Plugin
{
	protected $_publicResources = [
		'index' => ['*'],
		'signin' => ['*']
	];	
	protected $_userResources = [
		'dashboard' => ['*']
	];

	protected $_adminResources = [
		'admin' => ['*']
	];

	protected function _getAcl()
	{
		if (!isset($this->persistent->acl))
		{
			$acl = new \Phalcon\Acl\Adapter\Memory();
			$acl->setDefaultAction(Phalcon\Acl::DENY);
			$roles = [
				'guest' => new \Phalcon\Acl\Role('guest'),
				'user' => new \Phalcon\Acl\Role('user'),
				'admin' => new \Phalcon\Acl\Role('admin')				
			];
			foreach($roles as $role){
				$acl->addRole($role);
			}
			// Public resources
			foreach($this->_publicResources as $resource => $action) {
				$acl->addResource(new \Phalcon\Acl\Resource($resource), $action);
			}
			// User resources
			foreach($this->_userResources as $resource => $action) {
				$acl->addResource(new \Phalcon\Acl\Resource($resource), $action);
			}
			// Admin resources
			foreach($this->_adminResources as $resource => $action) {
				$acl->addResource(new \Phalcon\Acl\Resource($resource), $action);
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
					$acl->allow('user', $resource, $action);
					$acl->allow('admin', $resource, $action);					
				}
			}
			//Allow admin to access the admin resources
			foreach($this->_adminResources as $resource => $actions) {
				foreach($actions as $action){
					$acl->allow('admin', $resource, $action);					
				}
			}
			$this->persistent->acl = $acl;				
		}

		return $this->persistent->acl;
	}

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
		if ($allowed != Phalcon\Acl::ALLOW) {
			$dispatcher->forward([
				'controller' => 'index',
				'action' => 'index'
			]);
			//Stops the dispatcher at the current action and returns them to the home page
			return false;
		}
	}
}