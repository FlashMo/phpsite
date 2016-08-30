<?php defined('SYSPATH') or die('No direct script access.');

//load core
require SYSPATH.'classes/Core'.EXT;

/**
 * Set the default time zone.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/timezones
 */
//date_default_timezone_set("Etc/GMT+8");
//date_default_timezone_get();
date_default_timezone_set('PRC'); // set china time zone.

/**
 * Set the default locale.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/function.setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @link http://kohanaframework.org/guide/using.autoloading
 * @link http://www.php.net/manual/function.spl-autoload-register
 */
spl_autoload_register(array('easy', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @link http://www.php.net/manual/function.spl-autoload-call
 * @link http://www.php.net/manual/var.configuration#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

/**
 * Set the mb_substitute_character to "none"
 *
 * @link http://www.php.net/manual/function.mb-substitute-character.php
 */
mb_substitute_character('none');

/*
// Enable Kohana exception handling, adds stack traces and error source.
set_exception_handler(array('Kohana_Exception', 'handler'));

// Enable Kohana error handling, converts all PHP errors to exceptions.
set_error_handler(array('Kohana', 'error_handler'));

// Enable the Kohana shutdown handler, which catches E_FATAL errors.
register_shutdown_function(array('Kohana', 'shutdown_handler'));
*/


//call the route module to resolve the request.
route::execute();


//call the test module to test code.
/*
unittest::$tests = array('log_test.php', 'easy_test.php');
unittest::run();
*/
