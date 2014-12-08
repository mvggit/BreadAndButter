<?php

/* 
 * Class CatalogControl.
 * is concrete product
 * Abstract Fabrics
 * with builder.
 * 
 */

namespace Data\Control;

use Service\Session;
use Service\Check;

use Data\Catalog\PaginationCatalog;

class CatalogControl {
    use Check;
    
    private $_Db;
    public $view = array();
    
    function __construct($db, $object = 'catalog', $type = 'catalog') {
        
        $this -> _Db = $db;
        Check::$_db = $db;
        
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $object ."/". $type .".php";
        
        if (Check::checkHash() && Check::checkBlocked()) {

            ;
        }
        
        Session::set( 'pagination', $this -> PaginationCatalog( 20 ) );
        
    }

    function ViewCatalog() {
        
        new ViewCatalog();
    }
    
    function SortCatalog() {
        
        new SortCatalog();
    }
    
    function QuickSort() {
        
        new QuickSortCatalog();
    }
    
    function PaginationCatalog( $limit ) {
        
        $list = new PaginationCatalog( $this -> _Db );
        return $list -> get( $limit );
    }

    
}