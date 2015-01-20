<?php

/* 
 * Class Create.
 */

namespace Service;

trait Create {
    
    function create( $table, $params ) {
        
        if (empty($params)) {
            
            throw new \Exception(' Undefined data to past in Db');
        }
        
        $insert = $this -> _db -> run( $this -> _db -> insert( $table, $params));
        
        return $insert;        
    }
    
    
}