<?php

/* 
 * Class Update.
 */

namespace Service;

trait Update {
    
    function set( $table, $params, $where ) {
        
        if ( empty( $this -> _db ) ) {
            
            throw new \Exception( 'Database exception: undefined database identifier' );
        }
        
        return $this -> _db -> run( $this -> _db -> update( $table, $params, $where ) );
    }    

    
    
}