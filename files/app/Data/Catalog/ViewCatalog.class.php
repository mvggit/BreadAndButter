<?php


/**
 * Description of AddTocarts
 * 
 */

namespace Data\Catalog;
use Service\Session;

class ViewCatalog {
    
    private $view = array();
    private $_db;
    
    public function __construct( $db, $object = 'catalog', $type = 'catalog', $pagination = true ) {
        
        $this->_db = $db;
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $object ."/". $type .".php";
    }
    
    public function CatalogList( $sort = 'asc' ){
        
        Session::set( 'cataloglist', $this -> makeCatalogList( $sort ) );
        return $this->view;
    }
    
    public function PaginationCatalogList( $sort = "asc", $start = 0, $pagination_limit = 10 ) {
        
        Session::set( 'cataloglist', $this -> makeCatalogList( $sort, $start, $pagination_limit ) );
        Session::set( 'pagination', true );
        return $this->view;
    }

    private function makeCatalogList( $sort, $start = 0, $pagination_limit = 0) {
        
        return $this -> _db -> fetch( 
                                $this -> _db -> select( 'idproduct as article,'
                                                      . 'nameproduct as title,'
                                                      . 'descproduct as description'
                                                      , 'product'
                                                      , '1'
                                                      , 'title '.$sort
                                                      , (!empty($pagination_limit)) ? "$start, $pagination_limit" : ""
                                                      ) 
                                 );        
        
    }

    public function CatalogGroup( $sort = 'asc' ){
        
        Session::set( 'cataloggroup', $this -> makeCatalogGroup( $sort ) );
        return $this->view;
    }
    
    
    public function PaginationCatalogGroup( $sort = "asc" ) {
    
        return $this->CatalogGroup();
    }
    
    private function makeCatalogGroup( $sort ) {
        
        return $this -> _db -> fetch( 
                                $this -> _db -> select( 'idgroupproduct as group_article,'
                                                      . 'namegroupproduct as group_title'
                                                      , 'groupproduct'
                                                      , '1'
                                                      , 'group_title '.$sort
                                                      , ""
                                                      ) 
                                 );        
        
    }    
    
}
