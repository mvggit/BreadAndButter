<?php

    namespace Main;
    use Service\Session;
    
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
        <style type="text/css">
            .authorization, .registration {
                width: 45%;
                margin: 7% 0 0 4%;

                float:right;
            }

            .registration h1 {
                font-weight: normal;
                margin-bottom: 30px;
            }

            .authorization .link {
                width: 100px;
                height: 200px;
                
                float:left;

                display: block;
                
                margin: 5.8% 0 0 25%;
                
                text-align: center;
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
                    <?php
                        if ( !Session::get('info') ) :
                    ?>
                            <a href="?action=auth&do=login" class="link color_light_brown">Войти</a>
                            <span class="separator">&nbsp;|&nbsp;</span>
                            <a href="?action=auth&do=registration" class="link color_light_pink">Зарегистрироваться</a>
                    <?php
                        else:
                    ?>
                            <span class="link color_light_brown"><?php echo Session::get('name')?></span>
                            <span class="separator">&nbsp;|&nbsp;</span>
                            <a href="?action=logout" class="link color_light_pink">Выйти</a>
                    <?php
                        endif;
                    ?>
                </nav>
                
                <nav class="navbar-menu">
                    <ul class="list-unstyled list-inline">
                        <li><a href="?action=carts&do=extract" class="btn btn-border-right active">Корзина</a></li>
                        <li><a href="?action=about" class="btn active">О магазине</a></li>                    
                    </ul>
                </nav>
            </section>
        </header>
        <main>
            <div class="container">
                <div class="registration">
                    <h3>
                        Все получилось, спасибо!
                    </h3>
                    <a href="http://localhost/" class="btn-tomain"><img src="/img/main/tomain_button.png" alt="" /></a>
                </div>
                
                <div class="authorization">                    
                    <span class="link">
                        <a class="underline" href="?action=auth&do=login">Войти</a>
                        <br />
                        <a style="display: block; margin-top: 15px;" href="?action=auth&do=login"><img src="img/carousel/left.png" alt="" /></a>
                    </span>
                </div>
            </div>                

            </div>
        </main>
        <footer>
            <ul class="list-unstyled">
                <li class="footer-text text-color">Email:&nbsp;<a href="mailto:maximvg@gmail.com" class="text-color">maximvg@gmail.com</a></li>
                <li class="footer-text text-color">Skype:&nbsp;gavrylvovmv</li>
            </ul>
        </footer>
    </body>
</html>
