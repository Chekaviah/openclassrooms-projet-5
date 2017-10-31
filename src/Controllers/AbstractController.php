<?php

namespace Blog\Controllers;

abstract class AbstractController
{

	protected $_view_vars = [];

	protected function set($name, $value)
	{
		$this->_view_vars[$name] = $value;
	}

	protected function getVars()
	{
		return $this->_view_vars;
	}
}