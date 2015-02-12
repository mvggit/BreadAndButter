<?php

namespace Data\Storage;

use Service\Get;
use Service\Update;

/**
 * Description of Storage
 *
 * @author Максим
 */

class Storage 
{
    use Get;
    use Update;
    
    public $_db;
    
    public function __construct( $db ) 
    {        
        $this -> _db = $db;
    }
    
    public function isInStorage( $idproduct ) 
    {
        $id = Get::get( 'idproduct', 'storage', 'idproduct = '. $idproduct . ' AND countproduct > 0', $limit = 1 )[0]['idproduct'];
        return ( !empty( $id ) ) ? $id : false;
    }
    
    public function getCountProduct( $idproduct ) 
    {
        return Get::get( 'countproduct', 'storage', 'idproduct = '. $idproduct, $limit = 1 )[0]['countproduct'];
    }
    
    public function setCountProduct( $idproduct, $countproduct ) 
    {
        return Update::set( 'storage', 
                         array( 'countproduct' => $countproduct ), 
                         'idproduct = ' . $idproduct 
                       );
    }
    
    
    
}