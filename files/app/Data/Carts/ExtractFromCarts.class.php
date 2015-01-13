<?php

/**
 * Description of ExtractFromCarts
 */

namespace Data\Carts;

use Service\Session;
use service\Get;

class ExtractFromCarts {
    use Get;
    
    public $_db;
    
    function __construct($db) {
        
        $this -> _db = $db;
    }
    
    function OneInstance( $identifiercarts ) {
        
        return $this->ListInstance($identifiercarts, 1);
    }
    
    function ListInstance( $identifiercarts, $limit = 20 ) {
        
        return Get::get( 'idproductincarts as article, '
                       . '(select nameproduct from product where idproduct = idproductincarts) as title,'
                       . '(select descproduct from product where idproduct = idproductincarts) as description,'
                       . '(select priceproduct from product where idproduct = idproductincarts) as price'
                       , 'carts'
                       , 'identifiercarts = \''.$identifiercarts.'\''
                       , 'idproductincarts ASC'
                       , $limit 
                        );
    }
}