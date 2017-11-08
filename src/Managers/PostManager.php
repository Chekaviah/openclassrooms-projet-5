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

	public function getPostById($id)
	{
		if($id != 0 && !filter_var($id, FILTER_VALIDATE_INT))
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

		/*
		$post = (new PostBuilder())
						->setId($l['id'])
						->setTitle($l['title'])
						->build();
		*/

		$stmt->closeCursor();

		return $post;
	}

	public function createPost($title, $header, $content, $author)
	{
		$sql = "INSERT INTO blog (title, header, content, author) VALUES (:title, :header, :content, :author)";
		$stmt = $this->connector->prepare($sql);
		$stmt->bindParam(":title", $title);
		$stmt->bindParam(":header", $header);
		$stmt->bindParam(":content", $content);
		$stmt->bindParam(":author", $author);
		$stmt->execute();

		$id = $this->connector->getLastId();

		return $id;
	}

	public function editPost($id, $title, $header, $content, $author)
	{
		$sql = "UPDATE blog SET title = :title, header = :header, content = :content, author = :author WHERE id = :id";
		$stmt = $this->connector->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":title", $title);
		$stmt->bindParam(":header", $header);
		$stmt->bindParam(":content", $content);
		$stmt->bindParam(":author", $author);
		$stmt->execute();
	}
}