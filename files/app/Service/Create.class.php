<?php

/* 
 * Create.
 */

namespace Service;

trait Create 
{
    public $param = array();
    
    public function create( $table )
    {
        if ( empty( $this -> _db ) )
        {
            throw new \Exception( 'Database exception: undefined database identifier' );
        }
        
        return $this -> _db -> run( $this -> _db -> insert( $table, $this -> param ) );
    }
    
    public function setparam( $key, $value )
    {
        $this -> param[ $key ] = $value;
        return $this;
    }
    
    public function unsetparam()
    {
        $this -> param = [];
        return $this;
    }

    
    
}