<?php

/* 
 * Class CartsControl.
 */

namespace Data\Control;

use Service\Get;
use Service\Session;

use Data\Carts\AddToCarts;
use Data\Carts\MoveFromCarts;
use Data\Carts\ExtractFromCarts;

class CartsControl {
    use Get;
    
    public $_db;
    public $view = array();
    public $cart = NULL;
    
    public function __construct($db, $request) {
        
        $this->_db = $db;
        
        if ($hash = Session::get('info')) {

            $this -> cart = Get::get( 'identifiercarts', 'carts, auth', 'hash = \''.$hash.'\' AND auth.idauth = carts.idauth', $limit = 1)[0]['identifiercarts'];

        }
        
        $this -> $request['do']( $request );

    }

    private function ViewCart( $request ){
        
        $catalog = $filename = ($request['action'] !== NULL) ? $request['action'] : 'null';
        return ($this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $catalog ."/". $filename .".php");
    }
    
    protected function Add( $request ) {
        
        new AddToCarts( $this->_db, $request['param'] );
        Session::set(
                'countproducts', 
                Get::get( 
                        'countincarts', 
                        'carts', 
                        'idproductincarts = '. $request['param'][3] . ' '
                        . 'AND identifiercarts = \''. $request['param'][1] . '\''
                        . '', $limit = 1)[0]['countincarts']
                );
        
        $this -> ViewCart( NULL );
        
    }
    
    protected function Move( $request ) {
        
        new MoveFromCarts( $this->_db, $request['param'] );
        Session::set(
                'countproducts', 
                Get::get( 
                        'countincarts', 
                        'carts', 
                        'idproductincarts = '. $request['param'][3] . ' '
                        . 'AND identifiercarts = \''. $request['param'][1] . '\''
                        . '', $limit = 1)[0]['countincarts']
                );
        
        $this -> ViewCart( NULL );
                
    }

    protected function Extract( $request ) {
        
        $Extract = new ExtractFromCarts( $this->_db );
        Session::set( 'carts', $Extract -> ListInstance( $this -> cart ) );
        
        $this -> ViewCart( $request );
        
        return true;
    }

    
    
}