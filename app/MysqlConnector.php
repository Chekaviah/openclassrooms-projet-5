<?php

namespace App;

use PDO;

class MysqlConnector
{
	/** @var PDO $connection  */
	private $connection = null;
	private static $_instance;
	public $assoc = PDO::FETCH_ASSOC;
	private $host;
	private $port;
	private $dbname;
	private $username;
	private $password;

	public static function getInstance()
	{
		if(is_null(self::$_instance))
			self::$_instance = new MysqlConnector();

		return self::$_instance;
	}

	private function __construct()
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

		$stmt = $this->connection->prepare($query);
		return $stmt;
	}

	private function connect()
	{
		try {
			$this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (\PDOException $e) {
			echo $e->getTraceAsString();
			die('echec db connection');
		}
	}
}