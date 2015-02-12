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
            
            .cart {
                
                width: 15%;
                float: left;
                
                text-align: center;
                
                margin: 7% 0 0 5%;
            }
            
            div.delivery {
                
                width: 45%;
                float: left;

                margin: 7% 0 0 5%;
            }
            
            div.delivery h2 {
                
                margin: 0 0 20px 0;
                padding: 0;
            }
            
            table.delivery {
                
                width: 95%;
                padding: 0;
                line-height: 0.8;
                
            }
            
            .btn-input {
                
                margin: 20px 0 0 30px;
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
                
                <div class="cart">
                    <span class="link">
                        <a class="underline" href="?action=carts&do=extract">Товары в корзине</a>
                        <a style="display: block; margin-top: 15px;" href="?action=carts&do=extract"><img src="img/carousel/right.png" alt="" /></a>
                    </span>
                </div>
                
                <div class="delivery">
                    
                    <h2>Адрес доставки:</h2>
                    
                    <?php

                        if ( !empty( $deliverylist = Session::get( 'delivery' ) ) ) :
                    ?>

                    <table class="delivery">                                        
                        <tr>
                            <td class="description">
                                <p>
                                    Индекс
                                </p>
                            </td>
                            <td class="descriptionvalue">
                                <p>
                                    <?php echo $deliverylist[0]['postalzip']; ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="description">
                                <p>
                                    Город
                                </p>
                            </td>
                            <td class="descriptionvalue">
                                <p>
                                    <?php echo $deliverylist[0]['city']; ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="description">
                                <p>
                                    Улица
                                </p>
                            </td>
                            <td class="descriptionvalue">
                                <p>
                                    <?php echo $deliverylist[0]['street']; ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="description">
                                <p>
                                    Дом
                                </p>
                            </td>
                            <td class="descriptionvalue">
                                <p>
                                    <?php echo $deliverylist[0]['house']; ?>
                                </p>
                            </td>
                        </tr>
                    <?php
                        if ( !empty( $deliverylist[0]['houseblock'] ) ):
                    ?>
                        <tr>                            
                            <td class="description">
                                <p>
                                    Блок
                                </p>
                            </td>
                            <td class="descriptionvalue">
                                <p>
                                    <?php echo $deliverylist[0]['houseblock']; ?>
                                </p>
                            </td>
                        </tr>
                    <?php
                        endif;
                        if ( !empty( $deliverylist[0]['houseroom'] ) ):
                    ?>
                        <tr>                            
                            <td class="description">
                                <p>
                                    Квартира
                                </p>
                            </td>
                            <td class="descriptionvalue">
                                <p>
                                    <?php echo $deliverylist[0]['houseroom']; ?>
                                </p>
                            </td>
                        </tr>    
                    <?php
                        endif;
                    ?>
                    </table>
                    
                    <a href="http://localhost/" class="btn-tomain"><img src="/img/main/tomain_button.png" alt="" /></a>

                    <?php

                        else:
                    ?>
                    
                    <form action="" method="POST" >
                    
                        <table class="delivery">

                            <tr>
                                <td class="description">
                                    <p>
                                        Индекс
                                    </p>
                                </td>
                                <td class="descriptionvalue">
                                    <p>
                                        <input type="text" name="postalzip" />
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td class="description">
                                    <p>
                                        Город
                                    </p>
                                </td>
                                <td class="descriptionvalue">
                                    <p>
                                        <input type="text" name="city" />
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td class="description">
                                    <p>
                                        Улица
                                    </p>
                                </td>
                                <td class="descriptionvalue">
                                    <p>
                                        <input type="text" name="street" />
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td class="description">
                                    <p>
                                        Дом
                                    </p>
                                </td>
                                <td class="descriptionvalue">
                                    <p>
                                        <input type="text" name="house" />
                                    </p>
                                </td>
                            </tr>
                            <tr>                            
                                <td class="description">
                                    <p>
                                        Блок
                                    </p>
                                </td>
                                <td class="descriptionvalue">
                                    <p>
                                        <input type="text" name="houseblock" />
                                    </p>
                                </td>
                            </tr>
                            <tr>                            
                                <td class="description">
                                    <p>
                                        Квартира
                                    </p>
                                </td>
                                <td class="descriptionvalue">
                                    <p>
                                        <input type="text" name="houseroom" />
                                    </p>
                                </td>
                            </tr>                                    

                        </table>

                        <input class="btn-input" type="image" src="/img/main/tosave_button.png" />

                    </form>

                    <?php
                        endif;
                    ?>
                    
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