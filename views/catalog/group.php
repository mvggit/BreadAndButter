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
        <script type="text/javascript">
            $( document ).ready(function() {
                $("#myCarousel").carousel();
                $("div.icon").click(function()
                {
                    location.href = $( this ).find(".name > a").attr('href');
                }
                );
            }
            );
        </script>
        <style type="text/css">
            
            .product {
                width: 200px;
                height: 240px;
                
                float: left;
                
                margin:20px;
                
                border: solid 0px #000;
            }
            
            .icon {
                cursor: pointer;
            }
            
            img.icon {
                width:95%;
                margin:2.5%;
            }
            
            .name {
                margin: 2.5%;
                text-decoration: underline;
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
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        <?php

                            $catalog = Session::get( 'catalog' ); 
                            $cataloglists = is_array( $catalog )
                                ? $catalog
                                : array();

                            $active = 'active';
                            
                            foreach ($cataloglists as $key => $list):

                        ?>
            
            
                        <div class="item <?php echo $active; ?>">
                            <img src="<?php echo "../img/product/" . $list['grouptitle'] ."/". $list['grouptitle'].".png";?>" 
                                     alt="<?php echo $list['grouptitle'];?>"
                                     class="icon"
                                />
                            <div class="carousel-caption">
                                <h1><?php echo $list['grouptitle'];?></h1>
                                <?php echo $list['description'];?>
                                <span class="caption-button">
                                    <a class="active" 
                                       href="http://localhost/?action=catalog&do=list&group=<?php echo $list['grouptitle'];?>&page=1" role="button">
                                        <img src="img/main/more_button.png" alt="" />
                                    </a>
                                </span>
                            </div>
                        </div>

                        <?php
                            $active = '';
                        
                            endforeach;
                        ?>
                        
                    </div>
                <!--    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="img/carousel/left.png" alt="" /></a> !-->
                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="img/carousel/right.png" alt="" /></a>
                </div>
            </div>
            
            
            
<!--            <div class="container">                
                        <div class="product">
                            <div class="icon">
                                <img src="<?php echo "../img/product/" . $list['grouptitle'] ."/". $list['grouptitle'].".png";?>" 
                                     alt="<?php echo $list['grouptitle'];?>"
                                     class="icon"
                                />
                                <span class="name">
                                    <a href="http://localhost/?action=catalog&do=list&group=<?php echo $list['grouptitle'];?>&page=1">
                                        <?php echo $list['grouptitle'];?>
                                    </a>
                                </span>
                            </div>
                        </div>-->
                        
               <?php
                        
                    Session::destroy( 'catalog' );
                    
                ?>

<!--            </div>-->
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
