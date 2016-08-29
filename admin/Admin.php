<?php

class Admin
{	
	$_profile;
	$_login;

	function isLogin()
	{
		return $this->_profile->isLogin();
	}
	
	function login($username, $password)
	{
		$code = $this->_login->login();
		if($code >= 0) {
			$this->_profile->load($code);
		}
	}
	
	function getProfile()
	{
		return $this->_profile;
	}
	
	
}

?>