<?php

/* 
 * Class Delete.
 */

namespace Service;

trait Delete {
    
    function delete( $table, $where = true ) {
        
        //TODO: think about this class
        
        $delete = $this -> _db -> run( $this -> _db -> delete( $table, $where ));
        return $delete;        
        
    }    

    
    
}