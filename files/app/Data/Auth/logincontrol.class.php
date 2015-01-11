<?php

/* 
 * Class LoginControl.
 * is concrete product
 * Abstract Fabrics.
 * 
 */

namespace Data\Auth;

use Service\Session;

use Service\Check;


class LoginControl {
    use Check;
    
    public $_db;
    
    function __construct( $db ) {
        
        $this -> _db = $db;

        
    }

    public function login( $form ){
        
        $hash = md5($form['login'].$form['password']);
            
        if (Check::checkHash($hash) && Check::checkBlocked($hash)) {

            Session::set('info', $hash);
            Session::set('name', $form['login']);

            return true;

        }

        return false;
        
        
    }
}