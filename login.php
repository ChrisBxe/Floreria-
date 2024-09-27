<?php
    global $auxSes;
    $auxSes = 0;
    ini_set("dispaly_erros",E_ALL);
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $auxUser = $_POST['user'];
        $auxPass = $_POST['password'];
        // Valida que se ingresen datos
        try {
            $valorUser = $_POST['user'];
            // Realizar la validacion
            if (empty($valorUser)) {
                throw new Exception("Ingrese el usuario");
            }
        } catch (Exception $e) {
            // Mensaje del error
            echo "<br><br><h5 style='text-align: center;'>" ."Error: ". $e->getMessage() . "<h5>";
        }
        try {
            $valorPass = $_POST['password'];
            // Realizar la validacion
            if (empty($valorPass)) {
                throw new Exception("Ingrese la contraseña");
            }
        } catch (Exception $e) {
            // Mensaje del error
            echo "<br><br><h5 style='text-align: center;'>" ."Error: " . $e->getMessage() . "</h5>";
        }
        // Conexion a la base de datos;
        $usuario = [];
        $cnx = mysqli_connect("localhost","root","usbw","Floreria") or die ("Error en la conexion a MySql");
        $query = "SELECT * FROM `usuarios` LIMIT 0, 30 ";
        $res = mysqli_query($cnx, $query);

        while($registro = mysqli_fetch_row($res)){
            $usuario[] = $registro;
        }
        
        // Valida que las credenciales ingresadas concuerden con alguno de los usuarios en la base de datos
        if((isset($_POST['user']) && !empty($_POST['user'])) && (isset($_POST['password']) && !empty($_POST['password']))){
            for($i=0;$i<count($usuario);$i++){
                if($_POST['user'] === $usuario[$i][2] && $_POST['password'] === $usuario[$i][3]){
                    $id = $usuario[$i][0];
                    $rol = $usuario[$i][1];
                    $auxSes = 1;
                    if($rol == "Administrador"){
                        echo "<script>alert('Entro como administrador')</script>";
                        echo '<script>window.location.href = "adminView.php";</script>';

                    } else {
                        echo "<script>alert('Entro como usuario')</script>";
                        echo '<script>window.location.href = "index.php";</script>';
                    }
                    break;
                }else{
                    $auxSes = 0;

                }
            }
            if($auxSes == 0){
                echo "<script>alert('Usuario y/o contraseña incorrectos');</script>";
            }
        }
        if($auxSes == 1){
            //session_start();
            //Cookie para usuario
            if (isset($_COOKIE["cookie_usuario"])) {
                $_SESSION["usuario"] = $_COOKIE["cookie_usuario"];
            }
            if (isset($_POST["user"])){
                $_SESSION["usuario"] = $_POST["user"];
                setcookie("cookie_usuario", $_POST["user"], time() + (86400 * 30),"/");
            }
            //Cookie para la contrase­ña
            if (isset($_COOKIE["cookie_contraseña"])) {
                $_SESSION["contraseña"] = $_COOKIE["cookie_contraseña"];
            }
            if (isset($_POST["password"])){
                $_SESSION["contraseña"] = $_POST["password"];
                setcookie("cookie_contraseña", $_POST["password"], time() + (86400 * 30),"/");
            }
        }
        //Finaliza la sesion y elimina la cookie
        if (isset($_POST["auxiliar"]) && $_POST["auxiliar"] == "CERRAR"){
            setcookie("cookie_usuario", '', time() - (86400 * 30), "/");
            setcookie("cookie_contraseña", '', time() - (86400 * 30), "/");
            session_destroy();
            header("Location: login.php");
        }
        mysqli_free_result($res);
        mysqli_close($cnx);
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
            <div class="text-center">
                <img src="img/avataricon.png" alt="avataricon" id="avataricon" width="150px">
            </div>
            <div class="form-group">
                <label for="user">Usuario:</label>
                <input type="text" class="form-control narrower-input" placeholder="Ingrese su email o usuario" required id="user" name="user" value="<?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control narrower-input" placeholder="Ingrese su contraseña" required id="password" name="password" value="<?php echo isset($_SESSION['contraseña']) ? $_SESSION['contraseña'] : '' ?>">
            </div>
                <input type="hidden" name="auxiliar" id="auxiliar"> 
                <button type="submit" class="btn second-btn" id="btn-register">Iniciar sesión</button>
                <button class="btn second-btn" value="Cerrar" onclick="cerrar()">Cerrar Sesion</button>
                <br><br>
                <a href="register.php" class="custom-link"><b>Registrarse</b></a>
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