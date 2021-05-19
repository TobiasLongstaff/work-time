<?php
    date_default_timezone_set('America/Buenos_Aires');
    $fechaActual = date('Y-m-d');      
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="ico" href="assets/img/tiempo-rapido.ico">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/styles/styles.css">

    <!-- ICONOS -->
    <script src="https://kit.fontawesome.com/1b601aa92b.js" crossorigin="anonymous"></script>

    <!--FUENTES-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">

    <title>WorkTime</title>
</head>
<body>        
    <nav>
        <span class="nav-titulo">WorkTime</span>
    </nav>
    <main>
        <div class="container-tabla">
            <table class="table-dias">
                <thead class="tbl-header">
                    <td class="td-primer-fila">id</td>
                    <td>Sistema</td>
                    <td>Fecha</td>
                    <td>Tiempo</td>                
                </thead>
                <tbody id="lista" class="tbl-content">
                </tbody>
            </table>            
        </div>
        <div class="container">
            <div class="contador">
                <span id="hora" class="text-contador">00</span>
                <span class="text-contador">:</span>
                <span id="minutos" class="text-contador">00</span>
                <span class="text-contador">:</span>
                <span id="segundos" class="text-contador">0</span><br>
                <button type="button" id="btn-start" class="btn-contador">Start</button>
            </div><br>
            <form class="container-form" id="form-guardar" method="POST">
                <input type="hidden" id="tiempo" class="textbox-fecha" required>
                <input type="text" id="sistema" class="textbox-fecha" placeholder="Sistema" required> 
                <input type="date" id="fecha" class="textbox-fecha" value="<?=$fechaActual?>" required>    
                <input type="submit" class="btn-form" value="Guardar">
            </form>            
        </div>
    </main>
</body>
    <script src="assets/plugins/jquery-3.5.1.min.js"></script>
    <script src="assets/scripts/app.js"></script>
</html>