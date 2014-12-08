<?php

/*
 * Class ImplodeArray.
 * ImplodeArray implements
 * action implode array with 
 * returns string's.
 */
namespace Service;

trait ImplodeArray {
    
    // Explode array to two arrays: array keys and array values
    
    function explodeAssocArray( $array, &$string = array() ) {
        
        $string[] = implode(',', array_keys($array));
        $string[] = implode(',', array_values($array));
    }
    
    // Implode assoc array use paattern type $value1 $pattern $value2
    
    function implplodeAssocArrayWithPattern( $array, &$string, $pattern = '', $separator = ',' ) {
        
        $keys = array_keys($array);
        $values = array_values($array);
        $iteration = 1;
       
        foreach ($keys as $key) {
            
            $string .= $key . $pattern . current($values);
            next($values);
            ($iteration++ < count($keys) ) ? $string .= $separator : false;
        }
    }    
    
    
}
