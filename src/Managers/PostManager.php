<?php
namespace Blog\Managers;

use App\AbstractModel;
use App\MysqlConnector;
use Blog\Models\Post;

class PostManager extends AbstractModel
{

	private $connector;

	public function __construct()
	{
		$this->connector = MysqlConnector::getInstance();
	}

	public function getPostById($id)
	{
		$id = filter_var($id, FILTER_VALIDATE_INT);

		$sql = "SELECT * FROM blog WHERE id = :id";
		$stmt = $this->connector->prepare($sql);
		$stmt->execute([":id" => $id]);

		$l = $stmt->fetch();

		$post = new Post();
		$post->setId($l['id']);
		$post->setTitle($l['title']);
		$post->setHeader($l['header']);
		$post->setContent($l['content']);
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

	public function createPost($title, $header, $content)
	{
		$title = filter_var($title, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$header = filter_var($header, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$content = filter_var($content, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		$sql = "INSERT INTO blog (title, header, content) VALUES (:title, :header, :content)";
		$stmt = $this->connector->prepare($sql);
		$stmt->bindParam(":title", $title);
		$stmt->bindParam(":header", $header);
		$stmt->bindParam(":content", $content);
		$stmt->execute();

		$id = $this->connector->getLastId();

		return $this->getPostById($id);
	}
}