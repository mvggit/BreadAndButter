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


class AuthControl {
    use Check;
    use Post {Post::__construct as PostConstructor; }
    
    public $view = array();
    protected $_db;
    
    function __construct($db, $object = 'login', $type = 'login') {
        
        $this -> PostConstructor();
        $this ->_db = $db;
        
        if ($this->isSend()) {
        
            $class = 'Data\Auth\\' . ucfirst( $type) . ucfirst( "control" );
            $auth = new $class( $db );
            
            if ($auth -> $type( $this->post )) {
            
                $type .= 'ed';
            }
            
        }
        
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $object ."/". $type .".php";
        
    }

    
}