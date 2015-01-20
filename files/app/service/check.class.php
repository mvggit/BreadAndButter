<?php

/* 
 * Class Check.
 */

namespace Service;

trait Check {
    
    public function checkHash( $hash = '' ) {
        
        $gethash = Get :: get('hash', 'auth', 'hash = \'' . $hash . '\'')[0]['hash'];
        return ( $gethash == $hash) ? true : false;
        
    }

    public function checkBlocked( $hash = '' ) {
        
        $blocked = Get :: get('blocked', 'auth', 'hash = \'' . $hash . '\'')[0]['blocked'];
        return $blocked ? false : true;

    }    

    
    
}