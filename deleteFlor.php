<?php
    if (!isset($_GET['valorF'])){
        echo "<script>alert('Error en la carga')</script>";
        die();
    }
    $flor = [];
    $id = $_GET['valorF'];
    
    $cnx = mysqli_connect("localhost","root","usbw","Floreria") or die ("Error en la conexion a MySql");

    $query = "DELETE FROM `catalogoprincipal` WHERE id = $id";

    $res = mysqli_query($cnx, $query);

    echo "<script>alert('Elemento eliminado')</script>";
    echo '<script>window.location.href = "adminView.php";</script>';

    mysqli_free_result($res);
    mysqli_close($cnx);    
?>
<form>
    <button><a href="index.php">Regresar</a></button><br>
</form>