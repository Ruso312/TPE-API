<?php
    
    require_once './app/libs/Router.php';
    require_once './app/libs/request.php';
    require_once './app/controllers/cliente.api.controller.php';

    $router = new Router();

    #                   endpoint            verbo           controller            metodo
    $router->addRoute('clientes'         , 'GET',     'ClienteController',   'verClientes');
    $router->addRoute('cliente/:id'      , 'GET',     'ClienteController',   'verCliente');
    $router->addRoute('cliente'          , 'POST',    'ClienteController',   'agregarCliente');
    $router->addRoute('cliente/:id'      , 'PUT',     'ClienteController',   'editarCliente'); 
    $router->addRoute('cliente/:id'      , 'DELETE',  'ClienteController',   'eliminarCliente');      
    
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);