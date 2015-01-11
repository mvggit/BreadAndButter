<?php

/* 
 * Class LoginControl.
 * 
 */

namespace Data\Control;


class AboutControl {
    
    public $view = array();
    
    function __construct($db, $object = 'about', $type = 'about') {
        

        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $object ."/". $type .".php";        
    }

    
}