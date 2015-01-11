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
    
    public static function get( $name ){
        
        return array_key_exists( $name, $_SESSION) ? $_SESSION[ $name ] : NULL;
    }

    /**
     * Set elemets to $_SESSION array.
     * When set's failed
     * set return false.
     * 
     */    
    
    public static function set( $name, $value ) {
        
        $_SESSION[$name] = $value;
    }
    
    public static function destroy( $name ) {
        unset($_SESSION[ $name ]);
    }
}
