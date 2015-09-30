<?php
spl_autoload_register(function($className) {
    $classPathSplitted = explode('\\', $className);
    $vendor = $classPathSplitted[0];
    $classPath = str_replace($vendor . '\\', '', $className);

    $classPath = str_replace('\\', '/', $classPath);
    if(!is_readable($classPath . '.php')) {
        throw new \Exception("No such Controller");
    }

    var_dump($classPath);
    require_once $classPath . '.php';
});

$configName = getenv('CONFIG_NAME');

/**
 * @var \ShoppingCart\Configs\DatabaseConfig $dbConfigClass
 */

$dbConfigClass = '\\ShoppingCart\\Configs\\'
    . $configName . '\\DatabaseConfig';

ShoppingCart\Database::setInstance(
    $dbConfigClass::USER,
    $dbConfigClass::PASS,
    $dbConfigClass::DBNAME,
    $dbConfigClass::HOST
);

/**
 * 'REQUEST_URI' 'WDB-Project/index.php'
 * 'SCRIPT_NAME' 'WDB-Project/index.php'
 * 'PHP_SELF' 'WDB-Project/index.php'
 */

$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
$requestUri = explode('/', $_SERVER['REQUEST_URI']);
$customUri = [];

$controllerIndex = 0;
foreach ($scriptName as $k => $v) {
    if ($v == 'index.php') {
        $controllerIndex = $k;
        break;
    }
}

$actionIndex = $controllerIndex + 1;

$controllerName = $requestUri[$controllerIndex];
$actionName = $requestUri[$actionIndex];

$controllerClassName = '\\Shoppingcart\\Controllers\\'
    . ucfirst($controllerName)
    . 'Controller';

$view = new \ShoppingCart\View($controllerName, $actionName);

try {
    $controller = new $controllerClassName($view);
} catch (\Exeption $e) {
    echo "No such controller";
}

if (!method_exists($controller, $actionName)) {
    die("No such action");
}

$controller->$actionName();
$view->render();

//$user = ShoppingCart\Repositories\UserRepository::create()
//    ->getOneByDetails('insomnia', '123');
//    //37693cfc748049e45d87b8c7d8b9aacd
//$user->setPassword('234');
//$user->save();

//ShoppingCart\Database::getInstance()
//    ->query("INSERT INTO users (firstName, middleName, lastName, username, password)
//      VALUES (?, ?, ?, ?, ?);
//    ", [
//        'Dimitar',
//        'Dimitrov',
//        'Stoyanov',
//        'Dimitar Dimitrov Stoyanov',
//        md5('222')
//    ]);
