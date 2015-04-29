<?php

/**
 * PaginationCatalog
 */

namespace Data\Catalog;

class PaginationCatalog extends ViewCatalog
{
    
    private $group;
    private $page = 0;
    
    public $_db;
    
    public function __construct( $db, $request ) 
    {
        $this -> _db = $db;
        $this -> page = $request['page'] - 1;
        $this -> group = array_key_exists('group', $request) ? $request['group'] : '';        
    }

    public function Catalog( $limit = 10 ) 
    {
        $field = 'product.idproduct as article,'
               . 'groupproduct.idgroupproduct as grouparticle,'
               . 'nameproduct as title,'
               . 'namegroupproduct as grouptitle, '
               . 'priceproduct as price';
        $from = 'product, storage, groupproduct';
        $where = 'storage.idgroupproduct = groupproduct.idgroupproduct '
               . 'AND product.idproduct = storage.idproduct ';
        $where .= !empty( $this -> group ) ? ' AND namegroupproduct = \'' . $this -> _db -> MySQLi -> real_escape_string( $this -> group ) . '\' ' : 'GROUP BY namegroupproduct';
        $orderby = 'grouparticle, article, title ASC';
        $limit = $this -> page * $limit . "," . $limit;
        
        return $this ->makeView($field, $from, $where, $orderby, $limit);
        
    }
}
