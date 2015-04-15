<?php

/* 
 * Autoload classes use spl functions
 * class SPL_Autoload
 */

namespace Main;

class Autoload
{
    function __construct()
    {
        $this -> autoload_namespace();
        $this -> register();
    }
    
    protected function register()
    {
        spl_autoload_register();
        spl_autoload_register(array($this, 'autoload_classes'));
        spl_autoload_register(array($this, 'autoload_app_classes'));
        spl_autoload_register(array($this, 'autoload_service_classes'));
    }
    
    private function autoload_namespace()
    {
        spl_autoload_extensions(".php");
    }

    private function load( $path )
    {
        $class = str_replace( "\\", "/", $path );
        
        $doc_root = realpath( dirname( __DIR__ ) . "/../../");
        
        if (is_file($doc_root . $path . '.class.php'))
        {
            require_once $doc_root . $path . '.class.php';
        }
    }
    
    private function autoload_classes( $class )
    {
        $this -> load( '/files/' . $class );
    }
    
    private function autoload_app_classes( $class )
    {        
        $this -> load( '/files/app/' . $class );
    }  
    
    private function autoload_service_classes( $class )
    {
        $this -> load( '/files/app/service' . $class );
    }
    
    
    
}