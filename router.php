<?php

require_once 'libs/router.php';
require_once 'app/controllers/individuosController.php';
$router = new Router();


//                 endpoint     verbo         controller        metodo
$router->addRoute('individuos', 'GET', 'individuosController', 'get');
$router->addRoute('individuos/:ID', 'GET', 'individuosController', 'get');
$router->addRoute('individuos/:ID', 'DELETE', 'individuosController', 'delete');

$action = 'individuos';
if (!empty( $_GET['resource'])) {
    $action = $_GET['resource'];
}

$router->route($action, $_SERVER['REQUEST_METHOD']);
