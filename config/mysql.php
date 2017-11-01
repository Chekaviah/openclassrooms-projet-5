<?php

if (file_exists(APP_ROOT.'config/local_mysql.php'))
	return require APP_ROOT.'config/local_mysql.php';

return [
	'MYSQL_HOST' => '',
	'MYSQL_PORT' => '',
	'MYSQL_DBNAME' => '',
	'MYSQL_USERNAME' => '',
	'MYSQL_PASSWORD' => ''
];