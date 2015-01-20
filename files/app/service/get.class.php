<?php

/* 
 * Class Get.
 * think about this class
 */

namespace Service;

trait Get {
    
    function get( $field, $from, $where, $order = "true", $limit = "" ) {
        
        //TODO: think about check function param
        
        $result = $this -> _db -> fetch(
                $this -> _db -> select( $field, $from, $where , $order, $limit)
        );
        
        $return = empty($result) ? false : $result;
    
        return $return;
    }    

    
    
}