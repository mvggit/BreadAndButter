<?php

/* 
 * Class Update.
 */

namespace Service;

trait Update {
    
    function set( $table, $params, $where ) {
        
        if (empty($params)) {
            
            throw new \Exception(' Undefined data to past in Db');
        }
        
        $update = $this -> _db -> run( $this -> _db -> update( $table, $params, $where ));
        
        return $update;        
    }    

    
    
}