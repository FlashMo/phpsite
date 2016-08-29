<?php
/*
set the env values
*/
define('SYSPATH', realpath('sys').'/');
define('APPPATH', realpath('app').'/');
define('VIEWPATH', realpath('app/view').'/');
define('EXT', '.php');

/*
start app
*/
require APPPATH.'bootstrap'.EXT;


