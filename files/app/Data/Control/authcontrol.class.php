<?php

/* 
 * Class LoginControl.
 * must be refactoring
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
        
            $class = 'Data\Auth\\' . ucfirst( $type['do'] ) . ucfirst( "control" );
            $auth = new $class( $db );
            
            if ($auth -> $type['do']( $this->post )) {
            
                $type['do'] .= 'ed';
            }
            
        }
        
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $object ."/". $type['do'] .".php";
        
    }

    
}