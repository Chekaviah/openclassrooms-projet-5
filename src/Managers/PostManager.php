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

	public function getPost()
	{
		$sql = "SELECT * FROM blog";
		$result = $this->connector->query($sql);
		$result->execute();

		$r = [];
		while ($l = $result->fetch($this->connector->assoc)) {
			$post = new Post();
			$post->setId($l['id']);
			$post->setTitle($l['title']);
			$post->setHeader($l['header']);
			$post->setContent($l['content']);
			$post->setUrl($l['url']);
			$post->setPublication($l['publication']);
			$post->setLastUpdate($l['last_update']);

			/*
			$post = (new PostBuilder())
							->setId($l['id'])
							->setTitle($l['title'])
							->build();
			*/

			$r[] = $post;
		}

		$result->closeCursor();

		return $r;
	}
}