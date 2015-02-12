<?php

/* 
 * Class AuthControl.
 */

namespace Data\Control;
use View\View;

class Control 
{
    
    private $_db;
    
    /*
     * Control->__construct
     * @param $db link to database connection.
     * @param $request link to get request param
     */
    
    function __construct($db, $request)
    {
        $this -> _db = $db;
        $this -> loadClass( $request );
    }

    function loadClass( $request )
    {
        if ( array_key_exists( 'action', $request) )
        {
            $class = 'Data\Control\\' . ucfirst( $request['action'] ) . ucfirst( "control" );
            $data = new $class( $this -> _db, $request );
            $view = new View( $data -> view );
        }
        else 
        {
            $view = new View( );
        }
        $view -> render(); 
    }
    
    
    
}