<?php


/**
 * Description of AddTocarts
 * this class must be refactoring
 */

namespace Data\Catalog;

use Service\Session;
use Service\Get;

class ViewCatalog {
    use Get;
    
    private $view = array();
    private $group;
    
    public $_db;    
    
    public function __construct( $db, $request = array(), $pagination = true ) {
        
        $this -> _db = $db;
        $this -> group = array_key_exists('group', $request) ? $request['group'] : 'group';
        $this -> view['filename'] = dirname(__FILE__) . "/../../../../views/". $request['action'] ."/". $request['do'] .".php";

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
        
        return Get::get ( 'product.idproduct as article,'
                          . 'nameproduct as title,'
                          . 'namegroupproduct as namegroup,'
                          . 'descproduct as description'
                          , 'product, storage, groupproduct'
                          , 'namegroupproduct = \'' . $this -> group . '\' '
                          . 'AND product.idproduct = storage.idproduct '
                          . 'AND storage.idgroupproduct = groupproduct.idgroupproduct '
                          , 'title '.$sort
                          , (!empty($pagination_limit)) ? "$start, $pagination_limit" : ""
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
        
        return Get::get ( 'idgroupproduct as article,'
                                                      . 'namegroupproduct as title, '
                                                      . 'descgroupproduct as description'
                                                      , 'groupproduct'
                                                      , '1'
                                                      , 'title '.$sort
                                                      , ""
                                 );        
        
    }    
    
    
    
}
