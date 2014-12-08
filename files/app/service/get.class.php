<?php

/* 
 * Class Get.
 * Adaptee class.
 * 
 * Functionality :
 * class to get information from Db 
 * on authorization section
 */

use Service\Session;
use Service\Cookie;

namespace Service;

trait Get {
    
    private $session;
    private $cookie;
    
    public static $_db;
    
    function get( $hash = '' ) {
        
        if (empty($hash)) {
            
            $hash = md5('maximvg@gmail.com' . '123456789');
        }
        
        $logindata = self :: $_db -> fetch( self :: $_db -> select( 'fname, lname, sname', 'auth, uin', 'hash = \'' . $hash . '\'' . ' AND idauth = iduin', 'idauth ASC', 1 ) );
        
        if ( empty($logindata) ) {
            throw new \Exception('Authentification falied');
        }

        Session :: set( 'logined', implode(' ', $logindata[0]) );
        Cookie :: set('data', $hash);        
        
        return $logindata;
    }    
    
    
}