<?php

    namespace Main;
    use Service\Session;
    
    //TODO: delete temp variable
    //      $param
    
    $param = '';
?>

<!DOCTYPE html>
<!--
    Open-source project to present skils in today.
    This project "Bread & Butter" is no-comercial
    project. All product in this shop no sale.
-->

<html>
    <head>
        <title>Bread & Butter. Он-лайн магазин хлебобулочных изделий.</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        
        <link href="img/logo/iconv.png" rel="shortcut icon" type="image/x-png" />
        
        <link rel="stylesheet" href="./css/bootstrap.css" />
        <link rel="stylesheet" href="./css/layout.css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <style type="text/css">
            
            .product {
                width: 120px;
                height: 120px;
                
                float: left;
                
                margin:20px;
                
                border: solid 1px #000;
            }
            
            .productimage {
                width:95%;
                margin:2.5%;
            }
        </style>
    </head>
    <body>
        <header>
            <section class="logotype">
               <figure>  
                    <img src="img/logo/logotype.png" alt="Bread & Butter" />
               </figure>
            </section>
            <section class="nav-bar">
                <nav class="navbar_link">
                    <a href="?action=login" class="link color_light_brown">Войти</a>
                    <span class="separator">&nbsp;|&nbsp;</span>
                    <a href="?action=registration" class="link color_light_pink">Зарегистрироваться</a>                
                </nav>
                
                <nav class="navbar-menu">
                    <ul class="list-unstyled list-inline">
                        <li><a href="?action=catalog" class="btn btn-border-right active">Ассортимент</a></li>
                        <li><a href="?action=carts" class="btn btn-border-right active">Корзина</a></li>
                        <li><a href="?action=about" class="btn active">О магазине</a></li>                    
                    </ul>
                </nav>
            </section>
        </header>
        <main>
            <div class="container">

                <?php

                    //TODO: create echo table use 
                    //      variable $cataloglist.

                    $cataloglists = Session::get( 'pagination' );

                    //TODO This trash can be moved!!!
                    $item = 1;
                    
                    
                    
                    foreach ($cataloglists as $key=>$cataloglist):
                        
                ?>
                
                        <div class="product">
                            <span class="icon">
                                <img src="<?php echo "../img/product/rye//".$cataloglist['title'].".png";?>" 
                                     alt="<?php echo $cataloglist['title'];?>"
                                     class="productimage"
                                />
                            </span>
                            <span class="name">
                                <h5>
                                    <?php echo $cataloglist['title'];?>
                                </h5>
                            </span>
                            <span class="short_description">
                                <?php echo $cataloglist['description'];?>
                            </span>
                            <span class="price">
                                
                            </span>
                            
                        </div>
                        
               <?php
                        
                    //TODO This trash can be moved!!! 
                    if ($item >= 5) { echo "<br clear='both'/>"; $item = 1; } else { $item++; }
                    
                    endforeach;
                ?>

            </div>
        </main>
        <footer>
            <ul class="list-unstyled">
                <li class="footer-text text-color">Телефон для справок:&nbsp;+38&nbsp;098&nbsp;743&nbsp;97&nbsp;83</li>
                <li class="footer-text text-color">Email:&nbsp;<a href="mailto:maximvg@gmail.com" class="text-color">maximvg@gmail.com</a></li>
                <li class="footer-text text-color">Skype:&nbsp;gavrylvovmv</li>
            </ul>
        </footer>
    </body>
</html>