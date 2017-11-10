<?php

if (file_exists(APP_ROOT.'config/local_config.php'))
	return require APP_ROOT.'config/local_config.php';

return [
	'MYSQL_HOST' => '',
	'MYSQL_PORT' => '',
	'MYSQL_DBNAME' => '',
	'MYSQL_USERNAME' => '',
	'MYSQL_PASSWORD' => '',
	'MAIL_HOST' => '',
	'MAIL_PORT' => '',
	'MAIL_USERNAME' => '',
	'MAIL_PASSWORD' => ''
];