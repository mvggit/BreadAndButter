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
        if ( !$this -> isInStorage( $param[3] ) )
        {

            return false;
        }
        
        $count = ($count = Get::get( 'countincarts', 'carts', 'idproductincarts = '. $param[3] . ' AND identifiercarts = \''. $param[1] . '\'', $limit = 1)[0]['countincarts']) ? $count : 0;

        //TODO: things to create query generator. 
        
        if ( !$count )
        {
            $this 
                -> unsetparam()
                -> setparam( 'idauth', $param[2] )
                -> setparam( 'identifiercarts', "'" . $param[1] . "'" )
                -> setparam( 'idproductincarts', $param[3] )
                -> setparam( 'idstorageincarts', Get::get( 'idstorage', 'storage', 'idproduct = '.$param[3], $limit = 1)[0]['idstorage'] )
                -> setparam( 'countincarts', $count + 1 )
                -> setparam( 'priceincarts', Get::get( 'priceproduct', 'product', 'idproduct = '.$param[3], $limit = 1)[0]['priceproduct'] )
                -> setparam( 'storedcarts', '0' )
                -> setparam( 'savedate', 'now()' )
                -> create( 'carts' );
            
            $this -> setCountProduct( $param[3], 
                                      ( $this -> getCountProduct( $param[3] ) - 1 ) 
                                    );
            
        } 
        else
        {
            Update::set( 'carts', 
                         array( 'countincarts' => $count + 1 ), 
                         'idauth = '. $param[2] .' AND idproductincarts = '. $param[3] . ' AND identifiercarts = \''. $param[1] . '\'' 
                       );
            
            $this -> setCountProduct( $param[3], 
                                      ( $this -> getCountProduct( $param[3] ) - 1 ) 
                                    );
        }
    }
    


}