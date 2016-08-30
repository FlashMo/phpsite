<?php
define('SYSPATH', realpath('_easyphp/app').'/');
define('APPPATH', realpath('classes').'/');
define('EXT', '.php');

require SYSPATH.'classes/Core'.EXT;
easy::$paths = array(APPPATH, 
					APPPATH.'common/',
					APPPATH.'entity/');
?>