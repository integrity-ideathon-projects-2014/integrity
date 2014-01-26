<?php

/* Database SQL */
    
/**
 * Database SQL (query, insert, update, delete) 
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
 * Load database configuration file
 */
require_once(LIB_PATH.DS.'config'.DS.'db_cred.inc.php');

class DB_Connect
{
    /**
     * Stores a database object
     *
     * @var object A database object
     */
    private static $_db;


    /**
     * Protect from cloning 
     */
    private function __clone() {}

    /**
     * Protect from wakeup
     */
    private function __wakeup() {}

    /**
     * Connects to database
     */
    private function __construct(){
        /**
         * Define constants for configuration info
         * Constants are defined in lib/config/db_cred.inc.php
         */
        $dsn = 'mysql:host=' . DB_Cred\DB_HOST . ';dbname=' . DB_Cred\DB_NAME;
        try{
            @self::$_db = new PDO($dsn, DB_Cred\DB_USER, DB_Cred\DB_PASS);
            @self::$_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e){
            /**
             * If the DB connection fails, log error
             */
            Error_Report\logger(__CLASS__, 'fatal', $e->getMessage(), 'Could not complete your request :(');
        }
    }

    /**
     * Checks for a DB object and creates one if it's not created
     *
     * @return object $_db A database object
     */
     public static function getConnection(){
        if(!self::$_db){
            new self();
        }
        return self::$_db;
    }
} 
