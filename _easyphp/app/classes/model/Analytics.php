<?php defined('SYSPATH') or die('No direct script access.');
class Analytics 
{
	static private $_instance = null;
	static function ins(){
		if(self::$_instance == null){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	//添加一次访问记录。
	function addPv(){
		$dateStr = date('Y-m-d', time());
		$r = db::mysql_query("select * from pvuv where cdate='{$dateStr}'");
		if($r->num_rows == 0){
			db::mysql_query("insert into pvuv values ('{$dateStr}', 1, 1)");
		}else{
			$data = $r->fetch_array();
			$pv = $data['pv'] + 1;
			db::mysql_query("update pvuv set pv={$pv} where cdate='{$dateStr}'");
		}
	}
	
	function getTable($begin, $end){
		if($begin == NULL && $end == NULL){
			return db::mysql_query("SELECT * FROM pvuv");
		}
		
		if($begin == NULL){
			return db::mysql_query("SELECT * FROM pvuv WHERE cdate<='{$end}'");	
		}
		
		if($end == NULL){
			return db::mysql_query("SELECT * FROM pvuv WHERE cdate>='{$begin}'");		
		}
		
		return db::mysql_query("SELECT * FROM pvuv WHERE cdate>='{$begin}' AND cdate<='{$end}'");
	}
}
