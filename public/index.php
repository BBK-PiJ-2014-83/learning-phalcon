<?php 

try {
	//Autoloader
	$loader = new \Phalcon\Loader();
	$loader->registerDirs([
		'../app/controllers/',
		'../app/models/',
		'../app/config/',
	]);	

	$loader->register();

	//Dependency Injection
	$di = new \Phalcon\DI\FactoryDefault();

	$di->set('db', function() {
		$db = new \Phalcon\Db\Adapter\Pdo\Mysql([
			"host" => "localhost",
			"username" => "phalcon",
			"password" => "TvevzMjmJmE7EHr4",
			"dbname" => "learning_phalcon"
		]);
		return $db;
	});

	$di->set('view', function() {
		$view = new \Phalcon\Mvc\View();
		$view->setViewsDir('../app/views');
		$view->registerEngines([
			".volt" => "Phalcon\Mvc\View\Engine\Volt"
		]);
		return $view;
	});

	$di->set('router', function(){
		$router = new \Phalcon\Mvc\Router();
		$router->mount(new Routes());	//Call it whatever name your php file is
		return $router;
	});

	//Session start
	$di->setShared('session', function() {
		$session = new \Phalcon\Session\Adapter\Files();
		$session->start();
		return $session;
	});

	//Flash data (Temporary data)
	$di->set('flash', function() {
		$flash = new \Phalcon\Flash\Session([
			'error' => 'alert alert-danger',
			'success' => 'alert alert-success',
			'notice' => 'alert alert-info',
			'warning' => 'alert alert-warning'
		]);
		return $flash;
	});
	//Meta-data
	$di['modelsMetadata'] = function () {

	    // Create a meta-data manager with APC
	    $metaData = new \Phalcon\Mvc\Model\Metadata\Memory([
	            "lifetime" => 86400,
	            "prefix"   => "metaData"
	        ]
	    );
	    // Set a custom meta-data introspection strategy
	    // With this strategy it looks at the table itself to get the metadata
	    //https://docs.phalconphp.com/en/latest/reference/models-metadata.html
    	//$metaData->setStrategy(new MyIntrospectionStrategy());
	    return $metaData;
	};
	// Custom dispatcher (Overrides the default)
	$di->set('dispatcher', function() use ($di) {
		$eventsManager = $di->getShared('eventsManager');
		//custom ACL class
		$permission = new Permission();
		//Listen for events from the permission class
		$eventsManager->attach('dispatch', $permission);
		$dispatcher = new \Phalcon\Mvc\Dispatcher();
		$dispatcher->setEventsManager($eventsManager);
		return $dispatcher;
	});

	//Deploy the app
	$app = new \Phalcon\Mvc\Application($di);

	echo $app->handle()->getContent();
} catch(\Phalcon\Exception $e) {
	echo $e->getMessage();
}