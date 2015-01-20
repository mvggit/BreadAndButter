<?php

/* 
 * CatalogControl.
 * must be refactoring
 * 
 * Pagination is the class questions!
 * think to make anothe configuration's
 * in class.
 */

namespace Data\Control;

//use Service\Session;
use Data\Catalog\ViewCatalog;

class CatalogControl {
    
    public $view;
       
    public function __construct( $db, $request = array(), $pagination = false) {
        
        $this -> view = $this -> ViewCatalog( $db, $request, $pagination );
        
    }

    public function ViewCatalog( $db, $request = array(), $pagination = false ) {
        
        $PaginationCatalog = 'PaginationCatalog' . ucfirst($request['do']);
        $Catalog = 'Catalog' . ucfirst($request['do']);
        
        $view = new ViewCatalog( $db, $request);
        return $pagination
                ? $view -> $PaginationCatalog( )
                : $view -> $Catalog( );
    }

    
}