<?php

/**
 * PaginationCatalog
 */

namespace Data\Catalog;

use Service\Get;

class PaginationCatalog {
    use Get;
    
    private $group;
    private $page = 0;
    
    public $_db;    
    
    public function __construct( $db, $request ) {
        
        $this -> _db = $db;
        $this -> page = $request['page'] - 1;
        $this -> group = array_key_exists('group', $request) ? $request['group'] : '';        

    }

    public function Catalog( $limit = 10 ) {
        
        $field = 'product.idproduct as article,'
               . 'groupproduct.idgroupproduct as grouparticle,'
               . 'nameproduct as title,'
               . 'namegroupproduct as grouptitle, '
               . 'descproduct as description,'
               . 'priceproduct as price';
        $from = 'product, storage, groupproduct';
        $where = 'storage.idgroupproduct = groupproduct.idgroupproduct '
               . 'AND product.idproduct = storage.idproduct '
               . !empty( $this -> group ) ? ' AND namegroupproduct = \'' . $this -> group . '\' ' : 'GROUP BY namegroupproduct';
        $orderby = 'title ASC';
        $limit = $this -> page * $limit . "," . $limit;
        
        return $this ->makeView($field, $from, $where, $orderby, $limit);
        
    }



}
