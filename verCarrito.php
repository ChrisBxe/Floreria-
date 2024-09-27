<?php
    global $precio;
    global $precioTotal;
    session_start();
    
    $precioTotal = 0;

    if(isset($_POST["generar"])){
        //Incluimos la librería
        require_once 'Html2Pdf.php';
        
        //Recogemos el contenido de la vista
        ob_start();
        require_once 'vistaImprimir.php';
        $html=ob_get_clean();
    
        //Pasamos esa vista a PDF
        
        //Le indicamos el tipo de hoja y la codificación de caracteres
        $mipdf=new HTML2PDF('P','A4','es','true','UTF-8');
    
        //Escribimos el contenido en el PDF
        $mipdf->writeHTML($html);
    
        //Generamos el PDF
        $mipdf->Output('PdfGeneradoPHP.pdf');
    
    }
?>

<html>
  <head>
    <title>Florería "ACM" - Inicio de sesión</title>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Boostrap Core CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
        
        <!-- CSS Principal -->
        <link rel="stylesheet" href="css/style.css">
        
        <!-- CSS Animado -->
        <link href="css/animate.css" rel="stylesheet">
        
        <link  href="https://api.html2pdf.app/v1/generate?html=https://example.com&apiKey={sfJSS2FrMA5rWjEOPenKq16qiMCuZnl3WkijaWgkwJVZCqjppuyhcC7qUObq2GO0}">
        
        <!-- Fuentes Google -->
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
         <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
        <!-- Fuente awesome -->
        <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script>
            function cerrar(){
                document.getElementById("auxiliar").value= "CERRAR";
                document.getElementById("formulario").submit();
            }
        </script>
  </head>
  <body class="register">
    <!-- Inicio de "wrapper" -->
    <div class="wrapper">
        <!-- Barra de Navigación -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <!-- Marca y alternar se agrupan para una mejor visualización móvil -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Logo de la página -->
                    <a class="navbar-brand" href="inicio.html"><img src="img/flor.png" alt="logo"/></a>
                </div>
                <!-- Recopile los enlaces de navegación, formularios y otro contenido para alternar -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">Inicio</a>
                        </li>
                        <li>
                            <a href="verCarrito.php">Ver carrito</a>
                        </li>
                        <li>
                            <a href="login.php">Iniciar sesión</a>
                        </li>
                        <li>
                            <a href="about.php">Sobre Nosotros</a>
                        </li>
                        <li>
                            <a href="contact.php">Entregass</a>
                        </li>
                    </ul>

                </div>
                <!-- /navbar-collapse -->
            </div>
            <!-- /container -->
        </nav>
        <!-- /Barra de Navigación -->

        <!-- Formulario de registro -->

        <form class="registration-form" method="POST">
            <div class="text-center" id="tiket">
            <table border>
                <?php for($i = 0; $i< count($_SESSION['carrito']); $i++) : ?>
                <tr>
                    <td><?php echo $_SESSION['carrito'][$i] ?></td>
                    <td><?php echo "$ " . $_SESSION['precio'][$i] ?></td>
                </tr>
                <?php $precioTotal = $precioTotal + $_SESSION['precio'][$i]; ?>
                <?php endfor ?>
                <tr>
                    <td>Precio Total</td>
                    <td><?php echo "$ " . $precioTotal; ?></td>
                </tr>
                </table>
                <br><br>
                <input type="submit" class="btn first-btn"  value="Generar PDF" name="generar"/>
            </div>
        </form>

        <!-- /Formulario de registro -->
    
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

    </div>
    <!-- Fin del "wrapper" -->