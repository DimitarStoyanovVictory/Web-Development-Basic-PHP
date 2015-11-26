<?php
//ini_set('display_errors', 1);
session_start();
spl_autoload_register(function($className) {
    $classPathSplitted = explode('\\', $className);
    $vendor = $classPathSplitted[0];
    $classPath = str_replace($vendor . '\\', '', $className);

    $classPath = str_replace('\\', '/', $classPath);
    if(!is_readable($classPath . '.php')) {
        throw new \Exception("No such Controller");
    }

    require_once $classPath . '.php';
});

$configName = getenv('CONFIGNAME');

$dbConfigClass = '\\ConferenceScheduler\\Configs\\' . $configName . '\\DatabaseConfig';

ConferenceScheduler\Database::setInstance(
    $dbConfigClass::USER,
    $dbConfigClass::PASS,
    $dbConfigClass::DBNAME,
    $dbConfigClass::HOST
);

// add users
//$user = new \ConferenceScheduler\Models\User("david", "333");
//$user2 = new \ConferenceScheduler\Models\User("pesho", "333");
//$user3 = new \ConferenceScheduler\Models\User("ivan", "333");
//$user4 = new \ConferenceScheduler\Models\User("ognyan", "333");
//$user5 = new \ConferenceScheduler\Models\User("kiril", "333");
//$user6 = new \ConferenceScheduler\Models\User("angel", "333");
//$user7 = new \ConferenceScheduler\Models\User("mitko", "333");
//$user8 = new \ConferenceScheduler\Models\User("radi", "333");
//$user9 = new \ConferenceScheduler\Models\User("elica", "333");
//$user10 = new \ConferenceScheduler\Models\User("mila", "333");
//$user->save();
//$user2->save();
//$user3->save();
//$user4->save();
//$user5->save();
//$user6->save();
//$user7->save();
//$user8->save();
//$user9->save();
//$user10->save();

//var_dump($user->getUsername());

/**
["REQUEST_URI"]=>
  string(30) "/ConferenceScheduler/index.php"

["SCRIPT_NAME"]=>
  string(30) "/ConferenceScheduler/index.php"

["PHP_SELF"]=>
  string(30) "/ConferenceScheduler/index.php"
 */

$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
$requestUri = explode('/', $_SERVER['REQUEST_URI']);

$customUri = [];
$controllerIndex = 0;
foreach ($scriptName as $k => $v)
{
    if($v == 'index.php')
    {
        $controllerIndex = $k;
        break;
    }
}

$actionIdnex = $controllerIndex + 1;

$controllerName = $requestUri[$controllerIndex];

if ($controllerName == 'ConfScheduler.com')
{
    require_once 'Views/home/homepage.php';
}
else
{
    $actionName = $requestUri[$actionIdnex];
    $controllerClassName = '\\ConferenceScheduler\\Controllers\\'
        . ucfirst($controllerName)
        . 'Controller';

    $view = new \ConferenceScheduler\View($controllerName, $actionName);

    $controller = new $controllerClassName($view, $controllerName);
    $controller->$actionName();

    $view->render();
}

