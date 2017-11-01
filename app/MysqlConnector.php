<?php

namespace App;

use PDO;

class MysqlConnector
{
	private $connection = null;
	private $config;
	public $assoc = PDO::FETCH_ASSOC;

	public function __construct()
	{
		$config = Config::getInstance();
		$this->host = $config->get('MYSQL_HOST');
		$this->port = $config->get('MYSQL_PORT');
		$this->dbname = $config->get('MYSQL_DBNAME');
		$this->username = $config->get('MYSQL_USERNAME');
		$this->password = $config->get('MYSQL_PASSWORD');
	}

	public function query($query)
	{
		if($this->connection == null)
			$this->connect();

		$result = $this->connection->query($query);
		return $result;
	}

	private function connect()
	{
		var_dump($this->host);
		try {
			$this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (\PDOException $e) {
			echo $e->getTraceAsString();
			die('echec db connection');
		}
	}
}