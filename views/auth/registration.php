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
        <script>
            $(document).ready(function(){
                $("#myCarousel").carousel();
            });
        </script>
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
                        <li><a href="?action=catalog&do=group" class="btn btn-border-right active">Ассортимент</a></li>
                        <li><a href="?action=carts&do=extract" class="btn btn-border-right active">Корзина</a></li>
                        <li><a href="?action=about" class="btn active">О магазине</a></li>                    </ul>
                </nav>
            </section>
        </header>
        <main>
            <div class="container">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
        
                        <div class="item active">
                            &nbsp;
                            <div class="carousel-caption">
                                <form action="" method="post" style="height:400px; overflow-y:scroll">
                                    <h3>
                                        Введите контактную <br />информацию:
                                    </h3>
                                    <br /><br />
                                    <table>
                                        <tr>
                                            <td>
                                                <label>
                                                    Имя пользователя:
                                                </label>
                                            </td>
                                            <td>
                                                <input type="text" name="login" />
                                            </td>
                                        </tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    Пароль:
                                                </label>
                                            </td>
                                            <td>
                                                <input type="password" name="password"/>
                                            </td>
                                        </tr>                                    
                                        <tr>
                                            <td>
                                                <label>
                                                    Повторите пароль:
                                                </label>
                                            </td>
                                            <td>
                                                <input type="password" name="reply-password"/>
                                            </td>
                                        </tr>

                                        <tr><td>&nbsp;</td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    Отображаемое имя:
                                                </label>
                                            </td>
                                            <td>
                                                <input type="text" name="nic"/>
                                            </td>
                                        </tr>                                    
                                        
                                        <tr><td>&nbsp;</td></tr>                                        
                                        
                                        <tr>
                                            <td>
                                                <label>
                                                    Имя:
                                                </label>
                                            </td>
                                            <td>
                                                <input type="text" name="name"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    Фамилия:
                                                </label>
                                            </td>
                                            <td>
                                                <input type="text" name="so_name"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    Отчество:
                                                </label>
                                            </td>
                                            <td>
                                                <input type="text" name="last_name"/>
                                            </td>
                                        </tr>
                                        
                                    </table>
                                    <span class="caption-button"><input type="image" src="img/main/more_button.png" alt="" /></span>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <a class="left carousel-control" href="?action=auth&do=login" data-slide="prev"><img src="img/carousel/left.png" alt="" /></a>
                <!--    <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="img/carousel/right.png" alt="" /></a> !-->
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
