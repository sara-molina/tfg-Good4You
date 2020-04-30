<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/Grid.css">
    <link rel="stylesheet" type="text/css" href="resources/css/meals-style.css">
    <link rel="stylesheet" type="text/css" href="resources/css/queries.css"> 
    <link rel="stylesheet" type="text/css" href="vendors/css/animate.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/iconmonstr-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT&display=swap" rel="stylesheet">
    <title>Good4You</title>
</head>
<body>
    <header>
        <nav>
            <div class = "row">
                
                <ul class = "main-nav js--main-nav">
                    <li><a href="index.html" class = 'js--scroll-inicio'>Inicio</a></li>
                    <li><a href="showMeals.html">Nuestros platos</a>
                    <li><a href="contact.html" class = 'js--scroll-form'>Contacto</a>
                    <li><a href="login.html">Accede</a>
                    <li><a href="order.html">Haz tu pedido</a>
                </ul>
                <a class ="mobile-nav"><ion-icon class= "mobile-nav-icon js--nav-icon" name="menu-outline"></ion-icon></a> 
                </div>
        </nav>
        <div id="init" class ="hero-text-box js--inicio">
            <h3>Un mundo de sabores <br> con los ingredientes más sanos <br> ¡Haz tu pedido ya!</h3>
            <p>Si te interesa la comida buena para tu salud, este es tu sitio.demás en Good4You tenemos un compromiso con nuestro entorno. 
                Todos nuestros productos son de primeras calidades y bio. <br> <br>
                Nuestras verduras han sido cultivadas por explotaciones ecológicas que no utilizan pesticidas ni químicos. <br> <br>
                Nuestros productos de origen animal provienen de animales criados en granjas en libertad </p>
                </div>


    </header>

    <section class="section-meals js--section-dir-nav">
        <div class="row">
            <h2 class = "section-meals-tittles">Nuestras ensaladas</h2>
        </div>
        
        <?php 
            require ('../model/products.php');
            $products = new Products();
            $products->showProducts();

        ?>
                

    </section>
    <footer>
        <div class="row">
            <div class="col span-2-of-3">
            </div>
            <div class="col span-1-of-3">
             <p>Todos los derechos reservados</p>
            </div>
        </div>

    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src="resources/js/script.js"></script>
    <script src="vendors/js/jquery.waypoints.min.js"></script>
</body>
</html>