<?php

/* 
 * Class DeliveryCarts.
 */

namespace Data\Carts;

use Service\Get;
use Service\Create;
use Service\Post;

use Service\Session;


class DeliveryCarts
{
    use Get;
    use Post { Post::__construct as PostConstructor; }
    use Create;
    
    public $_db;
    
    public function __construct( $db, &$delivery, $identifiercart )
    {
        
        $this -> _db = $db;
    
        $this -> PostConstructor();
        
        if ( $this ->isSend() ) 
        {
            
            $this -> saveDeliveryInformation();
        }
        
        $delivery = $this -> get( 
                        'postalzip,'
                      . 'city, '
                      . 'street, '
                      . 'house, '
                      . 'houseblock, '
                      . 'houseroom', 
                        'delivery',                        
                        'iduin = ' . Session::get( 'uin' ), 
                        $limit = 1
                    );
        
    }
    
    public function saveDeliveryInformation()
    {
        $id = ( Session::search('uin') ) 
                ? $this
                    -> unsetparam()
                    -> setparam( 'iduin', "'" . Session::get( 'uin' ) . "'" )
                    -> setparam( 'postalzip', "'" . $this -> postalzip . "'" )
                    -> setparam( 'city', "'" . $this -> city . "'" )
                    -> setparam( 'street', "'" . $this -> street . "'" )
                    -> setparam( 'house', (int)$this -> house )
                    -> setparam( 'houseblock', (int)$this -> houseblock )
                    -> setparam( 'houseroom', (int)$this -> houseroom )
                    -> create( 'delivery' )
                : false;
        
        return ( $id == true );
    }
    
    
    
}
