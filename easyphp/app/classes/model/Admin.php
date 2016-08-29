<?php defined('SYSPATH') or die('No direct script access.');
class Admin{
	static private $_instance = null;
	static function ins(){
		if(self::$_instance == null){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	//login state is stored in $_COOKIE['login']
	function isLogin(){
		if(array_key_exists('login', $_COOKIE) && $_COOKIE['login'] == 1){
			return true;
		}else{
			return false;
		}	
	}
	
	function login($username, $password, $remember){
		try{
			$r = db::mysql_query("select username,password from administrator where username='$username'");
		}catch(Exception $e){
			die($e->getMessage());
		}
		
		if($r && $r->num_rows == 1){
			$success = $r->fetch_row()[1] == $password;
		}else{
			$success = false;
		}
		
		if($success){
			if($remember){
				setcookie('login', 1, time() + 3600 * 24 * 7);
			}else{
				setcookie('login', 1);
			}
		}
		
		return $success;
	}
	
	function logout(){
		return setcookie('login', 0);
	}
}
