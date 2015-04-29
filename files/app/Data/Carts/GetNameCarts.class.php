<?php

/**
 * CreateCarts
 */

namespace Data\Carts;

use Service\Session;

use Service\Create;
use Service\Get;


class GetNameCarts 
{
    use Create;
    use Get;
    
    public $cartsname = '';
    private $key = array('a','b','c','d','e','f',  
                 'g','h','i','j','k','l',  
                 'm','n','o','p','r','s',  
                 't','u','v','x','y','z',  
                 'A','B','C','D','E','F',  
                 'G','H','I','J','K','L',  
                 'M','N','O','P','R','S',  
                 'T','U','V','X','Y','Z',  
                 '1','2','3','4','5','6',  
                 '7','8','9','0');  
    public $_db;

    
    public function __construct( $db )
    {
        $this -> _db = $db;
    }
    
    
    private function GenerateCartsName() 
    {
        for( $i = 0; $i < 6; $i++ )  
        {  
            $this -> cartsname .= $this -> key[ rand( 0, count( $this -> key ) - 1 ) ];
        }
        
    }
    
    
    public function SetCarts()
    {
        if ( empty( $this -> cartsname ) ) 
        {
            $this ->GenerateCartsName();
        }

        $this 
            -> unsetparam()
            -> setparam( 'idauth', (int)Session::get('uin') )
            -> setparam( 'identifiercarts', "'" . $this -> cartsname . "'" )
            -> setparam( 'idproductincarts', 'null' )
            -> setparam( 'idstorageincarts', 'null' )
            -> setparam( 'countincarts', 'null' )
            -> setparam( 'priceincarts', 'null' )
            -> setparam( 'storedcarts', (int)0 )
            -> setparam( 'savedate', strval('now()') )
            -> create( 'carts' );
        
        Session::set( 'identifiercarts', $this -> cartsname );
    }
    
    
    public function GetCarts()
    {
        if ( ( $this -> cartsname = $this -> get( 'identifiercarts', 'carts, auth', 'hash = \'' . Session::get('info') . '\' AND auth.idauth = carts.idauth', $limit = 1)[0]['identifiercarts'] ) ) 
        {
            Session::set( 'identifiercarts', $this -> cartsname );
        }
        else
        {
            $this -> SetCarts();
        }
        
        return Session::get('identifiercarts');
    }



}
