<?php

/**
 * Class Cookie
 */

namespace Service;

trait Cookie {
    
    protected static $cookie = array();
    
    /**
     * Get elemets $_COOKIE array.
     * When elements not exists
     * functions get
     * return NULL.
     * 
     */
    
    static function get( $cookie ) {
        
        return array_key_exists( $cookie, $_COOKIE ) ? $_COOKIE[ $cookie ] : NULL;
    }

    /**
     * Set elemets to $_COOKIE array.
     * When set's failed
     * set return false.
     * 
     */
    
    static function set( $name, $value ) {
        
        //TODO: use function setcookie
        return self::$cookie[$name] = $value;
    }

    
}