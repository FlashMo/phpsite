<?php defined('SYSPATH') or die('No direct script access.');
class route
{
	static $defaultController;
	static $defaultMethod;

	static function execute(){
		$c = array_key_exists('c', $_GET) ? $_GET['c']:route::$defaultController;
		$m = array_key_exists('m', $_GET) ? $_GET['m']:route::$defaultMethod;
	
		//the controller name rule is first upper case with 'Controller' suffix.
		$c = ucfirst($c).'Controller';
		require_once APPPATH.'classes/controller/'.$c.EXT;
		$controler = new $c();
		$controler->$m();
	}

}

require SYSPATH.'config/route_ini'.EXT;
