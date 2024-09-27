<?php 
    ini_set("dispaly_erros",E_ALL);
    $usuario = [];
    $flores = [];

    $cnx = mysqli_connect("localhost","root","usbw","Floreria") or die ("Error en la conexion a MySql");

    $queryflor = "SELECT * FROM `catalogoprincipal` WHERE `tipo_arreglo` = 'Arreglo funerario' ";
    $resFlor = mysqli_query($cnx, $queryflor);

    while($registroFlor = mysqli_fetch_row($resFlor)){
        $flores[] = $registroFlor;
    }
    mysqli_free_result($resFlor);
    mysqli_close($cnx);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php for($i = 0;$i<count($flores);$i++) : ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img//funebre/funebre<?php echo $i;?>.jpeg" alt="..." />
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
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
