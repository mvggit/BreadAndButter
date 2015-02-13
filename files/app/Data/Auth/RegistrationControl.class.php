<?php

/* 
 * Class RegistrationControl.
 */

namespace Data\Auth;

use Service\Session;

use Service\Check;
use service\Create;

class RegistrationControl 
{
    use Check;
    use Create;
    
    public $auth;
    public $iduin;
    public $_db;
            
    function __construct( $db ) 
    {
         $this -> _db = $db;
    }
    
    function registration( $form ) 
    {
        if (!Check::checkHash( md5($form['login'].$form['password']) ) && !Session::get('info'))
        {
            $id = $this
                    -> unsetparam()
                    -> setparam( 'email', "'" . $form['login'] . "'")
                    -> setparam( 'password', "'" . $form['password'] . "'")
                    -> setparam( 'hash', "'" . md5($form['login'].$form['password']) . "'")
                    -> setparam( 'blocked', (int)0)
                    -> create('auth');

            $uin = $this
                    -> unsetparam()
                    -> setparam( 'iduin', "'" . $id . "'")
                    -> setparam( 'nicname', "'" . $form['nic'] . "'")
                    -> setparam( 'fname', "'" . $form['name'] . "'")
                    -> setparam( 'sname', "'" . $form['so_name'] . "'")
                    -> setparam( 'lname', "'" . $form['last_name'] . "'")
                    -> create('uin');            

            return ( $id && $uin );
        }

        return false;
    }

 
    
}