<?php


/**
 * AddTocarts
 */

namespace Data\Carts;

use Service\Create;
use Service\Get;
use Service\Update;

use Data\Storage\Storage;

class AddToCarts extends Storage 
{
    use Create;
    use Update;
    use Get;
    
    public $_db;
    
    function __construct( $db, $request ) 
    {
        parent::__construct( $db );        

        $this -> _db = $db;
        $this -> {"add" . $request[0]}( $request );

    }
    
    function addOne( array $param )
    {
        if ( !$this -> isInStorage( (int)$param[3] ) )
        {

            return false;
        }
        
        $count = ($count = $this -> get( 'countincarts', 'carts', 'idproductincarts = '. (int)$param[3] . ' AND identifiercarts = \''. $this -> _db -> MySQLi -> real_escape_string( $param[1] ) . '\'', $limit = 1)[0]['countincarts']) ? $count : 0;

        //TODO: things to create query generator. 
        
        if ( !$count )
        {
            $this 
                -> unsetparam()
                -> setparam( 'idauth', (int)$param[2] )
                -> setparam( 'identifiercarts', "'" . $this -> _db -> MySQLi -> real_escape_string( $param[1] ) . "'" )
                -> setparam( 'idproductincarts', (int)$param[3] )
                -> setparam( 'idstorageincarts', $this -> get( 'idstorage', 'storage', 'idproduct = '.(int)$param[3], $limit = 1)[0]['idstorage'] )
                -> setparam( 'countincarts', $count + 1 )
                -> setparam( 'priceincarts', $this -> get( 'priceproduct', 'product', 'idproduct = '.(int)$param[3], $limit = 1)[0]['priceproduct'] )
                -> setparam( 'storedcarts', '0' )
                -> setparam( 'savedate', 'now()' )
                -> create( 'carts' );
            
            $this -> setCountProduct( (int)$param[3], 
                                      ( $this -> getCountProduct( (int)$param[3] ) - 1 ) 
                                    );
            
        } 
        else
        {
            $this -> set( 'carts', 
                         array( 'countincarts' => $count + 1 ), 
                         'idauth = '. (int)$param[2] .' AND idproductincarts = '. (int)$param[3] . ' AND identifiercarts = \''. $this -> _db -> MySQLi -> real_escape_string( $param[1] ) . '\'' 
                       );
            
            $this -> setCountProduct( (int)$param[3], 
                                      ( $this -> getCountProduct( (int)$param[3] ) - 1 ) 
                                    );
        }
    }
}