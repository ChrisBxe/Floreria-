<?php 
    if(isset($_POST['usuario'])){
        $cnx = mysqli_connect("localhost","root","usbw","Floreria") or die ("Error en la conexion a MySql");

        $rol = $_POST['rol'];
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $calle = $_POST['calle'];
        $numExt = $_POST['numExt'];
        $numInt = $_POST['numInt'];
        $colonia = $_POST['colonia'];
        $delegacion = $_POST['delegacion'];
        $codigoPostal = $_POST['codigoPostal'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        $query = "INSERT INTO `usuarios`(`Rol`, `Usuario`, `Contraseña`, `Calle`, `NumExt`, `NumInt`, `Colonia`, `Delegacion`, `CodigoPostal`, `Nombre(S)`, `Apellidos`) VALUES ($rol, $usuario, $contraseña, $calle, $numExt, $numInt,  $colonia, $delegacion, $codigoPostal, $nombre, $apellido)";

        echo "<script>alert('Usuario agregado')</script>";
        echo "<a href = 'index.php'>Regresar</a>";
        die();
    }
?>
<html lang="en">
  <head>
    <title>Florería "ACM" - Registro</title>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Boostrap Core CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
        
        <!-- CSS Principal -->
        <link rel="stylesheet" href="css/style.css">
        
        <!-- CSS Animado -->
        <link href="css/animate.css" rel="stylesheet">
        
        <!-- Fuentes Google -->
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
         <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
        <!-- Fuente awesome -->
        <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
                            <a href="inicio.php">Inicio</a>
                        </li>
                        <li>
                            <a href="sesion.php">Iniciar sesión</a>
                        </li>
                        <li>
                            <a href="verCarrito.php">Ver carrito</a>
                        </li>
                        <li>
                            <a href="nosotros.php">Nosotros</a>
                        </li>
                        <li>
                            <a href="contacto.php">Contáctanos</a>
                        </li>
                    </ul>

                </div>
                <!-- /navbar-collapse -->
            </div>
            <!-- /container -->
        </nav>
        <!-- /Barra de Navigación -->

        <!-- Formulario de registro -->

        <form class="registration-form">
            <div class="text-center">
                <img src="img/avataricon.png" alt="avataricon" id="avataricon" width="150px">
            </div>
            <div class="form-group">
                <label for="name" class="colored-label">Nombre:</label>
                <input type="text" class="form-control narrower-input" id="nombre" placeholder="Ingrese su nombre" required>
            </div>
            <div class="form-group">
                <label for="apellidos" class="colored-label">Apellidos:</label>
                <input type="text" class="form-control narrower-input" id="apellidos" placeholder="Ingrese sus apellidos" required>
            </div>
            <div class="form-group">
                <label for="email" class="colored-label">Email:</label>
                <input type="email" class="form-control narrower-input" id="email" placeholder="Ingrese su correo electrónico" required>
            </div>
            <div class="form-group">
                <label for="password" class="colored-label">Contraseña:</label>
                <input type="password" class="form-control narrower-input" id="password" placeholder="Ingrese su contraseña" required>
            </div>
            <div class="form-group">
                <label for="calle" class="colored-label">Calle:</label>
                <input type="text" class="form-control narrower-input" id="calle" placeholder="Ingrese su calle" required>
            </div>
            <div class="form-group">
                <label for="colonia" class="colored-label">Colonia:</label>
                <input type="text" class="form-control narrower-input" id="colonia" placeholder="Ingrese su colonia" required>
            </div>
            <div class="form-group">
                <label for="delegacion" class="colored-label">Delegación:</label>
                <input type="text" class="form-control narrower-input" id="delegación" placeholder="Ingrese su delegación" required>
            </div>
            <div class="form-group">
                <label for="numExt" class="colored-label">Número exterior:</label>
                <input type="text" class="form-control narrower-input" id="numExt" placeholder="Ingrese su número exterior" required>
            </div>
            <div class="form-group">
                <label for="numInt" class="colored-label">Número interior:</label>
                <input type="text" class="form-control narrower-input" id="numInt" placeholder="Si no tiene número interior, ponga 0" required>
            </div>
            <div class="form-group">
                <label for="cp" class="colored-label">Código postal:</label>
                <input class="form-control narrower-input" id="cp" placeholder="Ingrese su código postal" required>
            </div>
            <button type="submit" class="btn second-btn" id="btn-register">Registrarse</button>
            <div class="form-group">
                <a href="#" class="custom-link">Términos y condiciones</a>
            </div>
        </form>

        <!-- /Formulario de registro -->
    
    </div>
    <!-- Fin del "wrapper" -->

    <!-- Pié de página -->
    <div class="intro4">
           <div class="intro-body">
               <div class="container">
                   <div class="row">
                       <div class="col-md-9 col-sm-9 banner3-text wow fadeIn animated">
                       <p class="subtitle fancy"><span>Contacto</span></p>
                       <div class="main-text">Direccion: Av. Te 950 Granjas Mexico, Iztacalco, 08400, Cuidad de Mexico<br>
                        Correo: contacto@floreriaACM.com
                        <br>tel: 55-6611-8833
                        </div>
                       <p class="subtitle fancy"><span>Floreria ACM</span></p>
                       </div>
                  </div>    
                </div>
            </div>
    </div>
    <!-- /Pié de página -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/popper/popper.min.js"></script>
    <script src="./assets/vendor/bootstrap/bootstrap.min.js" ></script>

    <!-- optional plugins -->
    <script src="./assets/vendor/nouislider/js/nouislider.min.js"></script>

    <!--   lazy javascript -->
    <script src="./assets/js/lazy.js"></script>
  </body>
</html>