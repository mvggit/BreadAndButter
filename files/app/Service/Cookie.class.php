<?php

/**
 * Cookie
 */

namespace Service;

trait Cookie 
{

    /**
     * function get
     * 
     * @param type $cookie
     * @return boolean
     */
    
    static function get( $cookie )
    {
        return filter_input(INPUT_COOKIE, $cookie);
    }

    /**
     * function set
     * 
     * @param type $name
     * @param type $value
     * @return boolean
     */
    
    static function set( $name, $value, $expire = FALSE )
    {
        return setcookie ( $name , $value , $expire ? $expire : time() * 3600 * 24 );
    }
}