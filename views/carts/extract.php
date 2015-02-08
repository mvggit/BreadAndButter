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
        <style type="text/css">
            .photo {
                
                width: 30%;
                float: left;
                
                padding-left: 3%;
                margin-top: 3%;
            }
            
            .delivery {
                
                width: 10%;
                float: left;
                
                text-align: center;
                
                margin: 7% 0 0 5%;
            }
            
            div.cart {
                
                width: 50%;
                float: left;

                margin: 7% 0 0 5%;
            }
            
            div.cart h2 {
                
                margin: 0 0 20px 0;
                padding: 0;
            }
            
            table.cart {
                
                width: 95%;
                
                padding: 5px;
                
                border-top: solid 1px #ddd;
                border-bottom: solid 1px #ddd;
            }
            
            .cart .title {
                
                width: 50%;
                text-indent: 10px;
                
                border-right: solid 1px #ddd;
                border-left: solid 1px #ddd;
            }

            .cart .count, .cart .price {
                
                width: 25%;
                text-align: center;
                
                border-right: solid 1px #ddd;
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
                        if (empty(Session::get('info'))) :
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

                <div class="photo">
                    <img src="/img/main/block_user.png" alt="" />
                </div>
                
                <div class="delivery">
                    <span class="link">
                        <a class="underline" href="?action=carts&do=delivery">Адрес доставки</a>
                        <a style="display: block; margin-top: 15px;" href="?action=carts&do=delivery"><img src="img/carousel/left.png" alt="" /></a>
                    </span>
                </div>
                
                <div class="cart">
                    
                    <h2>Товары в корзине:</h2>
                    
                    <table class="cart" cellpadding="2" cellspacing="2">

                        <tr class="gray">
                            <td class="title">
                                <p>
                                    Наименование
                                </p>
                            </td>
                            <td class="count">
                                <p>
                                    Количество
                                </p>
                            </td>
                            <td class="price">
                                <p>
                                    Цена
                                </p>
                            </td>
                        </tr>

                        <?php

                            //TODO: create echo table use 
                            //      variable $cartslist.

                            $_cartslists = Session::get( 'carts' );
                            $cartslists = empty($_cartslists) 
                                    ? array() 
                                    : $_cartslists;

                            $odd = 0;

                            foreach ($cartslists as $cartslist):
                                if ( empty( $cartslist['title'] ) && 
                                     empty( $cartslist['count'] ) )
                                {
                                    continue;
                                }
                        ?>

                            <tr class="<?php echo ($odd % 2) ? "gray" : "";?>">
                                <td class="title">
                                    <?php
                                        echo $cartslist['title'];
                                    ?>
                                </td>
                                <td class="count">
                                    <?php
                                        echo $cartslist['count'];
                                    ?>
                                </td>
                                <td class="price">
                                    <?php
                                        echo $cartslist['price'];
                                    ?>
                                </td>
                            </tr>

                        <?php

                            $odd++;

                            endforeach;
                        ?>

                    </table>      
                    
                    <a href="#" class="btn-tomain"><img src="/img/main/topay_button.png" alt="" /></a>
                    
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