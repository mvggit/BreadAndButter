<?php


/**
 * Description of AddTocarts
 * 
 */

namespace Data\Catalog;

class PaginationCatalog {
    
    private static $db;
    
    function __construct( $db ) {
        
        self::$db = $db;
    }
    
    function get( $limit = 20 ) {
        
        return self::$db -> fetch( self::$db -> select( 'idproduct as article,'
                                                      . 'nameproduct as title,'
                                                      . 'descproduct as description'
                                                      , 'product'
                                                      , '1'
                                                      , 'idproduct ASC'
                                                      , $limit 
                                                      ) 
                                 );
    }
    
}