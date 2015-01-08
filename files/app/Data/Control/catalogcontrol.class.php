<?php

/* 
 * Class CatalogControl.
 * is concrete product
 * Abstract Fabrics
 * with builder.
 * 
 */

namespace Data\Control;

//use Service\Session;
use Data\Catalog\ViewCatalog;

class CatalogControl {
    
//    private $_db;
    
    public $view;
       
    public function __construct( $db, $object = 'catalog', $type = 'catalog', $pagination = true) {
        
        $this->view = $this->ViewCatalog( $db, $object, $type, $pagination );
    }

    public function ViewCatalog( $db, $object, $type, $pagination ) {
        
        //$pagination = false;
        $view = new ViewCatalog( $db, $object, $type );
        return $pagination
            ? $view -> PaginationCatalogList( )
            : $view -> CatalogList( );
    }

    
}