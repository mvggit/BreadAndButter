<?php

/* 
 * CatalogControl.
 */

namespace Data\Control;

use Service\Session;

use Data\Catalog\SortCatalog;
use Data\Catalog\PaginationCatalog;

class CatalogControl {
    
    public $view;
    public $_db;

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
        Session::set( 'catalog', $catalog -> Catalog() );
        
    }
    


}