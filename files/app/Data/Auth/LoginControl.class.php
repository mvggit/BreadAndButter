<?php

/* 
 * Class LoginControl.
 * 
 */

namespace Data\Auth;

use Service\Session;

use Service\Check;
use Service\Get;

use Data\Carts\GetNameCarts;


class LoginControl 
{
    use Check;
    use Get;
    
    public $_db;
    
    
    function __construct( $db ) 
    {
        $this -> _db = $db;
    }

    
    public function login( $form )
    {
        $hash = md5( $form['login'].$form['password'] );
            
        if ( ( $checkhash = $this -> checkHash( $hash ) ) && ( $checkblocked = !$this -> checkBlocked( $hash ) ) ) 
        {
            Session::set( 'info', $hash );
            Session::set( 'name', $this -> _db -> MySQLi -> real_escape_string( $form['login'] ) );
            Session::set( 'uin', $this -> get('idauth', 'auth', 'hash = \'' . $hash . '\'')[0]['idauth'] );

            $carts = new GetNameCarts( $this -> _db );
            $carts -> GetCarts();
        }

        return ($checkhash && $checkblocked);
        
    }
    
    
    
}