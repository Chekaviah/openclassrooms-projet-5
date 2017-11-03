<?php

namespace Blog\Controllers;

use App\AbstractController;
use App\View;
use Blog\Managers\PostManager;

class BlogController extends AbstractController
{

	private $PostManager;

	public function __construct()
	{
		$this->PostManager = PostManager::getInstance();
	}

	public function home($request)
	{
		var_dump($this->PostManager->getPost());
		$this->set('post', $this->PostManager->getPost());
		return View::render('blog/home.twig', $this->getVars());
	}

	public function create($request)
	{
		return View::render('blog/create.twig', $this->getVars());
	}
}