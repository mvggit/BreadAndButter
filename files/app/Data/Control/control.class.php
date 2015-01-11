<?php

/* 
 * Class AuthControl.
 * must be small refactoring
 */

namespace Data\Control;
use View\View;

class Control {
    
    private $_db;
    private $classname;
    
    /*
     * Control->__construct
     * @param $object set views folder.
     * @param $type set views file
     */
    
    function __construct($db, $object) {
        
        $this -> _db = $db;
        $this -> classname = $object;
        
        $this -> loadClass();
    }

    function loadClass() {
        
        if (!empty( $this -> classname['action']) ) {
            $class = 'Data\Control\\' . ucfirst( $this->classname['action'] ) . ucfirst( "control" );
            $data = array_key_exists('do', $this -> classname)
                        ? new $class( $this -> _db, $this->classname['action'], $this -> classname )
                        : new $class( $this -> _db );
            $view = new View( $data -> view );            
        }
        else {
            $view = new View( );
        }
        
        $view -> render(); 
        
        
    }
    
    
    
}