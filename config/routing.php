<?php

use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

// Anti CSRF
$origin = $request->headers->get('origin', null);
if($origin == null)
	$origin = $request->headers->get('referer', null);

if(!$request->isMethodSafe()) {
	if($origin != null && parse_url($origin, PHP_URL_HOST) != $_SERVER['HTTP_HOST']) {
		http_response_code(403);
		echo 'CSRF-Attack';
		exit;
	}
}

$token = bin2hex(random_bytes(32));
if(!isset($_SESSION))
	session_start();

if(!isset($_SESSION['csrf']))
	$_SESSION['csrf'] = $token;

// Router
$routes = include APP_ROOT.'config/routes.php';

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

try {
	$request->attributes->add($matcher->match($request->getPathInfo()));
	$response = call_user_func($request->attributes->get('_controller'), $request);
} catch (ResourceNotFoundException $e) {
	$response = new Response('Not Found', 404);
} catch (Exception $e) {
	$response = new Response('An error occurred : '.$e->getTraceAsString(), 500);
}

$response->send();