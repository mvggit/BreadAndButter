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
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <style>
            .container-inner
            {
                width: auto;
                float: left;

                padding: 50px auto auto auto;
                margin-left: 70px;
            }

            .container-inner p
            {
                width: 95%;
                float: left;

                margin:20px auto 10px auto;
            }

            .container-inner h1
            {
                margin:90px auto 30px auto;
            }

            .container-inner ul
            {
                width: 95%;
                float: left;

                display: block;

                margin:10px auto 10px auto;
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
                        if (!Session::get('info')) :
                    ?>
                    <a href="?action=auth&do=login" class=\"link color_light_brown\">Войти</a>
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
                <div class="container-inner">
                    <h1>О магазине</h1>
                    <p>Магазин Bread & Butter &ndash; некоммерческий магазин с открытым кодом.</p>
                    <p>
                        В разработке использовалось:</p>
                    <ul>
                        <li>Sybase PowerDesinger 10.x</li>
                        <li>MySQL 5.x</li>
                        <li>PHP 5.5</li>
                    </ul>
                    <a href="http://localhost/" class="btn-tomain"><img src="/img/main/tomain_button.png" alt="" /></a>
                </div>
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
