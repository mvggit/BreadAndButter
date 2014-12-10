<?php

/**
 * Description of ExtractFromCarts
 */

namespace Data\Carts;

use Service\Session;

class ExtractFromCarts {
    
    static private $db;
    
    function __construct($db) {
        
        self::$db = $db;
    }
    
    function extractOneInstance() {
        
        ;
    }
    
    function extractListInstance( $limit = 20 ) {
        
        return self::$db -> fetch( self::$db -> select( 'idproductincarts as article, '
                                                       . '(select nameproduct from product where idproduct = idproductincarts) as title,'
                                                        . '(select descproduct from product where idproduct = idproductincarts) as description,'
                                                        . '(select priceproduct from product where idproduct = idproductincarts) as price'
                                                        , 'carts'
                                                        , 'identifiercarts = \'kaUk0v\''
                                                        , 'idproductincarts ASC'
                                                        , $limit 
                                                       ) 
                                 );
    }
}