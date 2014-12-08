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

trait Check {
    
    public static $_db;
    
    static function checkHash( $hash = '' ) {
        
        //TODO: static :: $_db is a temp construction
        
        self :: $_db -> select( 'hash', 'auth', 'hash = \'' . $hash . '\'');
        return true;
    }

    static function checkBlocked( $hash = '' ) {
        
        return true;
    }    
    
    static function checkSession( $hash = '' ) {
        
        return false;
    }     

    
}