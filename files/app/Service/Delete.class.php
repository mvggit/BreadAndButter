<?php

/* 
 * Update.
 */

namespace Service;

trait Delete 
{
    function delete( $table, $where )
    {
        if ( empty( $this -> _db ) )
        {
            throw new \Exception( 'Database exception: undefined database identifier' );
        }
        
        return $this -> _db -> run( $this -> _db -> delete( $table,  $where ) );
    }    
}