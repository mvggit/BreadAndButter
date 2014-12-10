<?php

/* 
 * Class CartsControl.
 * is concrete product
 * Abstract Fabrics.
 * 
 */

namespace Data\Control;

use Service\Check;
use Service\Session;

use Data\Carts\ExtractFromCarts;

class CartsControl {
    
    private $_Db;
    public $view = array();
    public $data = array();
    
    //TODO: конструктор не должен содержать визуализации так, как
    //      класс может быть инициализирован с/для вызовом методов.
    
    function __construct($db, $object = 'carts', $type = 'carts') {
        
        $this -> _Db = $db;
        Check::$_db = $db;
        
        if (Check::checkHash() && Check::checkBlocked()) {

            ;
        }
        
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $object ."/". $type .".php";
        
        Session::set( 'carts', $this->extract() );
    }
    
    function add($param = array()) {
        
        new AddToCarts($param);
    }
    
    function move($param = array()) {
        
        new MoveFromCarts($param);
    }

    function extract( $param = array() ) {
        
        $carts = new ExtractFromCarts( $this->_Db );
        return $carts -> extractListInstance( );
    }
    
    
}