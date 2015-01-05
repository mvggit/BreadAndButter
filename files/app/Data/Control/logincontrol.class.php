<?php

/* 
 * Class LoginControl.
 * is concrete product
 * Abstract Fabrics.
 * 
 */

namespace Data\Control;

//TODO Check actuality Session and Cookie classes here.
use Service\Session;

use Service\Check;
use Service\Post;


class LoginControl {
    use Check;
    use Post;
    
    public $view = array();
    
    function __construct($db, $object = 'login', $type = 'login') {
        
        Check::$_db = $db;

        if ($this->isSend()) {
        
            $hash = md5($this->login.$this->password);
            
            if (Check::checkHash($hash) && Check::checkBlocked($hash)) {

                Session::set('info', $hash);
                Session::set('name', $this->login);
                
                $type = 'logined';
            }
            
        }
            
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $object ."/". $type .".php";
    }

    
}