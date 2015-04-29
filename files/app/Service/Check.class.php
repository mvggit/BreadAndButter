<?php

/* 
 * Check.
 */

namespace Service;

trait Check
{
    public function checkHash( $hash = '' )
    {
        $gethash = $this -> get('hash', 'auth', 'hash = \'' . $hash . '\'')[0]['hash'];
        return ( $gethash === $hash );
    }

    public function checkBlocked( $hash = '' ) 
    {
        $blocked = $this -> get('blocked', 'auth', 'hash = \'' . $hash . '\'')[0]['blocked'];
        return ( bool )$blocked;
    }    

    
    
}