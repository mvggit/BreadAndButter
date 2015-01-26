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

        foreach ($array as $key => $value) {
            
            $array[ $key ] = is_string( $value ) ? "'$value'" : $value;
        }        
        
        $string[] = implode(',', array_keys($array));
        $string[] = implode(',', array_values($array));
        
    }
    
    // Look on design this function
    
    function implplodeAssocArrayWithPattern( $array, &$string, $pattern = '', $separator = ',' ) {
        
        $keys = array_keys($array);
        $values = array_values($array);
        
        for ( $iteration = 0; $iteration < ( $count = count($keys) ); $iteration++ ) {
            
            $string .= $keys[ $iteration ] . $pattern . $values[ $iteration ];
            if ( $iteration < ( $count - 1 ) ) {
                
                $string .= $separator;
            }
        }
    }

    
    
}
