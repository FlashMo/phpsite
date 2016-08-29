<?php defined('SYSPATH') or die('No direct script access.');
class AnalyticsController {
	function pv(){
		Analytics::addPv();
	}
}
