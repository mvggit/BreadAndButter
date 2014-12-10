<?php

/* 
 * Class LoginControl.
 * is concrete product
 * Abstract Fabrics.
 * 
 */

namespace Data\Control;

use Service\Check;


class RegistrationControl {
    use Check;
    
    public $view = array();
    
    function __construct($db, $object = 'registration', $type = 'registration') {
        
        Check::$_db = $db;
        if (Check::checkHash() && Check::checkBlocked()) {

            ;
        }
        
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $object ."/". $type .".php";        
    }

    
}