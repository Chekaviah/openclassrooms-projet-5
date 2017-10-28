<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Blog\Controllers\BlogController;

$routes = new RouteCollection();

$routes->add('home', new Route('/', array('_controller' => array(new BlogController(), 'home'))));

return $routes;