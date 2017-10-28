<?php

namespace Blog\Controllers;

use Symfony\Component\HttpFoundation\Response;

class BlogController
{
	public function home($request)
	{
		return new Response('Home');
	}
}