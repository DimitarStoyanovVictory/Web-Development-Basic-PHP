<?php
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
 * 'REQUEST_URI' 'WDB-Project/Remland.php'
 * 'SCRIPT_NAME' 'WDB-Project/Remland.php'
 * 'PHP_SELF' 'WDB-Project/Remland.php'
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

if ($controllerName == "Remaland.com") {
    $ViewHomepage = new \ShoppingCart\View($controllerName);
    $ViewHomepage->render();
}
else {
    $actionName = $requestUri[$actionIndex];

    $controllerClassName = '\\Shoppingcart\\Controllers\\'
        .ucfirst($controllerName)
        .'Controller';

    $view = new \ShoppingCart\View($controllerName, $actionName);
    try {
        $controller = new $controllerClassName($view, $controllerName);
    } catch (\Exeption $e) {
        echo "No such controller";
    }

    if (!method_exists($controller, $actionName)) {
        die("No such action");
    }

    $controller->$actionName();
    $view->render();
}