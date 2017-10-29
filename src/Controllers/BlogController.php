<?php

namespace Blog\Controllers;

use Blog\Components\View;
use Symfony\Component\HttpFoundation\Response;

class BlogController
{
	public function home($request)
	{
		return View::render('blog/home.tpl');
		//return new Response('Home');
	}
}