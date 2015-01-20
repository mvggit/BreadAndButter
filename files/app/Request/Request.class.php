<?php

/* 
 * Request class.
 */

namespace Request;

class Request {
   
    /**
     * @var $_request array(array('key', 'value'));
     * 
     */
    
    private $_request = array();
    
    /**
     * @method handle
     * 
     * dump request url and return array to Parent class;
     * @return point to array();
     */
    
    function &handle() {
        $this->_request = &$_REQUEST;
        return $this->_request;
    }


    
}