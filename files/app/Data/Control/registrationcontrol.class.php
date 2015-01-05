<?php

/* 
 * Class LoginControl.
 * is concrete product
 * Abstract Fabrics.
 * 
 */

namespace Data\Control;

use Service\Check;
use Service\Post;
use service\Create;


class RegistrationControl {
    use Check;
    use Post;
    use Create;
    
    public $view = array();
    
    function __construct($db, $object = 'registration', $type = 'registration') {
        
        Check::$_db = $db;
        Create::$_db = $db;

        if ($this->isSend()) {
        
            $hash = md5($this->login.$this->password);
            
            if (!Check::checkHash($hash)) {

                $auth = array(
                            'email'=>"'".$this->login."'", 
                            'password'=>"'".$this->password."'",
                            'hash'=>"'".md5($this->login.$this->password)."'",
                            'blocked'=>0
                             );

                $id = Create::create('auth', $auth);
                
                $uin = array(
                            'iduin' =>$id,
                            'nicname'=>"'".$this->nic."'", 
                            'fname'=>"'".$this->name."'",
                            'sname'=>"'".$this->so_name."'",
                            'lname'=>"'".$this->last_name."'"
                             );                
                
                Create::create('uin', $uin);
                
                $object = $type = 'login';
            }
            
        }
        
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $object ."/". $type .".php";        
    }

    
}