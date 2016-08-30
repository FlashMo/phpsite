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
		$code = $this->_login->login($username, $password);
		if($code >= 0) {
			$this->_profile = new AdminProfile()->load($code);
		}
	}
	
	function logout()
	{
		$this->_profile->unload();
	}
	
	function getProfile()
	{
		return $this->_profile;
	}
	
	
}

?>