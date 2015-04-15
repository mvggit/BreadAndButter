<?php

/* 
 * Request class.
 */

namespace Request;

class Request
{
    /**
     * @method handle
     * @return pointer to array();
     */
    
    function &handle()
    {
        $this->_request = &$_REQUEST;
        return $this->_request;
    }   
}