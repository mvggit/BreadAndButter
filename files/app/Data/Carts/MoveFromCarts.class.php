<?php


/**
 * AddTocarts
 * must be refactoring
 */

namespace Data\Carts;

use Service\Delete;
use Service\Get;
use Service\Update;

class MoveFromCarts {
    use Delete;
    use Update;
    use Get;
    
    public $_db;
    
    function __construct( $db, $request ) {
        
        $this -> _db = $db;
        $this -> {"move" . $request[0]}( $request );
    }
    
    function moveOne( array $param ) {

        if ( empty($param) || (count($param) < 4) )
            return false;
        
        $count = ($count = Get::get( 'countincarts', 'carts', 'idproductincarts = '. $param[3] . ' AND identifiercarts = \''. $param[1] . '\'', $limit = 1)[0]['countincarts']) ? $count : 0;
        $count -= 1;
                
        if ( !$count ) {
            
            Delete::delete( 'carts', 'idauth = '. $param[2] .' AND idproductincarts = '. $param[3] . ' AND identifiercarts = \''. $param[1] . '\'' );
            
        } else {

            $element['countincarts'] = $count;
            Update::set( 'carts', $element, 'idauth = '. $param[2] .' AND idproductincarts = '. $param[3] . ' AND identifiercarts = \''. $param[1] . '\'' );
            
        }
        
        
    }

    
    function moveList( array $param ) {
        
        ;
    }    

    
}