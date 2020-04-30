<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--SEO Optimization-->
    <meta name="description" content="Omnifood is a premium food delivery service with the mission to bring afordable and healthy meals to as many people">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Goof4You</title>
    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/Grid.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="resources/css/queries.css"> 
    <link rel="stylesheet" type="text/css" href="vendors/css/animate.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/iconmonstr-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT&display=swap" rel="stylesheet">
</head>
<body>
    <div class ="contact-div-nav">
        <nav>
            <div class = "row">
                <ul class = "main-nav js--main-nav">
                    <li><a href="index.html" class = 'js--scroll-inicio'>Inicio</a></li>
                    <li><a href="showMeals.php">Nuestros platos</a>
                    <li><a href="contact.html" class = 'js--scroll-form'>Contacto</a>
                    <li><a href="login.html">Accede</a>
                    <li><a href="order.html">Haz tu pedido</a> 
                </ul>
                <a class ="mobile-nav"><ion-icon class= "mobile-nav-icon js--nav-icon" name="menu-outline"></ion-icon></a> 
                </div>
        </nav>
    </div>
   
    <section>

    <?php 
    require ('../model/orders.php');
    $order = new Order();
    

    if(isset($_POST['orders'])){
        echo "<div class=\"orders-div\">" ;
        $order->showOrders();
        echo "</div>";
    } 

    ?>
    </section>
    <footer>
        <div class="row">
            <div class="col span-2-of-3">
            <p>Todos los derechos reservados</p>
            </div>
            <div class="col span-1-of-3">
                <ul class="footer-nav rss-div">
                    <li><a class = "rss-a"><i class="rss-icons im im-twitter"></i></a></li>
                    <li><a class = "rss-a"><i class="rss-icons im im-facebook"></i></a></li>
                    <li><a class = "rss-a"><i class="rss-icons im im-instagram"></i></a></li>
                    <li><a ><i class="rss-icons im im-google-plus"></i></a></li>
                </ul>
            </div>
        </div>

    </footer>

    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src="resources/js/script.js"></script>
    <script src="vendors/js/jquery.waypoints.min.js"></script>
    <script src="../controller/validate.js"></script>
    
    
</body>
</html>