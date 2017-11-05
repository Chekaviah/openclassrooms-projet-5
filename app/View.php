<?php
namespace App;

use Symfony\Component\HttpFoundation\Response;
use Twig_Environment;
use Twig_Extension_Debug;
use Twig_Loader_Filesystem;

class View
{
	public static function render($template, $vars = []) {
		$loader = new Twig_Loader_Filesystem(APP_ROOT.'views');
		$twig = new Twig_Environment($loader, array(
			'debug' => true
		));
		$twig->addExtension(new Twig_Extension_Debug());

		$vars = array_merge($vars, ['csrf' => $_SESSION['csrf']]);
		$template = $twig->render($template, $vars);

		return new Response($template);
	}
}