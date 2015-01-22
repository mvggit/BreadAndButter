<?php


/**
 * MoveFromcarts
 */

namespace Data\Carts;

use Service\Delete;
use Service\Get;
use Service\Update;

use Data\Storage\Storage;

class MoveFromCarts extends Storage{
    use Delete;
    use Update;
    use Get;
    
    public $_db;
    
    public function __construct( $db, $request ) {
        
        parent::__construct( $db );
        
        $this -> _db = $db;
        $this -> {"move" . $request[0]}( $request );
    }
    
    public function moveOne( array $param ) {

        if ( !$this -> isInStorage( $param[3] ) ){

            return false;
        }

        $count = ( $count = Get::get( 'countincarts', 'carts', 'idproductincarts = ' . $param[3] . ' AND identifiercarts = \'' . $param[1] . '\'', $limit = 1 )[0]['countincarts'] ) ? $count : 0;
        $count -= 1;
        $this -> setCountProduct( $param[3], 
                                  ( $this ->getCountProduct( $param[3] ) + 1 ) 
                                );
                
        if ( !$count ) {
            
            $return = Delete::delete( 'carts', 'idauth = ' . $param[2] . ' AND idproductincarts = ' . $param[3] . ' AND identifiercarts = \'' . $param[1] . '\'' );
            
        } else {

            $return = Update::set( 'carts', 
                                     array( 'countincarts' => $count ), 
                                     'idauth = '. $param[2] . ' AND idproductincarts = ' . $param[3] . ' AND identifiercarts = \'' . $param[1] . '\'' 
                                 );
            
        }
        
        return $return;
        
    }

    public function moveCarts( array $param ) {
        
        return Delete::delete( 'carts', 'idauth = ' . $param[2] . ' AND identifiercarts = \'' . $param[1] . '\'' );
    }    

    
    
}