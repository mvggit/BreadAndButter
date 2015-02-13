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
            $( document ).ready( function()
            {
                $('a.catalog').on('click', function( event )
                {
                    event.preventDefault();
                });
                $('.add').on('click', function(){
                var obj = $(this);
                    $.ajax({
                        type: "GET",
                        url: "http://localhost",
                        beforeSend: function( xhr, opt ){
                        var isLogged = '<?php echo Session::get('uin');?>';
                            if ( isLogged == '' )
                            {
                                alert('Пожалуйста войдите в систему');
                                xhr.abort();
                            }
                        },
                        data: {action: 'carts', do: 'add', param: ['One', 
                                <?php echo '\'' . Session::get('identifiercarts') . '\'';?>, 
                                <?php echo '\'' . Session::get('uin') . '\'';?>, 
                                obj.attr('id-product')
                                ]},
                        success : function( data ) {
                            obj.css({ 
                                "line-height": "1.95", 
                                "font-size": "12pt"
                            });
                            obj.html(data);
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

            .container {
                
                min-height: 400px;
            }
            
            .pagination-control {
                position: absolute;
                display: block;
                
                top: 60%;
                height: 19%;
                text-align: center;
            }
            
            .left
            {
                position: absolute;
                left: 3%;
                width: 5%;
            }
            
            .right
            {
                position: absolute;
                right: 3%;
                width: 5%;
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

                <?php

                    $catalog = Session::get( 'catalog' );
                    $cataloglists = is_array( $catalog )
                        ? $catalog
                        : array();

                    foreach ($cataloglists as $key => $list):
                        
                ?>
                
                        <div class="product">
                            <span class="icon">
                                <img src="<?php echo "../img/product/".$list['grouptitle']."/".$list['title'].".png";?>" 
                                     alt="<?php echo $list['title'];?>"
                                     class="productimage"
                                />
                            </span>
                            <span class="name">
                                <a href="" class="catalog">
                                    <?php echo $list['title'];?>
                                </a>
                            </span>
                            <span class="price">
                                <?php echo $list['price'];?> грн
                                <span class="add" id-product="<?php echo $list['article'];?>">
                                    +
                                </span>
                            </span>
                        </div>
                        
               <?php
                        
                    endforeach;

                    if ( Session::get( 'paginationlimit' ) * Session::get( 'paginationpage' ) < Session::get( 'paginationcount' ) ):
                        if ( !empty($cataloglists) ):
                ?>
                            <a class="right pagination-control" 
                               href="http://localhost/?action=catalog&do=list&group=<?php echo $cataloglists[0]['grouptitle'];?>&page=<?php echo ( Session::get( 'paginationpage' ) + 1 );?>">
                                <img src="img/carousel/right.png" alt="" />
                            </a>
               <?php
                        endif;
                    endif;
                    if ( ( Session::get( 'paginationpage' ) - 1 ) > 0 ):
                ?>
                        <a class="left pagination-control" 
                            href="http://localhost/?action=catalog&do=list&group=<?php echo $cataloglists[0]['grouptitle'];?>&page=<?php echo ( Session::get( 'paginationpage' ) - 1 );?>">
                            <img src="img/carousel/left.png" alt="" />
                        </a>

                <?php
                    endif;
                    
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
