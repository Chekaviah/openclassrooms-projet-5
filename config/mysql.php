<?php

if (!function_exists('ifdefine')) {
	function ifdefine($k, $v) {
		defined($k) || define($k, $v);
	}
}

if (file_exists(APP_ROOT.'config/local_mysql.php'))
	require_once APP_ROOT.'config/local_mysql.php';

ifdefine('MYSQL_DB_NAME', '...');
ifdefine('MYSQL_PORT', '...');
ifdefine('MYSQL_USERNAME', '...');
ifdefine('MYSQL_PASSWORD', '...');