<?php

/**
 * ExtractFromCarts
 */

namespace Data\Carts;

use Service\Get;
use Service\Session;

class ExtractFromCarts {
    use Get;
    
    public $_db;
    
    public function __construct( $db ) {
        
        $this -> _db = $db;
    }
    
    public function OneInstance( $identifiercarts ) {
        
        return $this->MakeInstance($identifiercarts, 1);
    }
    
    public function ListInstance( $identifiercarts, $limit = '' ) {
        
        return $this->MakeInstance($identifiercarts, '');
    }
    
    private function MakeInstance( $identifiercarts, $limit ){

        return Get::get( 'idproductincarts as article, '
                       . '(select nameproduct from product where idproduct = idproductincarts) as title,'
                       . 'countincarts as count,'
                       . 'priceincarts as price'
                       , 'carts'
                       , 'identifiercarts = \''.$identifiercarts.'\''
                       , 'idproductincarts ASC'
                       , $limit 
                    );
        
        
    }
    
    
    
}