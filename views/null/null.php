<?php

    namespace Main;
    use Service\Session;

    echo empty( Session::get( 'countproducts' ) ) 
            ? ' ' 
            : $Session::get( 'countproducts' );
