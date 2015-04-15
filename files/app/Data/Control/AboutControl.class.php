<?php

/* 
 * Class AboutControl.
 */

namespace Data\Control;


class AboutControl 
{    
    public $view = array();
    
    function __construct( $db, $request ) 
    {
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/" . $request['action'] . "/" . $request['action'] . ".php";        
    }

    
    
}