<?php
namespace App;

abstract class AbstractManager
{
	private static $instances = array();

	public function __construct()
	{
	}

	public static function getInstance()
	{
		$class = get_called_class();
		if(!isset(self::$instances[$class]))
			self::$instances[$class] = new static();

		return self::$instances[$class];
	}
}