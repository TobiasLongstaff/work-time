<?php
    require 'conexion.php';

    if(isset($_POST['fecha']) && isset($_POST['tiempo']) && isset($_POST['sistema']))
    {
        $fecha = $_POST['fecha'];
        $tiempo = $_POST['tiempo'];
        $sistema = $_POST['sistema'];

        $sql = "INSERT INTO lista (fecha, tiempo, sistema) VALUES ('$fecha', '$tiempo', '$sistema')";
        $resultado = mysqli_query($conexion, $sql);
        if(!$resultado)
        {
            echo 'error';
        }
    }
?>