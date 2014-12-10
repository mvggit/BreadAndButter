<?php


/**
 * Description of AddTocarts
 * 
 */

namespace Data\Carts;

class AddToCarts {
    
    private static $_Db;
    
    function __construct( $db ) {
        
        self::$_Db = $db;
    }
    
    // $id, $product, $storage, $count, $price, $stored = 0, $date = "now()"
    
    function addOneElement( $param ) {
        
        self::$_Db -> fetch( self::$_Db -> select( "INSERT INTO carts VALUE ( $id, "
                                                                           . "$product, "
                                                                           . "$idstorage, "
                                                                           . "$count,  "
                                                                           . "$price, "
                                                                           . "$storedcarts, "
                                                                           . "$date ,"
                                                                           . ")" ) );
        
    }

    function addListElement( $params ) {
        
        $p = "";
        
        foreach ( $params as $param ) {
            
           $p .= "(" . $param['id'] . ", "
                     . $param['product'] . ", "
                     . $param['idstorage'] . ", "
                     . $param['count'] . ", "
                     . $param['price'] . ", "
                     . $param['storedcarts'] . ", "
                     . $param['date'] . 
                 ")";
           
           (current($p) == end($p)) ? $p .= ", " : false;
        
        };
        
        self::$_Db -> fetch( self::$_Db -> select( "INSERT INTO carts VALUES $p" ) );
        
    }    

    
}