<?php

/**
 * Session class to implements
 * session operation
 * 
 */

namespace Service;

class Session {

    protected static $session = array();
    
    function __construct() {
        
        ;
    }
    
    /**
     * function get.
     * @param mixed name
     */
    
    public static function get( $name ){

        $variable = ( array_key_exists( $name, $_SESSION ) );
        return $variable ? $_SESSION[ $name ] : false;
    }

    /**
     * function set.
     * @param mixed name
     * @param mixed value
     */    
    
    public static function set( $name, $value ) {
        
        $_SESSION[ $name ] = $value;
    }
    
    /**
     * function search
     * @param mixed $name
     * return bool
     */
    
    public static function search( $name ) {
        
        return array_key_exists( $name, $_SESSION );
    }
    
    /**
     * function destroy
     * @param type $name
     */
    
    public static function destroy( $name ) {
        
        unset( $_SESSION[ $name ] );
    }
    
    
    
}