<?php

    namespace Main;
    use Service\Session;
    
    $countproducts = Session::get( 'countproducts' );
    echo empty($countproducts) 
            ? ' ' 
            : $countproducts;
