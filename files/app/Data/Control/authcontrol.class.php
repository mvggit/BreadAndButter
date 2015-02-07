<?php

/* 
 * Class LoginControl.
 */

namespace Data\Control;

use Service\Check;
use Service\Post;


class AuthControl
{
    use Check;
    use Post {Post::__construct as PostConstructor; }
    
    public $view = array();
    protected $_db;
    
    function __construct($db, $request = array())
    {
        $this -> PostConstructor();
        $this ->_db = $db;
        
        if ($this->isSend())
        {
        
            $class = 'Data\Auth\\' . ucfirst( $request['do'] ) . ucfirst( "control" );
            $auth = new $class( $db );
            
            if ($auth -> $request['do']( $this->post )) {
            
                $request['do'] .= 'ed';
            }
            
        }
        
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $request['action'] ."/". $request['do'] .".php";
        
    }

    
    
}