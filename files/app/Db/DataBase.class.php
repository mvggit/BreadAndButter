<?php

/* 
 * Main DataBase class.
 */
    
namespace Db;

use Db\MySQLi;


class DataBase 
{
    private static $instance;

    public static function instance() 
    {
        if (empty(self::$instance)) 
        {
            self::$instance = new Database();
        }
        
        return self::$instance;
        
    }
    
    public static function connection() 
    {
        return self::instance() -> MySQLi();
    }
    
    public function MySQLi( $host = '127.0.0.1', $uname = 'root', $upass = '1111', $udbname = 'shop' ) 
    {
        return new MySQLi( $host, $uname, $upass, $udbname );
    }
}
