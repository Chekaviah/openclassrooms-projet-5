<?php

namespace Blog\Connectors;

use PDO;

class MysqlConnector
{
	private $connection = null;
	public $assoc = PDO::FETCH_ASSOC;

	public function __construct()
	{
		$this->MYSQL_HOST = MYSQL_HOST;
		$this->MYSQL_PORT = MYSQL_PORT;
		$this->MYSQL_DBNAME = MYSQL_DBNAME;
		$this->MYSQL_USERNAME = MYSQL_USERNAME;
		$this->MYSQL_PASSWORD = MYSQL_PASSWORD;
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
		try {
			$this->connection = new PDO("mysql:host=$this->MYSQL_HOST;dbname=$this->MYSQL_DBNAME", $this->MYSQL_USERNAME, $this->MYSQL_PASSWORD);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (\PDOException $e) {
			echo $e->getTraceAsString();
			die('echec db connection');
		}
	}
}