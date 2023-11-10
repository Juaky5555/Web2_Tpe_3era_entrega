<?php

require_once 'libs/router.php';
require_once 'app/controllers/individuos.api.controller.php';
$router = new Router();


//                 endpoint         verbo         controller          metodo
$router->addRoute('individuos',     'GET',    'individuosController', 'get');
$router->addRoute('individuos/:ID', 'GET',    'individuosController', 'get');
$router->addRoute('individuos/:ID', 'DELETE', 'individuosController', 'delete');
$router->addRoute('individuos',     'POST',   'individuosController', 'add');
$router->addRoute('individuos/:ID', 'PUT',    'individuosController', 'update');
$router->addRoute('consultas',      'GET',    'individuosController', 'getConsultas');
$router->addRoute('consultas/:ID',  'GET',    'individuosController', 'getConsultas');
$router->addRoute('consultas',      'POST',   'individuosController', 'addConsulta');
$router->addRoute('consultas/:ID',  'DELETE', 'individuosController', 'deleteConsulta');
$router->addRoute('consultas/:ID',  'PUT',    'individuosController', 'updateConsulta');

$action = 'individuos';
if (!empty( $_GET['resource'])) {
    $action = $_GET['resource'];
}

$router->route($action, $_SERVER['REQUEST_METHOD']);
