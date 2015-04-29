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
        return $this -> get( '(select nameproduct from product where idproduct = idproductincarts) as title,'
                       . 'countincarts as count,'
                       . 'priceincarts as price'
                       , 'carts'
                       , 'identifiercarts = \''. $this -> _db -> MySQLi -> real_escape_string($identifiercarts).'\''
                       , 'idproductincarts ASC'
                       , 1
                    );
    }
    
    public function extractList( $identifiercarts, $limit = '' )
    {
        return $this -> get( 'idproductincarts as article, '
                       . '(select nameproduct from product where idproduct = idproductincarts) as title,'
                       . 'countincarts as count,'
                       . 'priceincarts as price'
                       , 'carts'
                       , 'identifiercarts = \''.$this -> _db -> MySQLi -> real_escape_string($identifiercarts).'\''
                       , 'idproductincarts ASC'
                       , $limit 
                    );
    }
    
    

}