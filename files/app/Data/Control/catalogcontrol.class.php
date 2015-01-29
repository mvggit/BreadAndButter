<?php

/* 
 * CatalogControl.
 */

namespace Data\Control;

use Service\Session;
use Service \Get;

use Data\Catalog\SortCatalog;
use Data\Catalog\PaginationCatalog;

class CatalogControl {
    use Get;
    
    public $view;
    public $_db;
    
    private $limit = 1;

    public function __construct( $db, $request = array()) {
        
        $this -> _db = $db;
        
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $request['action'] ."/". $request['do'] .".php";

        ( array_key_exists( 'page', $request ) ) 
            ? $this -> PaginationCatalog( $request )
            : $this -> SortCatalog( $request );
        
    }

    public function SortCatalog( $request ){
        
        $catalog = new SortCatalog( $this -> _db, $request );
        Session::set( 'catalog', $catalog -> Catalog( ) );
        
    }
    
    public function PaginationCatalog( $request ){
        
        $catalog = new PaginationCatalog( $this -> _db, $request );
        Session::set( 'paginationlimit', $this -> limit );
        Session::set( 'paginationcount', Get::get( 'count(*) as count', 
                                                   'product, storage, groupproduct',                        
                                                   'storage.idgroupproduct = groupproduct.idgroupproduct '
                                                 . ' AND product.idproduct = storage.idproduct '
                                                 . ' AND namegroupproduct = \'' . $request['group'] . '\' ', 
                                                   ''
                                                )[0]['count']);
        Session::set( 'paginationpage', $request['page'] );
        Session::set( 'catalog', $catalog -> Catalog( $this -> limit ) );
        
    }
    


}