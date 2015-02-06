<?php

/*
 * logoutcontrol
 * class to logout operation.
 */

namespace Data\Control;

use Service\Session;

/**
 * @author Максим
 */
class logoutcontrol 
{
    
    public $view = array();
    
    function __construct($db, $object = 'about', $type = 'about')
    {
        Session::destroy( 'info' );
        Session::destroy( 'name' );
        Session::destroy( 'identifiercarts' );
        Session::destroy( 'uin' );
    }

    

}





