<?php

/* 
 * CatalogControl.
 * must be refactoring
 */

namespace Data\Control;

//use Service\Session;
use Data\Catalog\ViewCatalog;

class CatalogControl {
    
    public $view;
       
    public function __construct( $db, $object = 'catalog', $type = 'group', $pagination = false) {
        
        $this->view = array_key_exists('group', $type)
                ? $this->ViewCatalog( $db, $object, $type['do'], $type['group'], $pagination )
                : $this->ViewCatalog( $db, $object, $type['do'], $pagination );
        
    }

    public function ViewCatalog( $db, $object, $type, $group = '', $pagination = false ) {
        
        $PaginationCatalog = 'PaginationCatalog' . ucfirst($type);
        $Catalog = 'Catalog' . ucfirst($type);
        
        $view = new ViewCatalog( $db, $object, 'catalog', $group );
        return $pagination
            ? $view -> $PaginationCatalog( )
            : $view -> $Catalog( );
    }

    
}