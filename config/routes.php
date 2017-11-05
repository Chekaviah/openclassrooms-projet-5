<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Blog\Controllers\BlogController;

$routes = new RouteCollection();

$routes->add('home', new Route('/', array('_controller' => array(new BlogController(), 'home'))));
$routes->add('create', new Route('/create', array('_controller' => array(new BlogController(), 'create'))));
$routes->add('create-post', new Route('/create-post', array('_controller' => array(new BlogController(), 'createPost'))));

return $routes;