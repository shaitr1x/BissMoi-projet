<?php

require_once __DIR__.'/config/configcss.php';
$controller = $_GET['controller'] ?? 'user';
$action = $_GET['action'] ?? 'accueil';

require_once __DIR__ . "/controllers/{$controller}controller.php";
$controllerClass = $controller . "controller";

if (method_exists($controllerClass, $action)) {
    $controllerClass::$action();
} else {
    echo "Action non trouvée.";
}


