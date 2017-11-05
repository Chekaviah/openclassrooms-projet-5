<?php
namespace Blog\Controllers;

use App\AbstractController;
use App\View;
use Blog\Managers\PostManager;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{

	private $PostManager;

	public function __construct()
	{
		$this->PostManager = PostManager::getInstance();
	}

	public function home($request)
	{
		//$this->set('post', $this->PostManager->getPost());
		return View::render('blog/home.twig', $this->getVars());
	}

	public function create($request)
	{
		return View::render('blog/create.twig', $this->getVars());
	}

	public function createPost($request)
	{
		if(empty($_POST) || empty($_POST['title']) || empty($_POST['header']) || empty($_POST['content']))
			return new Response("Incomplete form", 403);

		if(empty($_POST['csrf']) || ($_SESSION['csrf'] != $_POST['csrf']))
			return new Response("CSRF Attack", 403);

		$post = $this->PostManager->createPost($_POST['title'], $_POST['header'], $_POST['content']);

		return new Response(var_dump($post));
	}
}