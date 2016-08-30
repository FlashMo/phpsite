<?php defined('SYSPATH') or die('No direct script access.');

class log
{
	static $rules;
	
	static function write($type, $target, $message){
		$logFile = null;
		foreach(self::$rules as $typeFilter=>$file){
			if($typeFilter == $type){
				$logFile = $file;
				break;
			}
		}
		
		if($logFile != null){
			$filePath = APPPATH.'log/'.$logFile;
			$data = "$type ".date('Y.m.d H:i:s', time())." {$target}: {$message}\n";
			try{
				return (bool) file_put_contents($filePath, $data, FILE_APPEND);	
			}catch(Exception $e){
				//if can not write log just continue and the function will return false.
			}
		}
		
		return false;
	}
}

require SYSPATH.'config/log_ini'.EXT;
