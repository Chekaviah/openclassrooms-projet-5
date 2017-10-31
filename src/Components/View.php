<?php

namespace Blog\Components;

use Symfony\Component\HttpFoundation\Response;
use Twig_Environment;
use Twig_Loader_Filesystem;

class View
{
	public static function render($template, $vars = []) {
		$loader = new Twig_Loader_Filesystem(APP_ROOT.'views');
		$twig = new Twig_Environment($loader);

		$template = $twig->render($template, $vars);

		return new Response($template);
	}
}