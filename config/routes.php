<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Blog\Controllers\BlogController;

$routes = new RouteCollection();

$routes->add('home', new Route('/', array('_controller' => array(new BlogController(), 'home'))));
$routes->add('blog', new Route('/blog', array('_controller' => array(new BlogController(), 'blog'))));
$routes->add('view', new Route('/view/{id}', array('_controller' => array(new BlogController(), 'view'))));
$routes->add('edit', new Route('/edit/{id}', array('_controller' => array(new BlogController(), 'edit'))));
$routes->add('create', new Route('/create', array('_controller' => array(new BlogController(), 'create'))));
$routes->add('mail', new Route('/mail', array('_controller' => array(new BlogController(), 'mailPost'))));
$routes->add('edit-post', new Route('/edit-post', array('_controller' => array(new BlogController(), 'editPost'))));
$routes->add('create-post', new Route('/create-post', array('_controller' => array(new BlogController(), 'createPost'))));

return $routes;