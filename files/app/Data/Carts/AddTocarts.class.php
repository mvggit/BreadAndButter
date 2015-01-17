<?php


/**
 * AddTocarts
 * must be refactoring
 */

namespace Data\Carts;

use Service\Create;
use Service\Get;
use Service\Update;

class AddToCarts {
    use Create;
    use Update;
    use Get;
    
    public $_db;
    
    function __construct( $db, $request ) {
        
        $this -> _db = $db;
        $this -> {"add" . $request[0]}( $request );
    }
    
    function addOne( array $param ) {

        if ( empty($param) || (count($param) < 4) )
            return false;
        
        $count = ($count = Get::get( 'countincarts', 'carts', 'idproductincarts = '. $param[3] . ' AND identifiercarts = \''. $param[1] . '\'', $limit = 1)[0]['countincarts']) ? $count : 0;
        
        if ( !$count ) {
            
            $element['idauth'] = $param[2];
            $element['identifiercarts'] = "'".$param[1]."'";
            $element['idproductincarts'] = $param[3]; 
            $element['idstorageincarts'] = Get::get( 'idstorage', 'storage', 'idproduct = '.$param[3], $limit = 1)[0]['idstorage'];
            $element['countincarts'] = $count + 1;
            $element['priceincarts'] = Get::get( 'priceproduct', 'product', 'idproduct = '.$param[3], $limit = 1)[0]['priceproduct'];
            $element['storedcarts'] = '0';
            $element['savedate'] = 'now()';
            
            Create::create( 'carts', $element );
            
        } else {

            $element['countincarts'] = $count + 1;
            Update::set( 'carts', $element, 'idauth = '. $param[2] .' AND idproductincarts = '. $param[3] . ' AND identifiercarts = \''. $param[1] . '\'' );
            
        }
        
        
    }

    function addList( array $param ) {
        
        ;
    }    


    
}