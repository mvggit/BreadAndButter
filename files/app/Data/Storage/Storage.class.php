<?php

namespace Data\Storage;

use Service\Get;
use Service\Update;

/**
 * Storage
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
        $id = $this -> get( 'idproduct', 'storage', 'idproduct = '. (int)$idproduct . ' AND countproduct > 0', $limit = 1 )[0]['idproduct'];
        return ( !empty( $id ) ) ? $id : false;
    }
    
    public function getCountProduct( $idproduct ) 
    {
        return $this -> get( 'countproduct', 'storage', 'idproduct = '. (int)$idproduct, $limit = 1 )[0]['countproduct'];
    }
    
    public function setCountProduct( $idproduct, $countproduct ) 
    {
        return $this -> set( 'storage', 
                         array( 'countproduct' => (int)$countproduct ), 
                         'idproduct = ' . (int)$idproduct 
                       );
    }   
}