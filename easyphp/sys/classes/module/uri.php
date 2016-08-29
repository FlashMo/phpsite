<?php defined('SYSPATH') or die('No direct script access.');
class uri
{
	/*
	let browser redirect to another uri.
	*/
	static function redirect($uri){
		header("location: ".$uri);
		exit;
	}
	
	/*
	make a easyphp style url request link. the link is return as a string.
	*/
	static function make($controller, $method, $arr, $rooturl=''){
		$url = $rooturl."index.php?c={$controller}&m={$method}";
		foreach ($arr as $key=>$value){
			$url.="&{$key}={$value}";
		}
		return $url; 
	}
	
	/*
	*/
	
}
