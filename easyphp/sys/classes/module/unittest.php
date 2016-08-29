<?php defined('SYSPATH') or die('No direct script access.');
class unittest
{
	static $tests;
	static function run(){
		$dir = APPPATH.'tests/';
		foreach(self::$tests as $file){
			$filePath = $dir.$file;
			echo "<h2>Test: {$filePath}</h2>";
			echo "<p>";
			$result = include $filePath;
			echo "</p>";
			if($result == true){
				echo '<div style="width:200px; text-align:center; background:#00ff00;">Accept</div>';
			}else{
				echo '<div style="width:200px; text-align:center; background:#ff0000;">Fail</div>';
			}
		}
	}
}
