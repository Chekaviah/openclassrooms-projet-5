<?php
namespace App;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mailer
{
	private static $_instance;
	private $mailer;
	private $config;

	public static function getInstance()
	{
		if(is_null(self::$_instance))
			self::$_instance = new Mailer();

		return self::$_instance;
	}

	private function __construct()
	{
		$this->config = Config::getInstance();

		$transport = (new Swift_SmtpTransport($this->config->get('MAIL_HOST'), $this->config->get('MAIL_PORT')))
			->setUsername($this->config->get('MAIL_USERNAME'))
			->setPassword($this->config->get('MAIL_PASSWORD'));
		$this->mailer = new Swift_Mailer($transport);
	}

	/**
	 * Prepare mail before sending. Return false if mail is incorrect
	 * @param $args
	 * @return Swift_Message|bool
	 */
	public function prepareMail($args)
	{
		$from = filter_var($args['email'], FILTER_VALIDATE_EMAIL);
		$name = $args['name'];
		$content = $args['message'];
		if(!$from)
			return false;

		$mail = (new Swift_Message('Formulaire de contact'))
			->setFrom([$from => $name])
			->setTo([$this->config->get('MAIL_TO')])
			->setBody($content);

		return $mail;
	}

	/**
	 * Send a prepared mail
	 * @param Swift_Message $mail
	 * @return int
	 */
	public function sendMail(Swift_Message $mail)
	{
		return $this->mailer->send($mail);
	}
}