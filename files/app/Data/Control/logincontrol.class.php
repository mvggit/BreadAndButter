<?php

/* 
 * Class LoginControl.
 * is concrete product
 * Abstract Fabrics.
 * 
 */

namespace Data\Control;

//TODO Check actuality Session and Cookie classes here.

use Service\Check;


class LoginControl {
    use Check;
    
    public $view = array();
    
    function __construct($db, $object = 'login', $type = 'login') {
        
        Check::$_db = $db;

        //TODO: compleate Check and Get trait function's
        
        if (Check::checkHash() && Check::checkBlocked()) {

            $type = 'logined';
        }
        
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $object ."/". $type .".php";        
    }

    
}