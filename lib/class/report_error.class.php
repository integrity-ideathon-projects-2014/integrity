<?php
    
/**
 * Database actions (DB access, validatiion, etc.)
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to the ... License, available
 * at http://
 *
 * @author      Deepak Adhikari <deeps.adhi@gmail.com>
 * @copyright   2013
 * @license     http://
 * @version     1.0.0
 */

/**
 * Load log4php library
 */
require_once(LIB_PATH.DS.'log4php'.DS.'Logger.php');

class Report_Error
{
    /**
     * Stores a database object
     *
     * @var object A Logger object
     */
    private static $_log;


    /**
     * Protect from cloning 
     */
    private function __clone() {}

    /**
     * Protect from wakeup
     */
    private function __wakeup() {}

    /**
     * Initialize log4php 
     */
    private function __construct(){
        Logger::configure(LIB_PATH.DS.'config'.DS.'log4php.inc.php');
     }

    /**
     * Log error
     *
     * @param string $level     Error level
     * @param string $logMsg    Logging message
     * @param string $source    Point where error encountered
     * @param string $dispMsg   Message to be display to the user 
     */
     public static function logger($source, $level, $logMsg, $dispMsg){
        $_log = Logger::getLogger($source);
        $_log->$level($logMsg);
        self::$_lastErrorMsg = $logMsg;
        if(Error_Report\DISP_ERROR){
            die($logMsg);
        } else {
            die($dispMsg);
        }
     } 
} 
