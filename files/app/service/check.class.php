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
    
    public function checkHash( $hash = '' ) {
        
        $gethash = Get :: get('hash', 'auth', 'hash = \'' . $hash . '\'')[0]['hash'];
        return ( $gethash == $hash) ? true : false;
        
        
    }

    public function checkBlocked( $hash = '' ) {
        
        $blocked = Get :: get('blocked', 'auth', 'hash = \'' . $hash . '\'')[0]['blocked'];
        return $blocked ? false : true;

        
    }    
    
    
}