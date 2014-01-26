<?php

/**
 * Auto load function for classes
 *
 * @param string $class Name of class to be instanciated
 
spl_autoload_register (function ($class) {
    $filename = LIB_PATH.DS.'class'.DS.strtolower($class).'.class.php';
    if(file_exists($filename)){
        require_once($filename);
    } else {
        log_error('File', 'fatal', 'Unable to locate '.$filename, 'Internal error');
    }    
});*/

/**
 * Log errors
 *
 * @param string $level     Error level
 * @param string $logMsg    Logging message
 * @param string $source    Point where error encountered
 * @param string $dispMsg   Message to be display to the user 
 */
function log_error($source, $level, $logMsg, $dispMsg){
    $log = Logger::getLogger($source);
    $log->$level($logMsg);
    die($dispMsg);
}
