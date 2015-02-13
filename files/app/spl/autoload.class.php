<<<<<<< HEAD
<?php

/* 
 * Autoload classes use spl functions
 * class SPL_Autoload
 * 
 * 
 */

namespace Main;

class Autoload
{
    function __construct()
    {
        $this -> load();
        $this -> register();
    }
    
    protected function load()
    {
        $this -> autoload_namespace();
    }
    
    protected function register()
    {
        spl_autoload_register();
        spl_autoload_register(array($this, 'autoload_classes'));
        spl_autoload_register(array($this, 'autoload_app_classes'));
    }
    
    private function autoload_namespace()
    {
        spl_autoload_extensions(".php");
    }
    
    private function autoload_classes( $class )
    {
        preg_replace("![_\\]!i", "/", $class);
        
        $doc_root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
        
        if (is_file($doc_root . '/files/' . $class . '.class.php'))
        {
            require_once $doc_root . '/files/' . $class . '.class.php';
        }
    }
    
    private function autoload_app_classes( $class )
    {        
        preg_replace("![_\\]!i", "/", $class);
        
        $doc_root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');

        if (is_file($doc_root . '/files/app/' . $class . '.class.php'))
        {
            require_once $doc_root . '/files/app/' . $class . '.class.php';
        }        
    }  
    
    private function autoload_service_classes( $class )
    {
        str_replace("![_\\]!i", "/", $class);
        
        $doc_root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');

        if (is_file($doc_root . '/files/app/service/' . $class . '.class.php'))
        {
            require_once strtolower($doc_root . '/files/app/service/' . $class . '.class.php');
        }        
    }
    
    
    
}
=======
<?php

/* 
 * Autoload classes use spl functions
 * class SPL_Autoload
 * 
 * 
 */

namespace Main;

class Autoload
{
    function __construct()
    {
        $this -> load();
        $this -> register();
    }
    
    protected function load()
    {
        $this -> autoload_namespace();
    }
    
    protected function register()
    {
        spl_autoload_register();
        spl_autoload_register(array($this, 'autoload_classes'));
        spl_autoload_register(array($this, 'autoload_app_classes'));
    }
    
    private function autoload_namespace()
    {
        spl_autoload_extensions(".php");
    }
    
    private function autoload_classes( $class )
    {
        str_replace("![_\\]!i", "/", $class);
        
        $doc_root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
        
        if (is_file($doc_root . '/files/' . $class . '.class.php'))
        {
            require_once $doc_root . '/files/' . $class . '.class.php';
        }
    }
    
    private function autoload_app_classes( $class )
    {        
        str_replace("![_\\]!i", "/", $class);
        
        $doc_root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');

        if (is_file($doc_root . '/files/app/' . $class . '.class.php'))
        {
            require_once $doc_root . '/files/app/' . $class . '.class.php';
        }        
    }  
    
    private function autoload_service_classes( $class )
    {
        str_replace("![_\\]!i", "/", $class);
        
        $doc_root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');

        if (is_file($doc_root . '/files/app/service/' . $class . '.class.php'))
        {
            require_once strtolower($doc_root . '/files/app/service/' . $class . '.class.php');
        }        
    }
    
    
    
}
>>>>>>> c45e4b773b700558ec12fc9cf3fd9173300284de
