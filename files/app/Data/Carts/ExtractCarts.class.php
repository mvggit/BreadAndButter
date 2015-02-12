<?php

/**
 * ExtractFromCarts
 * must refactoring
 */

namespace Data\Carts;

use Service\Get;

class ExtractCarts
{
    use Get;
    
    public $_db;

    
    public function __construct( $db )
    {
        $this -> _db = $db;
    }
    
    
    public function extractOne( $identifiercarts ) 
    {
        return Get::get( '(select nameproduct from product where idproduct = idproductincarts) as title,'
                       . 'countincarts as count,'
                       . 'priceincarts as price'
                       , 'carts'
                       , 'identifiercarts = \''.$identifiercarts.'\''
                       , 'idproductincarts ASC'
                       , 1
                    );
    }
    
    public function extractList( $identifiercarts, $limit = '' )
    {
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