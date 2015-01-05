<?php

/* 
 * Class Create.
 * Adaptee class.
 * 
 * Functionality:
 * Create implements operation's
 * past information in auth Db.
 */

namespace Service;

trait Create {
    
    public static $_db;
    

    function create( $table, $params ) {
        
        if (empty($params)) {
            
            throw new \Exception(' Undefined data to past in Db');
        }
        
        $insert = self :: $_db -> run( self :: $_db -> insert( $table, $params));
        
        return $insert;        
    }
    
    
}