<?php

/* 
 * Class Check.
 * Adaptee class.
 * 
 * Functionality:
 * Check implements operation's
 * check information in auth Db.
 * 
 */

namespace Service;
use Service\Get;

trait Check {
    use Get;
    
    //public static $_db;
    
    public function checkHash( $hash = '' ) {
        
        return (Get :: get('hash', 'auth', 'hash = \'' . $hash . '\'') == $hash) ? true : false;
        
        
    }

    public function checkBlocked( $hash = '' ) {
        
        $blocked = Get :: get('blocked', 'auth', 'hash = \'' . $hash . '\'');
        return $blocked ? false : true;

        
    }    
    
    
}