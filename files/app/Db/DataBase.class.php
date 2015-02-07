<?php

/* 
 * Main DataBase class.
 */
    
//TODO read and undestend namespace;


namespace Db;

use Db\MySQLi;
use Db\PDO;


class Database 
{
    private static $instance;

    
    private function __construct() 
    {
        ;
    }
    
    public static function instance() 
    {
        if (empty(self::$instance)) 
        {
            self::$instance = new Database();
        }
        
        return self::$instance;
        
    }
    
    public static function connection( $_method = 'MySQLi' ) 
    {
        return self::instance() -> $_method();
    }
    
    public function MySQLi( $host = '127.0.0.1', $uname = 'root', $upass = '1111', $udbname = 'shop' ) 
    {
        return new MySQLi( $host, $uname, $upass, $udbname );
    }
    
    public function PDO( $dsn = '', $uname = 'root', $upass = '1111', $options = '' ) 
    {
        return new PDO($dsn, $uname, $upass, $options);
    }
    
    
    
}