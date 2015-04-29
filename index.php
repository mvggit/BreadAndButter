<?php

  namespace Main;
  
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  
  $time = microtime( true );
  
  session_start();
  
  include 'files/app/spl/autoload.class.php';
  include 'files/app/app.class.php';
  
  App::init();
  
  echo "<br />", "Script time:", microtime( true ) - $time;