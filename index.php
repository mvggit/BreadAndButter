<?php

  namespace Main;
  
  session_start();
  
  include 'files/app/spl/autoload.class.php';
  include 'files/app/app.class.php';
  
  App::init();