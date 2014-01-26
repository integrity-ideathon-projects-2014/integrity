<?php

/**
 * DIRECTORY_SEPERATOR \ for Windows and / for UNIX a like systems
 */
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

/**
* LIB directory
*/
defined('LIB_PATH') ? null : define('LIB_PATH', dirname(__DIR__));


/**
 * Load error report configuration file
 */
require_once(LIB_PATH.DS.'config'.DS.'error_report.inc.php');

/**
 * Development environment 
 * Constants are defined in lib/config/error_report.inc.php
 */
if(Error_Report\DEV_ENV){
    error_reporting(E_ALL | E_STRICT);
}

/**
 * Load log4php
 */
require_once(LIB_PATH.DS.'log4php'.DS.'Logger.php');
Logger::configure(LIB_PATH.DS.'config'.DS.'log4php.inc.php');

/**
 * Set error handler
 */
#@set_error_handler('Error_Report\errorHandler');

/**
 * Set exception handler
 */
@set_exception_handler('Error_Report\exceptionHandler');


/**
 * Load smarty templating library
 */
require_once(LIB_PATH.DS.'smarty'.DS.'Smarty.class.php');

/**
 * Auto load function for classes
 *
 * @param string $class Name of class to be instanciated
 */
spl_autoload_register (function ($class) {
    $filename = LIB_PATH.DS.'class'.DS.strtolower($class).'.class.php';
    if(file_exists($filename)){
        require_once($filename);
    } else {
        Error_Report\logger('File', 'fatal', 'Unable to locate '.$filename, 'Internal error :(');
    }  
});

