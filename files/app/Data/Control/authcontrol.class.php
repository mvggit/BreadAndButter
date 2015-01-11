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


class AuthControl {
    use Check;
    use Post {Post::__construct as PostConstructor; }
    
    public $view = array();
    protected $_db;
    
    function __construct($db, $object = 'login', $type = 'login') {
        
        $this -> PostConstructor();
        $this ->_db = $db;
        
        if ($this->isSend()) {
        
            $class = 'Data\Control\\' . ucfirst( $type) . ucfirst( "control" );
            $auth = new $class( $db );
            
            if ($auth -> $type( $this->post )) {
            
            //if (Check::checkHash($hash) && Check::checkBlocked($hash)) {

                //Session::set('info', $hash);
                //Session::set('name', $this->login);
                
                $type .= 'ed';
            }
            
        }
        
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $object ."/". $type .".php";
        
    }

    
}