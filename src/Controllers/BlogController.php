<?php
namespace Blog\Controllers;

use App\AbstractController;
use App\View;
use Blog\Managers\PostManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{

	private $PostManager;

	public function __construct()
	{
		$this->PostManager = PostManager::getInstance();
	}

	public function home()
	{
		return View::render('blog/home.twig', $this->getVars());
	}

	public function view(Request $request)
	{
		$id = $request->attributes->get("id");

		$post = $this->PostManager->getPostById($id);
		if(empty($post))
			return new Response("Incomplete form", 403);

		$this->set('post', $post);

		return View::render('blog/view.twig', $this->getVars());
	}

	public function create()
	{
		return View::render('blog/create.twig', $this->getVars());
	}

	public function createPost()
	{
		if(empty($_POST) || empty($_POST['title']) || empty($_POST['header']) || empty($_POST['content']))
			return new Response("Incomplete form", 403);

		if(empty($_POST['csrf']) || ($_SESSION['csrf'] != $_POST['csrf']))
			return new Response("CSRF Attack", 403);

		$id = $this->PostManager->createPost($_POST['title'], $_POST['header'], $_POST['content']);

		return new RedirectResponse('/view/'.$id);
	}
}