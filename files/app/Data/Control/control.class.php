<?php

/* 
 * Class AuthControl.
 */

namespace Data\Control;
use View\View;

class Control 
{
    
    private $_db;
    private $requestcontents;
    
    /*
     * Control->__construct
     * @param $db link to database connection.
     * @param $request link to get request param
     */
    
    function __construct($db, $request)
    {
        $this -> _db = $db;
        $this -> requestcontents = $request;
        
        $this -> loadClass();
    }

    function loadClass()
    {
        if ( !empty( $this -> requestcontents['action']) )
        {
            $class = 'Data\Control\\' . ucfirst( $this -> requestcontents['action'] ) . ucfirst( "control" );
            $data = new $class( $this -> _db, $this -> requestcontents );
            $view = new View( $data -> view );
        }
        else 
        {
            $view = new View( );
        }
        $view -> render(); 
    }
    
    
    
}