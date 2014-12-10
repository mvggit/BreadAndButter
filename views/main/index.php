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
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="tmp/img/wheats/bran_bread.png" alt="Хлеб Отрубной" />
                            <div class="carousel-caption">
                                <h1>Хлеб пшеничный</h1>
                                <p><b>Хлеб пшеничный</b> выпекается из муки первого сорта. Выпечка производится до готовности 
                                   из дрожжевого теста.
                                </p>
                                <p><b>Рецептура</b> хлеба пшеничного основывается на ГОСТ&nbsp;27842&mdash;88. Выпекается на высокотехнологичном оборудовании при достаточной для выпечки температуре.
                                </p>
                                <p><b>Ингридиенты:</b>  мука пшеничная хлебопекарная в/с, вода питьевая, дрожжи, соль пищевая.
                                </p>
                                <span class="caption-button"><a class="active" href="#" role="button"><img src="img/main/more_button.png" alt="" /></a></span>
                            </div>
                        </div>
        
                        <div class="item">
                            <img src="tmp/img/rye/borodino.png" alt="Хлеб бородинский" />
                            <div class="carousel-caption">
                                <h1>Хлеб ржаной.</h1>
                                <p><b>Хлеб ржаной</b> выпекается из ржаной обойной, обдирной, сеяной муки. Выпечка производится до готовности 
                                   из дрожжевого теста.
                                </p>
                                <p><b>Рецептура</b> хлеба ржаного основывается на ГОСТ&nbsp;2077&mdash;84. Выпекается на высокотех - нологичном оборудовании при достаточной для выпечки температуре.
                                </p>
                                <p><b>Ингридиенты:</b>  мука ржаная хлебопекарная, вода питьевая, дрожжи, соль пищевая.
                                </p>
                                <span class="caption-button"><a class="active" href="#" role="button"><img src="img/main/more_button.png" alt="" /></a></span>
                            </div>
                        </div>
        
                        <div class="item">
                            <img src="tmp/img/loaf/seversky.png" alt="Батон Северский">
                            <div class="carousel-caption">
                                <h1>Батоны.</h1>
                                <p><b>Батон</b> выпекается из пшеничной муки высшего сорта. Выпечка производится до готовности 
                                   из дрожжевого теста.
                                </p>
                                <p><b>Рецептура</b> батонов основывается на ГОСТ&nbsp;27844&mdash;88. Выпекается на высокотехно -логичном оборудовании при достаточной для выпечки температуре.
                                </p>
                                <p><b>Ингридиенты:</b>  мука пшеничная хлебопекарная в/с, вода питьевая, дрожжи, соль пищевая.
                                </p>
                                <span class="caption-button"><a class="active" href="#" role="button"><img src="img/main/more_button.png" alt="" /></a></span>
                            </div>
                        </div>
                        
                        <div class="item">
                            <img src="tmp/img/buns/pyshki_kharkov.png" alt="Пампушки Харьковские" />
                            <div class="carousel-caption">
                                <h1>Булки.</h1>
                                <p><b>Батон</b> выпекается из пшеничной муки высшего сорта. Выпечка производится до готовности 
                                   из дрожжевого теста.
                                </p>
                                <p><b>Рецептура</b> булок основывается на ГОСТ&nbsp;27844&mdash;88. Выпекается на высокотехно -логичном оборудовании при достаточной для выпечки температуре.
                                </p>
                                <p><b>Ингридиенты:</b>  мука пшеничная хлебопекарная в/с, вода питьевая, дрожжи, молоко, соль пищевая.
                                </p>
                                <span class="caption-button"><a class="active" href="#" role="button"><img src="img/main/more_button.png" alt="" /></a></span>
                            </div>
                        </div>                        

                        <div class="item">
                            <img src="tmp/img/bakery_zdobnov/bagel_with_poppy_seeds.png" alt="Бублик с маком" />
                            <div class="carousel-caption">
                                <h1>Булки сдобные.</h1>
                                <p><b>Булки сдобные</b> выпекаются из пшеничной муки высшего и первого сорта. Выпечка производится до готовности 
                                   из дрожжевого теста.
                                </p>
                                <p><b>Рецептура</b> хлеба пшеничного основывается на ГОСТ&nbsp;24557&mdash;89. Выпекается на высокотехнологичном оборудовании при достаточной для выпечки температуре.
                                </p>
                                <p><b>Ингридиенты:</b>  мука пшеничная хлебопекарная ввысшего и первого сортов, вода питьевая, дрожжи, молоко, растительные жиры, соль пищевая, сахар.
                                </p>
                                <span class="caption-button"><a class="active" href="#" role="button"><img src="img/main/more_button.png" alt="" /></a></span>
                            </div>
                        </div>                             
                        
                    </div>
                <!--    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="img/carousel/left.png" alt="" /></a> !-->
                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="img/carousel/right.png" alt="" /></a>
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
