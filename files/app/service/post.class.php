<?php

/*
 * trait post to check
 * superglobal array _POST
 */

namespace Service;

/**
 * Description of post
 *
 * @author Максим
 */
trait Post {
    
    /**
     * isPosted:
     * check defifnition superglobal
     * array $_POST
     * 
     * @return boolean
     */
    public function isSend() {
        
        return ($count = count($_POST)) ? $count : false;
    }
    
    /**
     * __get
     * magic get to get value 
     * _POST array.
     * 
     * @param string $name
     * 
     * @return string $_name
     */
    public function __get($name){
        
        $_name = filter_input(INPUT_POST, $name);
        return $_name;
    }
    
    
    
}