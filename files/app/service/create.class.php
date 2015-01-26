<?php

/* 
 * Class Create.
 */

namespace Service;

trait Create {
    
    public $param = array();
    
    function create( $table ) {
        
        if ( empty( $this -> _db ) ) {
            
            throw new \Exception( 'Database exception: undefined database identifier' );
        }
        
        return $this -> _db -> run( $this -> _db -> insert( $table, $this -> param ) );
    }
    
    function setparam( $key, $value ) {
        
        $this -> param[ $key ] = $value;
        return $this;
    }
    
    function unsetparam() {
        
        unset( $this -> param );
        return $this;
    }

    
    
}