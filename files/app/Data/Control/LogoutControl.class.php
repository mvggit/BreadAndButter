<?php

/*
 * logoutcontrol
 * class to logout operation.
 */

namespace Data\Control;

use Service\Session;
/**
 * @author Максим
 */
class logoutcontrol 
{
    public $view;
    
    function __construct( $db, $request )
    {
        Session::destroy( 'info' );
        Session::destroy( 'name' );
        Session::destroy( 'identifiercarts' );
        Session::destroy( 'uin' );
        
        $catalog = new CatalogControl( $db, array('action'=>'catalog', 'do'=>'group'));
        $this -> view = $catalog -> view;
    }



}
