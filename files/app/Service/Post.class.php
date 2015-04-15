<?php

/*
 * Trait post to check
 * superglobal array _POST
 */

namespace Service;

/**
 * Description of post
 *
 * @author Максим
 */
trait Post 
{
    protected $post;
    
    function __construct()
    {
        $this -> post = &$_POST;
    }
    
    /**
     * isSend
     * @return boolean
     */

    public function isSend()
    {
        return ( bool )( !empty( $this -> post ) );
    }
    
    /**
     * magic __get
     * @name string $name
     * @return mixed $value
     */

    public function __get( $name )
    {
        return array_key_exists( $name, $this -> post ) ? $this -> post[ $name ] : FALSE;
    } 
}