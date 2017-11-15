<?php
namespace Blog\Managers;

use App\AbstractManager;
use App\MysqlConnector;
use Blog\Models\Post;

class PostManager extends AbstractManager
{

	private $connector;

	public function __construct()
	{
		$this->connector = MysqlConnector::getInstance();
	}

	/**
	 * Get all blog posts
	 * @return array
	 */
	public function getAllPosts()
	{
		$sql = "SELECT * FROM blog ORDER BY last_update DESC";
		$stmt = $this->connector->prepare($sql);
		$stmt->execute();

		$r = [];
		while($l = $stmt->fetch()) {
			$post = new Post();
			$post->setId($l['id']);
			$post->setTitle($l['title']);
			$post->setHeader($l['header']);
			$post->setContent($l['content']);
			$post->setAuthor($l['author']);
			$post->setPublication($l['publication']);
			$post->setLastUpdate($l['last_update']);

			$r[] = $post;
		}

		$stmt->closeCursor();

		return $r;
	}

	/**
	 * Get blog post by id
	 * @param $id
	 * @return Post|null
	 */
	public function getPostById($id)
	{
		if(filter_var($id, FILTER_VALIDATE_INT) === false)
			return null;

		$sql = "SELECT * FROM blog WHERE id = :id";
		$stmt = $this->connector->prepare($sql);
		$stmt->execute([":id" => $id]);

		$l = $stmt->fetch();

		if(!$l)
			return null;

		$post = new Post();
		$post->setId($l['id']);
		$post->setTitle($l['title']);
		$post->setHeader($l['header']);
		$post->setContent($l['content']);
		$post->setAuthor($l['author']);
		$post->setPublication($l['publication']);
		$post->setLastUpdate($l['last_update']);

		$stmt->closeCursor();

		return $post;
	}

	/**
	 * Create a blog post
	 * @param array $args
	 * @return string
	 */
	public function createPost($args)
	{
		$sql = "INSERT INTO blog (title, header, content, author) VALUES (:title, :header, :content, :author)";
		$stmt = $this->connector->prepare($sql);
		$stmt->bindParam(":title", $args['title']);
		$stmt->bindParam(":header", $args['header']);
		$stmt->bindParam(":content", $args['content']);
		$stmt->bindParam(":author", $args['author']);
		$stmt->execute();

		$id = $this->connector->getLastId();

		return $id;
	}

	/**
	 * Edit a blog post
	 * @param array $args
	 */
	public function editPost($args)
	{
		$sql = "UPDATE blog SET title = :title, header = :header, content = :content, author = :author WHERE id = :id";
		$stmt = $this->connector->prepare($sql);
		$stmt->bindParam(":id", $args['id']);
		$stmt->bindParam(":title", $args['title']);
		$stmt->bindParam(":header", $args['header']);
		$stmt->bindParam(":content", $args['content']);
		$stmt->bindParam(":author", $args['author']);
		$stmt->execute();
	}
}