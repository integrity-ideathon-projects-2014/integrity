<?php

/* Configuration for error reporting */

namespace Error_Report;

/**
 * Development Environment
 * 
 * @var bool Development environment
 */
$devEnv = true;

/**
 * Display errors
 * 
 * @var bool Display errors
 */
$dispError  = true;

/**
 * Define DEV_ENV if not defined
 */
defined(__NAMESPACE__.'\\'.'DEV_ENV') ? null : define(__NAMESPACE__.'\\'.'DEV_ENV', $devEnv);

/**
 * Define DISP_ERROR if not defined
 */
defined(__NAMESPACE__.'\\'.'DISP_ERROR') ? null : define(__NAMESPACE__.'\\'.'DISP_ERROR', $dispError);


/**
 * Log errors
 *
 * @param string $level     Error level
 * @param string $logMsg    Logging message
 * @param string $source    Point where error encountered
 * @param string $dispMsg   Message to be display to the user 
 */
function logger($source, $level, $logMsg, $dispMsg){
    $log = \Logger::getLogger($source);
    $log->$level($logMsg);
    if(namespace\DISP_ERROR){
        die($logMsg);
    }else{
        die($dispMsg);
    }
}

/**
 * Error handler
 *
 * @param int       $errno      Error number
 * @param string    $errstr     Error in sentence
 * @param string    $errfile    File in which error occured
 * @param int       $errline    Line number in which error encountered
 */
function errorHandler ($errno, $errstr, $errfile, $errline){
    namespace\logger('Error Handler', 'fatal', $errno.' '.$errstr.' '.$errfile.' '.$errline, 'Error Occured :(');    
}

/**
 * Exception handler
 *
 * @param object Exception object
 */
function exceptionHandler(Exception $e) {
    namespace\logger('Exception Handler', 'fatal', $e->getMessage(), 'Error Occured :(');    
}
