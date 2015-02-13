<?php

/* 
 * Class LoginControl.
 * Things to create makeView class
 * who's create html's file path.
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