<?php

/**
 * Session class to implements
 * functions for session
 * 
 */

namespace Service;

class Session {

    protected static $session = array();
    
    function __construct() {
        
        ;
    }
    
    /**
     * Get elemets $_SESSION array.
     * When elements not exists
     * functions get
     * return NULL.
     * 
     */
    
    static function get( $key ){
        
        return array_key_exists( $key, self::$session) ? self::$session[ $key ] : NULL;
    }

    /**
     * Set elemets to $_SESSION array.
     * When set's failed
     * set return false.
     * 
     */    
    
    static function set( $name, $value ) {
        
        self::$session[ $name ] = $value;
    }
    
    
}
