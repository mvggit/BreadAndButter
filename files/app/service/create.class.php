<?php

/* 
 * Class Create.
 */

namespace Service;

trait Create {
    
    function create( $table, $params ) {
        
        if ( empty( $this -> _db ) ) {
            
            throw new \Exception( 'Database exception: undefined database identifier' );
        }
        
        return $this -> _db -> run( $this -> _db -> insert( $table, $params ) );        
    }

    
    
}