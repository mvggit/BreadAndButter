<?php

/* 
 * Class AuthControl.
 * Adapter pattern.
 * 
 * AuthControl adaptee
 * auth operation.
 * 
 */

namespace Data\Control;
use View\View;

class Control {
    
    private $_Db;
    private $classname;
    
    /*
     * Control->__construct
     * @param $object set views folder.
     * @param $type set views file
     */
    
    function __construct($db, $object) {
        
        $this -> _Db = $db;
        $this -> classname = $object; 
        
        $this -> loadClass();
    }

    function loadClass() {
        
        if (!empty( $this -> classname['action']) ) {
            $class = 'Data\Control\\' . ucfirst( $this->classname['action'] ) . ucfirst( "control" );
            $data = new $class( $this -> _Db );
            $view = new View( $data -> view );            
        }
        else {
            $view = new View( );
        }
        

        $view -> render(); 
    }
    
    
}