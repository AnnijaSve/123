<?php

include('connection.php');

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $namespace = '\App\Controllers\\';
    $r->addRoute('GET', '/', $namespace . 'LoginController@index');
    $r->addRoute('POST', '/', $namespace . 'LoginController@login');
    $r->addRoute('GET', '/dashboard', $namespace . 'DriverController@index');
});

$httpMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 PAGE NOT FOUND';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo 'METHOD NOT ALLOWED';
        break;
    case FastRoute\Dispatcher::FOUND:
        [$controller, $method] = explode('@', $routeInfo[1]);
        $vars = $routeInfo[2];

        (new $controller)->$method($vars);

        break;
}