<?php

/* 
 * Class DataExtended.
 * Extended 
 * containts 
 */

namespace Data;
use View\View;

class DataExtended {
    
    private $_Db;
    private $filename;
    
    function __construct($db, $filename) {
        $this->_Db = $db;
        $this->filename = $filename ;
    }
    
    /**
     * 
     * @param \View\View $_view
     * @return \View\View
     * @throws \Exception
     * 
     * function view
     * who's set views filename
     * and return View object.
     */
    
    function view( $_view ) {
        
        if ($_view instanceof View) {
            
            $_view->filename = $this->filename;
            return $_view;
        }
        
        throw new \Exception("Error render templates");
        
        
    }

    /**
     * 
     * @param string $class
     * @return \Data\class
     * 
     * function loadClass 
     * is return object loaded 
     * class.
     */
    
    function loadClass( $class ) {
        
        $class = 'Data\Auth\\' . $class;
        return new $class( $this -> _Db );
    }
    
    
}