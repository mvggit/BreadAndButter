<?php


/**
 * Description of Sortcatalog
 */

namespace Data\Catalog;

class SortCatalog extends ViewCatalog {
    
    private $group;
    public $_db;    
    
    public function __construct( $db, $request ) {
        
        parent::__construct( $db );
        $this -> _db = $db;
        $this -> group = array_key_exists('group', $request) ? $request['group'] : '';

    }

    public function Catalog( ) {

        if ( !empty( $this -> group ) ){
            $field = 'product.idproduct as article,'
                   . 'groupproduct.idgroupproduct as grouparticle,'
                   . 'nameproduct as title,'
                   . 'namegroupproduct as grouptitle, '
                   . 'descproduct as description,'
                   . 'priceproduct as price';
        }
        else {
            $field = 'groupproduct.idgroupproduct as grouparticle,'
                   . 'namegroupproduct as grouptitle';
        }
        
        $from = 'product, storage, groupproduct';
        $where = 'storage.idgroupproduct = groupproduct.idgroupproduct '
               . 'AND product.idproduct = storage.idproduct ';
        $where .= ( !empty( $this -> group ) ) ? ' AND namegroupproduct = \'' . $this -> group . '\' ' : 'GROUP BY namegroupproduct';
        
        $orderby = 'grouparticle, grouptitle ASC';
        $limit = "";
        
        return $this ->makeView($field, $from, $where, $orderby, $limit);

    }



}
