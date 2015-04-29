<?php


/**
 * MoveFromcarts
 */

namespace Data\Carts;

use Service\Delete;
use Service\Get;
use Service\Update;

use Data\Storage\Storage;


class MoveFromCarts extends Storage
{
    use Delete;
    use Update;
    use Get;
    
    public $_db;
    
    public function __construct( $db, $request )
    {
        parent::__construct( $db );
        
        $this -> _db = $db;
        $this -> {"move" . $request[0]}( $request );
    }

    
    public function moveOne( array $param )
    {
        if ( !$this -> isInStorage( (int)$param[3] ) )
        {
            return false;
        }

        $count = ( $count = $this -> get( 'countincarts', 'carts', 'idproductincarts = ' . (int)$param[3] . ' AND identifiercarts = \'' . $param[1] . '\'', $limit = 1 )[0]['countincarts'] ) ? $count : 0;
        $count -= 1;
        $this -> setCountProduct( (int)$param[3], 
                                  ( $this ->getCountProduct( (int)$param[3] ) + 1 ) 
                                );
                
        if ( !$count )
        {
            $return = $this -> delete( 'carts', 'idauth = ' . (int)$param[2] . ' AND idproductincarts = ' . (int)$param[3] . ' AND identifiercarts = \'' . $this -> _db -> MySQLi -> real_escape_string( $param[1] ) . '\'' );
            
        } 
        else 
        {
            $return = $this -> set( 'carts', 
                                     array( 'countincarts' => (int)$count ), 
                                     'idauth = '. (int)$param[2] . ' AND idproductincarts = ' . (int)$param[3] . ' AND identifiercarts = \'' . $this -> _db -> MySQLi -> real_escape_string( $param[1] ) . '\'' 
                                 );
        }
        
        return $return;
    }

    public function moveCarts( array $param )
    {
        return $this -> delete( 'carts', 'idauth = ' . (int)$param[2] . ' AND identifiercarts = \'' . $this -> _db -> MySQLi -> real_escape_string( $param[1] ) . '\'' );
    }
}