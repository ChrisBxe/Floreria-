<?php 
    if(isset($_POST['usuario'])){
        $cnx = mysqli_connect("localhost","root","usbw","Floreria") or die ("Error en la conexion a MySql");

        $rol = $_POST['rol'];
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $calle = $_POST['calle'];
        $numExt = $_POST['numExt'];
        $numInt = $_POST['numInt'];
        $colonia = $_POST['colonia'];
        $delegacion = $_POST['delegacion'];
        $codigoPostal = $_POST['codigoPostal'];

        $query = "INSERT INTO `usuarios`(`Rol`, `Usuario`, `Contraseña`, `Calle`, `NumExt`, `NumInt`, `Colonia`, `Delegacion`, `CodigoPostal`, `Nombre(S)`, `Apellidos`) VALUES ($rol, $usuario, $contraseña, $calle, $numExt, $numInt,  $colonia, $delegacion, $codigoPostal, $nombre, $apellido)";

        echo "<script>alert('Usuario agregado')</script>";
        echo "<a href = 'index.php'>Regresar</a>";
        die();
    }
?>
<html lang="en">
  <head>
  <title>Florería "ACM" - Añadir Usuario</title>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        
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
                    <a class="navbar-brand" href="adminView.php"><img src="img/flor.png" alt="logo"/></a>
                </div>
                <!-- Recopile los enlaces de navegación, formularios y otro contenido para alternar -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="login.html">Iniciar sesión</a>
                        </li>
                        </li>
                    </ul>

                </div>
                <!-- /navbar-collapse -->
            </div>
            <!-- /container -->
        </nav>
        <!-- /Barra de Navigación -->

        <!-- Formulario de registro -->
        <form method="POST" class="registration-form">
            <div>
                <div class="text-center">
                    <img src="img/admin.png" alt="admin">
                </div>
                <br>
            </div>

            <!-- Contenedor de las filas -->
            <div class="columna-contenedor">

                <div class="form-group">
                    <label for="user" class="colored-label">Rol</label>
                    <input type="text" class="form-control narrower-input" name="rol" placeholder="Ingrese el nombre" required>
                </div>

                <div class="row columnas">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user" class="colored-label">Usuario</label>
                            <input type="text" class="form-control narrower-input" name="usuario" placeholder="Ingrese el usuario" required>
                        </div>

                        <div class="form-group">
                            <label for="pass" class="colored-label">Contraseña</label>
                            <input type="text" class="form-control narrower-input" name="contraseña" placeholder="Ingrese la contraseña" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user" class="colored-label">Nombre</label>
                            <input type="text" class="form-control narrower-input" name="nombre" placeholder="Ingrese el nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="apell" class="colored-label">Apellidos</label>
                            <input type="text" class="form-control narrower-input" name="apellidos" placeholder="Ingrese los apellidos" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="call" class="colored-label">Calle</label>
                    <input type="text" class="form-control narrower-input" name="calle" placeholder="Ingrese la calle" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="numExt" class="colored-label">Número Exterior</label>
                            <input type="text" class="form-control narrower-input" name="numExt" placeholder="Ingrese el número exterior" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="numInt" class="colored-label">Número Interior</label>
                            <input type="text" class="form-control narrower-input" name="numInt" placeholder="Ingrese el numero interior, si no hay ponga 0" required>
                        </div>
                    </div>
                </div>

                <div class="row columnas">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="colo" class="colored-label">Colonia</label>
                            <input type="text" class="form-control narrower-input" name="colonia" placeholder="Ingrese la colonia" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="deleg" class="colored-label">Delegación</label>
                            <input type="text" class="form-control narrower-input" name="delegacion" placeholder="Ingrese la delegación" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="codPos" class="colored-label">Código Postal</label>
                            <input type="text" class="form-control narrower-input" name="codigoPostal" placeholder="Ingrese el código postal" required>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Boton enviar -->
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary" value="Añadir" id="enviar">
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