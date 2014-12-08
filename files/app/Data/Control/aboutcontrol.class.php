<?php

/* 
 * Class LoginControl.
 * is concrete product
 * Abstract Fabrics.
 * 
 */

namespace Data\Control;

use Service\Session;
use Service\Cookie;

use Service\Check;
use Service\Get;


class AboutControl {
    
    public $view = array();
    
    function __construct($db, $object = 'about', $type = 'about') {
        

        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $object ."/". $type .".php";        
    }

    
}