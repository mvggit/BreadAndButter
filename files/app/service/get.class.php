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
    
    public static $_db;
    
    function get( $field, $from, $where, $limit = 1, $order = "true" ) {
        
        $result = self :: $_db -> fetch(
                self :: $_db -> select( $field, $from, $where , $order, $limit)
        );
        
        $return = empty($result[0]['hash']) ? false : $result[0]['hash'];
    
        return $return;
    }    
    
    
}