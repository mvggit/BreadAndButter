<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Data\Control;

use Service\Session;

/**
 * @author Максим
 */
class logoutcontrol {
    
    public $view = array();
    
    function __construct($db, $object = 'about', $type = 'about') {
        
        Session::destroy( 'info' );
        Session::destroy( 'name' );
    }

    

}





