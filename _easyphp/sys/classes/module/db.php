<?php defined('SYSPATH') or die('No direct script access.');
class db{
	static $host;
	static $username;
	static $password;
	static $database;
	
	static private $mysqli = null;
	
	static function mysql(){
		if(self::$mysqli == null || self::$mysqli->ping() == false){
			// connect database
			self::$mysqli = @new mysqli(self::$host, self::$username, self::$password, self::$database);
			// if connect failed clean the connection and throw the exception
			if ($error = self::$mysqli->connect_error) {
				self::$mysqli = null;
				throw new Exception($error);
			}
        }
        return self::$mysqli;
	}
	
	static function mysql_query($sql, $mysql=null){
		if($mysql == null){
			$mysql = self::mysql();	
		}
		$r = $mysql->query($sql);
		/*
		if query failed display the error message.
		*/
		if($r == false){
			die('sql error:'.$mysql->error);
		}
		return $r;
	}
	
	/*
	query with an sql file's content.
	*/
	static function mysql_source($content){
		$mysql = self::mysql();	
		$arr = explode(';', $content);
		foreach($arr as $sql){
			self::mysql_query($sql, $mysql);
		}
	}
}

require SYSPATH.'config/db_ini'.EXT;
