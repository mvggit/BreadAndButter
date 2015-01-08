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
     * isSend
     * @return boolean
     */
    public function isSend() {
        
        return ($count = count($_POST)) ? $count : false;
    }
    
    /**
     * magic __get
     * @name string $name
     * @return mixed $value
     */
    public function __get($name){
        
        $value = filter_input(INPUT_POST, $name);
        return $value;
    }
    
    
    
}