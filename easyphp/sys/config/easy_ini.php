<?php defined('SYSPATH') OR die('No direct script access.');
easy::$paths = array(SYSPATH.'classes/', 
					SYSPATH.'classes/module/', 
					APPPATH.'classes/controller/', 
					APPPATH.'classes/model/',
					APPPATH.'classes/module/',
					APPPATH.'classes/');

easy::$cacheLifetime = 3600;
