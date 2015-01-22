<?php

/* 
 * Class DeliveryCarts.
 */

namespace Data\Carts;

use Service\Get;

class DeliveryCarts {
    use Get;
    
    public $_db;
    
    public function __construct( $db, &$delivery, $identifiercart ){
        
        $this -> _db = $db;
                
        $delivery = Get::get( 
                        'postalzip,'
                      . 'city, '
                      . 'street, '
                      . 'house, '
                      . 'houseblock, '
                      . 'houseroom', 
                        'delivery',                        
                        'iduin = (SELECT idauth FROM carts WHERE identifiercarts = \'' . $identifiercart . '\' LIMIT 1)', 
                        $limit = 1
                    );
        
    }
    
    
    
}
