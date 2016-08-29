<?php defined('SYSPATH') or die('No direct script access.');
class WelcomeController{
	function index(){
		header("location: index.php?c=admin");
		exit;
	}
}
