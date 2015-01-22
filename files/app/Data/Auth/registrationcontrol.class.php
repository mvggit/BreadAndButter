<?php

/* 
 * Class RegistrationControl.
 * must refactoring.
 */

namespace Data\Auth;

use Service\Session;
use Service\Check;
use Service\Get;
use service\Create;


class RegistrationControl {
    use Check;
    use Get;
    use Create;
    
    public $view = array();
    public $_db;
            
    function __construct( $db ) {
  
         $this -> _db = $db;
        
    }
    
    function registration( $form ) {
        
        if (!Check::checkHash( md5($form['login'].$form['password']) ) && !Session::get('info')) {

            $id = Create::create('auth', array(
                                            'email' => "'".$form['login']."'", 
                                            'password' => "'".$form['password']."'",
                                            'hash' => "'".md5($form['login'].$form['password'])."'", 
                                            'blocked' => 0
                                         ));

            $uin = Create::create('uin', array(
                                            'iduin' => $id, 
                                            'nicname' => "'".$form['nic']."'", 
                                            'fname' => "'".$form['name']."'",
                                            'sname' => "'".$form['so_name']."'", 
                                            'lname' => "'".$form['last_name']."'"
                                          ));
            
            return ( $id && $uin );
        }

        return false;
    }

 
    
}