<?php

/* 
 * Class Create.
 * Adaptee class.
 * 
 * Functionality:
 * Create implements operation's
 * past information in auth Db.
 */

namespace Data\Auth\Control;

class Create {
    
    private $_Db;
    
    function __construct($db) {
        
        $this -> _Db = $db;
    }
    
    function create( $table, $params ) {
        
        if (empty($params)) {
            
            throw new \Exception(' Undefined data to past in Db');
        }
        
        $insert = $this -> _Db -> run( $this -> _Db -> insert( $table, $params));
        
        return $insert;        
    }
    
    
}