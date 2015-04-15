<?php

  namespace Main;
  
  $time = microtime( true );
  
  session_start();
  
  include 'files/app/spl/autoload.class.php';
  include 'files/app/app.class.php';
  
  App::init();
  
  echo "<br />", "Script time:", microtime( true ) - $time;