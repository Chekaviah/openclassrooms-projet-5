<?php
namespace Blog\Controllers;

use App\AbstractController;
use App\Mailer;
use App\View;
use Blog\Managers\PostManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{

	private $PostManager;
	private $Mailer;

	public function __construct()
	{
		$this->PostManager = PostManager::getInstance();
		$this->Mailer = Mailer::getInstance();
	}

	public function home()
	{
		return View::render('blog/home.twig', $this->getVars());
	}

	public function blog()
	{
		$posts = $this->PostManager->getAllPosts();

		$this->set('posts', $posts);
		return View::render('blog/blog.twig', $this->getVars());
	}

	public function view(Request $request)
	{
		$id = $request->attributes->get("id");

		$post = $this->PostManager->getPostById($id);
		if(empty($post))
			return new Response("Post not found", 404);

		$this->set('post', $post);

		return View::render('blog/view.twig', $this->getVars());
	}

	public function edit(Request $request)
	{
		$id = $request->attributes->get("id");

		$post = $this->PostManager->getPostById($id);
		if(empty($post))
			return new Response("Post not found", 404);

		$this->set('post', $post);

		return View::render('blog/edit.twig', $this->getVars());
	}

	public function create()
	{
		return View::render('blog/create.twig', $this->getVars());
	}

	public function createPost(Request $request)
	{
		if(!$request->request->get("title") || !$request->request->get("header") || !$request->request->get("content") || !$request->request->get("author"))
			return new Response("Incomplete form", 403);

		$id = $this->PostManager->createPost($request->request->all());

		return new RedirectResponse('/view/'.$id);
	}

	public function editPost(Request $request)
	{
		if(!$request->request->get("id") || !$request->request->get("title") || !$request->request->get("header") || !$request->request->get("content") || !$request->request->get("author"))
			return new Response("Incomplete form", 403);

		$id = $request->request->get("id");

		$this->PostManager->editPost($request->request->all());

		return new RedirectResponse('/view/'.$id);
	}

	public function mailPost(Request $request)
	{
		if(empty($_POST) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']))
			return new Response("Incomplete form", 403);

		$mail = $this->Mailer->prepareMail($request->request->all());
		$this->Mailer->sendMail($mail);

		return View::render('blog/mail.twig', $this->getVars());
	}
}