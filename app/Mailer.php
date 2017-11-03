<?php

namespace App;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mailer
{
	private static $_instance;
	private $mailer;

	public static function getInstance()
	{
		if(is_null(self::$_instance))
			self::$_instance = new Mailer();

		return self::$_instance;
	}

	private function __construct()
	{
		$transport = new Swift_SmtpTransport();
		$this->mailer = new Swift_Mailer($transport);
	}

	public function sendMail(Swift_Message $mail)
	{
		return $this->mailer->send($mail);
	}
}