<?php

/*
 * Class ImplodeArray.
 * ImplodeArray implements
 * action implode array with 
 * returns string's.
 */
namespace Service;


trait ImplodeArray {
    
    
    function explodeAssocArray( $array, &$string = array() ) 
    {
        foreach ($array as $key => $value) 
        {
            $array[ $key ] = $value;
        }        

        $string[] = implode(',', array_keys($array));
        $string[] = implode(',', array_values($array));
        
    }
    
    
    function implplodeAssocArrayWithPattern( $array, &$string, $pattern = '', $separator = ',' ) 
    {
        $keys = array_keys($array);
        $values = array_values($array);
        
        for ( $iteration = 0; $iteration < ( $count = count($keys) ); $iteration++ ) 
        {
            $string .= $keys[ $iteration ] . $pattern . $values[ $iteration ];
            if ( $iteration < ( $count - 1 ) ) 
            {
                
                $string .= $separator;
            }
        }
        
    }


    
}
