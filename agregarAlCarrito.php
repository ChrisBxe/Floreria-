<?php
    if (!isset($_GET['valorF'])){
        echo "<script>alert('Error en la carga')</script>";
        die();
    }

    session_start();

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
        $_SESSION['precio'] = array();
    }

    $arreglo = [];

    $flores = [];
    $id = $_GET['valorF'];
    
    $cnx = mysqli_connect("localhost","root","usbw","Floreria") or die ("Error en la conexion a MySql");

    $query = "SELECT * FROM `catalogoprincipal` WHERE id = $id";

    $res = mysqli_query($cnx, $query);

    while($registro = mysqli_fetch_row($res)){
        $flores[] = $registro;
    }
    mysqli_free_result($res);

    $arregloAux = "
    Tipo de arreglo:" . $flores[0][1] . "<br>" .
    "Tipo de flor 1:" . $flores[0][2] . " Color: ". $flores[0][3] . "Cantidad: " . $flores[0][4] . "<br>" . 
    "Tipo de flor 2:" . $flores[0][5] . " Color: ". $flores[0][6] . " Cantidad: " . $flores[0][7] . "<br>" .
    "Tipo de flor 3:" . $flores[0][8] . " Color: ". $flores[0][9] . " Cantidad: " . $flores[0][10] . "<br>" .
    "Cantidad Total de Flores: ". $flores[0][11] . " Tamaño" . $flores[0][12] . "<br>";

    $precio = $flores[0][13];

    $_SESSION['carrito'][] = $arregloAux;
    $_SESSION['precio'][] = $precio;

    echo "<script>alert('Producto agregado')</script>";
    echo '<script>window.location.href = "index.php";</script>';

?>
