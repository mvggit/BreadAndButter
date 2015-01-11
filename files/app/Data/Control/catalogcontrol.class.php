<?php

/* 
 * CatalogControl.
 * 
 */

namespace Data\Control;

//use Service\Session;
use Data\Catalog\ViewCatalog;

class CatalogControl {
    
    public $view;
       
    public function __construct( $db, $object = 'catalog', $type = 'group', $pagination = true) {
        
        $this->view = $this->ViewCatalog( $db, $object, $type, $pagination );
        
    }

    public function ViewCatalog( $db, $object, $type, $pagination ) {
        
        $PaginationCatalog = 'PaginationCatalog' . ucfirst($type);
        $Catalog = 'Catalog' . ucfirst($type);
        
        $view = new ViewCatalog( $db, $object, 'catalog' );
        return $pagination
            ? $view -> $PaginationCatalog( )
            : $view -> $Catalog( );
    }

    
}