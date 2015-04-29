<?php

/* 
 * Class RegistrationControl.
 */

namespace Data\Auth;

use Service\Session;

use Service\Get;
use Service\Check;
use Service\Create;

class RegistrationControl 
{
    use Get;
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
        if (!$this -> checkHash( md5($form['login'].$form['password']) ) && !Session::get('info'))
        {
            $id = $this
                    -> unsetparam()
                    -> setparam( 'email', "'" . $this -> _db -> MySQLi -> real_escape_string( $form['login'] ) . "'")
                    -> setparam( 'password', "'" . $this -> _db -> MySQLi -> real_escape_string( $form['password'] ) . "'")
                    -> setparam( 'hash', "'" . md5($form['login'].$form['password']) . "'")
                    -> setparam( 'blocked', (int)0)
                    -> create('auth');

            $uin = $this
                    -> unsetparam()
                    -> setparam( 'iduin', "'" . (int)$id . "'")
                    -> setparam( 'nicname', "'" . $this -> _db -> MySQLi -> real_escape_string( $form['nic'] ) . "'")
                    -> setparam( 'fname', "'" . $this -> _db -> MySQLi -> real_escape_string( $form['name'] ) . "'")
                    -> setparam( 'sname', "'" . $this -> _db -> MySQLi -> real_escape_string( $form['so_name'] ) . "'")
                    -> setparam( 'lname', "'" . $this -> _db -> MySQLi -> real_escape_string( $form['last_name'] ) . "'")
                    -> create('uin');            

            return ( $id && $uin );
        }

        return false;
    }
}
