<?php

namespace Blog\Models;

class Post
{

	private $id;
	private $title;
	private $header;
	private $content;
	private $url;
	private $publication;
	private $last_update;

	public function __construct()
	{
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param mixed $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return mixed
	 */
	public function getHeader()
	{
		return $this->header;
	}

	/**
	 * @param mixed $header
	 */
	public function setHeader($header)
	{
		$this->header = $header;
	}

	/**
	 * @return mixed
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @param mixed $content
	 */
	public function setContent($content)
	{
		$this->content = $content;
	}

	/**
	 * @return mixed
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @param mixed $url
	 */
	public function setUrl($url)
	{
		$this->url = $url;
	}

	/**
	 * @return mixed
	 */
	public function getPublication()
	{
		return $this->publication;
	}

	/**
	 * @param mixed $publication
	 */
	public function setPublication($publication)
	{
		$this->publication = $publication;
	}

	/**
	 * @return mixed
	 */
	public function getLastUpdate()
	{
		return $this->last_update;
	}

	/**
	 * @param mixed $last_update
	 */
	public function setLastUpdate($last_update)
	{
		$this->last_update = $last_update;
	}


}