<?php 
    ini_set("dispaly_erros",E_ALL);
    $usuario = [];
    $flores = [];

    $cnx = mysqli_connect("localhost","root","usbw","Floreria") or die ("Error en la conexion a MySql");

    $queryflor = "SELECT * FROM `catalogoprincipal` WHERE `tipo_arreglo` = 'Ramo' ";
    $resFlor = mysqli_query($cnx, $queryflor);

    while($registroFlor = mysqli_fetch_row($resFlor)){
        $flores[] = $registroFlor;
    }
    mysqli_free_result($resFlor);
    mysqli_close($cnx);
?>
<!DOCTYPE html>
<html>
   <head>
        <title>Happy cat shelter - Home</title>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Boostrap Core CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="css/style.css">
        
        <!-- Animate CSS -->
        <link href="css/animate.css" rel="stylesheet">
        
        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
         <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
        <!-- Font awesome -->
        <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <style>
            #lista-horizontal {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
            }

            #lista-horizontal li {
                margin-right: 10px; /* Espacio entre los elementos de la lista */
            }
        </style>
    </head>
    <body>
   
   <!-- Start wrapper -->
   <div class="wrapper">
  	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/logoFlor.png" alt="logo"/></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div>
                <ul class="nav navbar-nav" id="lista-horizontal">
                        <li>
                            <a href="index.php">Inicio</a>
                        </li>
                        <li>
                        <a href="verCarrito.php">Ver Carrito</a>
                        </li>
                        <li>
                        <a href="login.php">Iniciar Sesion</a>
                        </li>
                        <li>
                            <a href="about.php">Sobre Nosotros</a>
                        </li>
                        <li>
                            <a href="contact.php">Entregas</a>
                        </li>
                </ul>

            </div>
            <!-- /navbar-collapse -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /navigation -->

        <div>
            <?php 
                include 'listaBouquet1.php';
            ?>
        </div>

    <!-- Pié de página -->
    <div class="intro4">
           <div class="intro-body">
               <div class="container">
                   <div class="row">
                       <div class="col-md-9 col-sm-9 banner3-text wow fadeIn animated">
                       <div class="main-text">Direccion: Av. Te 950 Granjas Mexico, Iztacalco, 08400, Cuidad de Mexico<br>
                        Correo: contacto@floreriaACM.com
                        <br>tel: 55-6611-8833
                        </div>
                       </div>
                  </div>    
                </div>
            </div>
    </div>
    <!-- /Pié de página -->

      
   <!-- jQuery Version 1.11.0 -->
   <script src="js/jquery-1.11.0.js"></script>
   <!-- Boostrap JS -->
   <script src="js/bootstrap.min.js"></script>
   <!-- Smooth scroll JS -->
   <script src="js/smoothscroll.js"></script>
   <!-- Wow JavaScript -->
   <script src="js/wow.js"></script>
    
   <script>
   new WOW().init();
   </script>


</body>
</html>
