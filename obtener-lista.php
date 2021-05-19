<?php

    require 'conexion.php';

    $sql="SELECT * FROM lista";
    $resultado=mysqli_query($conexion,$sql);
    $json = array();
    while($filas = mysqli_fetch_array($resultado))
    {
        $json[] = array(
            'id' => $filas['id'],
            'sistema' => $filas['sistema'],
            'fecha' => $filas['fecha'],
            'tiempo' => $filas['tiempo']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    mysqli_close($conexion); 
?>