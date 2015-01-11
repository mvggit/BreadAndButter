<?php

/* 
 * Class CartsControl.
 * is concrete product
 */

namespace Data\Control;

use Service\Check;
use Service\Session;
use Service\Get;

use Data\Carts\ExtractFromCarts;

class CartsControl {
    use Check;
    
    public $_db;
    public $view = array();
    public $cart;
    
    function __construct($db, $object = 'carts', $type = 'carts') {
        
        $this->_db = $db;
        
        if ($hash = Session::get('info')) {

            $this -> cart = Get::get( 'identifiercarts', 'carts, auth', 'hash = \''.$hash.'\' AND auth.idauth = carts.idauth', $limit = 1);

        }
        
        $this -> view['filename'] = $this -> ViewCart( $object, $type);
        Session::set( 'carts', $this->Extract() );

    }

    function ViewCart( $object = 'carts', $type = 'carts' ){
        
        return dirname(__FILE__) . "/../../../../views/". $object ."/". $type .".php";
    }
    
    function Add($param = array()) {
        
        new AddToCarts($param);
    }
    
    function Move($param = array()) {
        
        new MoveFromCarts($param);
    }

    function Extract( $param = array() ) {
        
        $carts = new ExtractFromCarts( $this->_db );
        
        return $carts -> ListInstance( $this -> cart );
    }
    
    
}