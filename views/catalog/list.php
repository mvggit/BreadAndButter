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
        <script type="text/javascript">
            $( document ).ready( function(){
                $('.add').on('click', function(){
                var obj = $(this);
                    $.ajax({
                        type: "GET",
                        url: "http://localhost",
                        success : function( data ) {
                            obj.css({ 
                                "line-height": "1.95", 
                                "font-size": "12pt"
                            });
                            obj.html("10");
                        }
                    });
                } );
            } );
        </script>
        
        <style type="text/css">
            
            .product {
                width: 260px;
                height: 125px;
                
                float: left;
                
                margin:20px;
                
                border-right: solid 1px #eee;
            }
            
            .icon {
                width: 120px;
                height:120px;
                
                float: left;
                
                margin: 5px;
            }
            
            .productimage {
                width:95%;
                margin:2.5%;
            }
            
            .name, .price {
                width: 110px;
                height:50px;
                
                display: block;
                
                float: left;
                
                margin: 5px;
            }
            
            .price {
                height: 20px;
                padding-left: 5px;

                color:white;
                background-color: #db935b;

            }
            
            .add {
                height: 30px;
                width: 30px;
                
                margin: -5px 10px auto auto;
                padding: 0 auto 5px auto;
                
                float: right;
                
                background-color: #0e0;
                
                border-radius: 15px;
                
                font-weight: bold;
                font-size: 24pt;
                line-height: 0.955;
                
                text-align: center;
                
                cursor: pointer;
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
                        <li><a href="?action=catalog&do=group" class="btn btn-border-right active">Ассортимент</a></li>
                        <li><a href="?action=carts&do=extract" class="btn btn-border-right active">Корзина</a></li>
                        <li><a href="?action=about" class="btn active">О магазине</a></li>                    
                    </ul>
                </nav>
            </section>
        </header>
        <main>
            <div class="container">

                <?php

                    $_cataloglists = Session::search( 'cataloggroup' ) 
                            ? Session::get( 'cataloggroup' )
                            : Session::get( 'cataloglist' );
                    
                    //var_dump($_cataloglists);
                    
                    $cataloglists = is_array($_cataloglists)
                            ? $_cataloglists
                            : array();

                    foreach ($cataloglists as $key=>$cataloglist):
                        
                ?>
                
                        <div class="product">
                            <span class="icon">
                                <img src="<?php echo "../img/product/".$cataloglist['namegroup']."/".$cataloglist['title'].".png";?>" 
                                     alt="<?php echo $cataloglist['title'];?>"
                                     class="productimage"
                                />
                            </span>
                            <span class="name">
                                <a href="http://localhost/?action=catalog&do=list&group=<?php echo $cataloglist['title'];?>">
                                    <?php echo $cataloglist['title'];?>
                                </a>
                            </span>
                            <span class="price">
                                <?php echo $cataloglist['price'];?> грн
                                <span class="add">
                                    +
                                </span>
                            </span>
                        </div>
                        
               <?php
                        
                    endforeach;
                    
                    Session::destroy( 'cataloglist' );
                    Session::destroy( 'cataloggroup' );
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