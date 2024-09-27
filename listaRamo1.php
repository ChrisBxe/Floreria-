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

<html>
    <head>
        <meta charset="utf-8" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/stylesT.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Section-->
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php for($i = 0;$i<count($flores);$i++) : ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/ramo/ramo<?php echo $i;?>.jpeg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $flores[$i][1] . " " . $i ?></h5>
                                    <!-- Product price-->
                                    $ <?php echo $flores[$i][13] ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="agregarAlCarrito.php?valorF=<?php echo urlencode($flores[$i][0]); ?>">Agregar al carrito</a></div>
                            </div>
                        </div>
                    </div>
                <?php endfor ?>
                </div>
            </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scriptsT.js"></script>
    </body>
</html>
