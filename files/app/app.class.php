<?php

/* 
 * App class it's a main class who load other's classes.
 */

namespace Main;


use Main\Autoload;
use Db\DataBase;
use Data\Control\Control;
use Request\Request;


final class App
{
    public static $_db;
    public static $_request;
    
    private static $instance;


    protected function __construct()
    {
        new Autoload();
        
        $_request = new Request();
        self::$_request = &$_request->handle();
        
        DataBase::instance();
        self::$_db = DataBase::connection();
    }
    
    public static function instance()
    {
        if (empty(self::$instance))
        {
            self::$instance = new App();
        }
        
        return self::$instance;
    }
    
    public static function init()
    {
        try
        {
            self::instance();
            new Control(self::$_db, self::$_request);
        } 
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }

    
    
}
