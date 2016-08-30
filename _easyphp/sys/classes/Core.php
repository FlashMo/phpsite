<?php defined('SYSPATH') OR die('No direct script access.');
class easy{
	const VERSION = '0.0.1';
	const CACHE_FOEVER = 'cache_forever';

	//	paths that should be searched when query a class
	static $paths;
	
	// default cache lifetime
	static $cacheLifetime;
	
	//	class loading strategy
	static function auto_load($class){
		$classPath = easy::findFile($class.EXT);
		if($classPath){
			require $classPath;
			return true;
		}
		return false;
	}
	
	static function cache($key, $data = null, $lifetime = null){
		$file = md5($key);
		$dir = APPPATH.'cache/';
		$filePath = $dir.$file;
		
		if($lifetime === null){
			$lifetime = self::$cacheLifetime;
		}
		
		if($data === null){ // get cache
			if(is_file($filePath)){
				// easy::CACHE_FOEVER means never expired
				if($lifetime === easy::CACHE_FOEVER || time() - filemtime($filePath) < $lifetime){
					try{
						return unserialize(file_get_contents($filePath));
					}catch(Exception $e){
						
					}
				}else{
					// cache has expired
					try{
						unlink($filePath);
					}catch(Exception $e){
						
					}
				}
			}
			return null;
		}else{ // set cache
			// Write the cache
			
			try{
				$data = serialize($data);
				return (bool) file_put_contents($filePath, $data, LOCK_EX);		
			}catch(Exception $e){
				return false;	
			}
		}
	}
	
	static function findFile($fileName){
		//search every path to see the file
		foreach(easy::$paths as $path){
			$filePath = $path.$fileName;
			if(is_file($filePath)){
				return $filePath;
			}	
		}
		
		//return null, if can not finde the file
		return null;
	}
}

//	load the config
require SYSPATH.'/config/easy_ini'.EXT;

