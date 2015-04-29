<?php

/**
 * ViewCatalog
 */

namespace Data\Catalog;

use Service\Get;


class ViewCatalog 
{
    use Get;
    
    public $_db;    

    
    public function __construct( $db ) 
    {
        $this -> _db = $db;
    }

    
    protected function makeView( $field, $from, $where, $orderby, $limit )
    {
        return $this -> get( $field, $from, $where, $orderby, $limit );
    }
}