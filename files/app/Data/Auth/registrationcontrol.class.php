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
use service\Create;


class RegistrationControl {
    use Check;
    use Create;
    
    public $view = array();
    public $_db;
            
    function __construct( $db ) {
  
         $this -> _db = $db;

        
    }
    
    function registration( $form ) {
        
        if (!Check::checkHash( md5($form['login'].$form['password']) ) && !Session::get('info')) {

            $auth = array(
                        'email'=>"'".$form['login']."'", 'password'=>"'".$form['password']."'",
                        'hash'=>"'".md5($form['login'].$form['password'])."'", 'blocked'=>0
                         );

            $id = Create::create('auth', $auth);

            $uin = array(
                        'iduin' =>$id, 'nicname'=>"'".$form['nic']."'", 'fname'=>"'".$form['name']."'",
                        'sname'=>"'".$form['so_name']."'", 'lname'=>"'".$form['last_name']."'"
                         );                

            Create::create('uin', $uin);
            
            Session::set('info', md5($form['login'].$form['password']));
            Session::set('name', $form['login']);
            
            return true;
        }

        return false;
    }

 
    
}