<?php

require_once 'libs/router.php';
require_once 'app/controllers/individuosController.php';
$router = new Router();


            //      endpoint     verbo         controller             metodo
$router->addRoute('individuos', 'GET', 'individuosController', 'get');
$router->addRoute('individuos/:ID', 'GET', 'individuosController', 'get');
$router->addRoute('individuos/:ID', 'DELETE', 'individuosController', 'delete');
$router->addRoute('individuos', 'POST', 'individuosController', 'create');
$router->addRoute('individuos/:ID', 'PUT', 'individuosController', 'update');

$router->route($_GET['resource'],$_SERVER['REQUEST_METHOD']);

