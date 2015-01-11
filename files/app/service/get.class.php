<?php

/* 
 * Class Get.
 * Adaptee class.
 * 
 * Functionality :
 * class to get information from Db 
 * on authorization section
 */

namespace Service;

trait Get {
    
//    public static $_db;
    
    function get( $field, $from, $where, $limit = 1, $order = "true" ) {
        
        $result = $this -> _db -> fetch(
                $this -> _db -> select( $field, $from, $where , $order, $limit)
        );
        
        $return = empty($result[0][$field]) ? false : $result[0][$field];
    
        return $return;
    }    
    
    
}