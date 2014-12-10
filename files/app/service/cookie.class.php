<?php

/**
 * Class Cookie
 * service class
 * implements functions
 * for _COOKIE 
 * connetctions
 * 
 */

namespace Service;

class Cookie {
    
    protected static $cookie = array();
    
    function __construct() {
        ;
    }
    
    /**
     * Get elemets $_COOKIE array.
     * When elements not exists
     * functions get
     * return NULL.
     * 
     */
    
    static function get( $param ) {
        
        return array_key_exists( $param, self::$cookie ) ? self::$cookie[ $param ] : NULL;
    }

    /**
     * Set elemets to $_COOKIE array.
     * When set's failed
     * set return false.
     * 
     */
    
    static function set( $name, $value ) {
        
        return self::$cookie[$name] = $value;
    }

    
}