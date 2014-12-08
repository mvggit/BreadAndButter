<?php

/* 
 * Class Load.
 * Implements interface Load to load data from Db.
 */

namespace Db;

class Load {
    
    private $data;
    private $db;
    
    function __construct( $db ) {
        
        $this->db = $db;
        
        
    }
    
    function doAction( $param = array() ){
        
        $this->data = $param;
        
        if (is_array($this->data)) {
            
            return $this->data;
        }
        
        return array( $this->data );
        
        
    }
}