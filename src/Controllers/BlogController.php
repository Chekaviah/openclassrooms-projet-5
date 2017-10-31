<?php

namespace Blog\Controllers;

use Blog\Components\View;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
	public function home($request)
	{
		return View::render('blog/home.tpl', $this->getVars());
	}
}