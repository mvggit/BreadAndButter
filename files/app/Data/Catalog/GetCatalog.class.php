<?php


/**
 * Description of Sortcatalog
 */

namespace Data\Catalog;

class GetCatalog extends ViewCatalog 
{
    public $_db;    

    
    public function __construct( $db ) 
    {
        parent::__construct( $db );
        $this -> _db = $db;
    }

    public function Catalog( ) 
    {
        $field = 'namegroupproduct as grouptitle, '
               . 'descgroupproduct as description';
        
        $from = 'groupproduct';
        $where = '1 GROUP BY namegroupproduct';
        
        $orderby = 'idgroupproduct ASC, grouptitle ASC';
        $limit = "";
        
        return $this ->makeView($field, $from, $where, $orderby, $limit);

    }
}
