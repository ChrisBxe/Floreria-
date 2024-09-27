<?php 
    if (!isset($_GET['valorF'])){
        echo "<script>alert('Error en la carga')</script>";
        die();
    }
    $flor = [];
    $id = $_GET['valorF'];
    
    $cnx = mysqli_connect("localhost","root","usbw","Floreria") or die ("Error en la conexion a MySql");

    $query = "SELECT * FROM `catalogoprincipal` WHERE id = $id";

    $res = mysqli_query($cnx, $query);

    while($registro = mysqli_fetch_row($res)){
        $flor[] = $registro;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $aux = $_POST['auxiliar'];
        $tipoArreglo = $_POST['tipoArreglo'];
        $tipoFlor1 = $_POST['tipoFlor1'];
        $color1 = $_POST['color1'];
        $cantidad1 = $_POST['color1'];
        $tipoFlor2 = $_POST['tipoFlor2'];
        $color2 = $_POST['color2'];
        $cantidad2 = $_POST['cantidad2'];
        $tipoFlor3 = $_POST['tipoFlor3'];
        $color3 = $_POST['color3'];
        $cantidad3 = $_POST['cantidad3'];
        $cantidadTotal = $_POST['cantidadTotal'];
        $tamaño = $_POST['tamaño'];
        $precio = $_POST['precio'];
        if(isset($_POST["auxiliar"]) && $_POST["auxiliar"] == "EDITAR"){
            $query = "UPDATE `catalogoprincipal` SET `id`=$id,`tipo_arreglo`=$tipoArreglo,`tipo_flor_1`=$tipoFlor1,`color_flor_1`=$color1,`cantidad_1`=$cantidad1,`tipo_flor_2`=$tipoFlor2,`color_flor_2`=$color2,`cantidad_2`=$cantidad2,`tipo_flor_3`=$tipoFlor3,`color_flor_3`=$color3,`cantidad_3`=$cantidad3,`cantidad_flores`=$cantidadTotal,`tamaño`=$tamaño,`precio`=$precio WHERE $aux = EDITAR";
        }
    }
    mysqli_free_result($res);
    mysqli_close($cnx);
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
                            <a href="login.php">Iniciar sesión</a>
                        </li>
                    </ul>

                </div>
                <!-- /navbar-collapse -->
            </div>
            <!-- /container -->
        </nav>
        <!-- /Barra de Navigación -->



        <!-- Formulario de consulta -->
        <form method="POST" class="consult-form">
            <div>
                <div class="text-center">
                    <img src="img/admin.png" alt="admin">
                </div>
                <br>
            </div>

            <!-- Contenedor de las filas -->
            <div class="columna-contenedor">

                <div class="form-group">
                    <input class="narrower-input" value="<?php echo $flor[0][1]?>" readonly>
                </div>

                <div class="row columnas">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="narrower-input" value="<?php echo $flor[0][2]?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="narrower-input" value="<?php echo $flor[0][3]?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="narrower-input" value="<?php echo $flor[0][4]?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row columnas">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="narrower-input" value="<?php echo $flor[0][5]?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="narrower-input" value="<?php echo $flor[0][6]?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="narrower-input" value="<?php echo $flor[0][7]?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row columnas">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="narrower-input" value="<?php echo $flor[0][8]?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="narrower-input" value="<?php echo $flor[0][9]?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="narrower-input" value="<?php echo $flor[0][10]?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="narrower-input" value="<?php echo $flor[0][11]?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="narrower-input" value="<?php echo $flor[0][12]?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input class="narrower-input" value="<?php echo $flor[0][13]?>" readonly>
                </div>

            </div>
        </form>

        <!-- /Formulario de consulta -->

        <!-- Formulario de cambios -->
        <form method="POST" class="change-form">
            <div>
                <div class="text-center">
                    <img src="img/admin.png" alt="admin">
                </div>
                <br>
            </div>

            <!-- Contenedor de las filas -->
            <div class="columna-contenedor">
                <div class="form-group">
                    <label for="tipoArreglo" class="colored-label">Tipo de Arreglo</label>
                    <input type="text" class="form-control narrower-input" name="tipoArreglo" required>
                </div>

                <div class="form-group">
                    <label for="tipoFlor1" class="colored-label">Tipo de Flor 1</label>
                    <input type="text" class="form-control narrower-input" name="tipoFlor1" required>
                </div>

                <div class="form-group">
                    <label for="color1" class="colored-label">Color 1</label>
                    <input type="text" class="form-control narrower-input" name="color1" required>
                </div>

                <div class="form-group">
                    <label for="cantidad1" class="colored-label">Cantidad 1</label>
                    <input type="text" class="form-control narrower-input" name="cantidad1" required>
                </div>

                <div class="form-group">
                    <label for="tipoFlor2" class="colored-label">Tipo de Flor 2</label>
                    <input type="text" class="form-control narrower-input" name="tipoFlor2" required>
                </div>

                <div class="form-group">
                    <label for="color2" class="colored-label">Color 2</label>
                    <input type="text" class="form-control narrower-input" name="color2" required>
                </div>

                <div class="form-group">
                    <label for="cantidad2" class="colored-label">Cantidad 2</label>
                    <input type="text" class="form-control narrower-input" name="cantidad2" required>
                </div>

                <div class="form-group">
                    <label for="tipoFlor3" class="colored-label">Tipo de Flor 3</label>
                    <input type="text" class="form-control narrower-input" name="tipoFlor3" required>
                </div>

                <div class="form-group">
                    <label for="color3" class="colored-label">Color 3</label>
                    <input type="text" class="form-control narrower-input" name="color3" required>
                </div>

                <div class="form-group">
                    <label for="cantidad3" class="colored-label">Cantidad 3</label>
                    <input type="text" class="form-control narrower-input" name="cantidad3" required>
                </div>

                <div class="form-group">
                    <label for="cantidadTotal" class="colored-label">Cantidad Total</label>
                    <input type="text" class="form-control narrower-input" name="cantidadTotal" required>
                </div>

                <div class="form-group">
                    <label for="tamaño" class="colored-label">Tamaño</label>
                    <input type="text" class="form-control narrower-input" name="tamaño" required>
                </div>

                <div class="form-group">
                    <label for="precio" class="colored-label">Precio</label>
                    <input type="text" class="form-control narrower-input" name="precio" required>
                </div>
            </div>

            <!-- Boton enviar -->
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary" value="Añadir" id="enviar">
            </div>
        </form>
        <!-- /Formulario de cambios -->

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