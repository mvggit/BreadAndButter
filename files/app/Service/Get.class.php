<?php

/* 
 * Get.
 */

namespace Service;

trait Get
{
    function get( $field, $from, $where, $order = "", $limit = "" )
    {
        if ( empty( $this -> _db ) )
        {
            throw new \Exception( 'Database exception: undefined database identifier' );
        }
        
        $result = $this -> _db -> fetch(
                $this -> _db -> select( $field, $from, $where , $order, $limit )
        );
        
        return empty( $result ) ? false : $result;
    }      
}