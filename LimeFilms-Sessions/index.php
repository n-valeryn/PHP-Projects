<?php
session_start(); 
include_once "./config.php";
include_once "./data.php"; 
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title><?= APP_NAME ?></title>
    <link rel="icon" type="image/png" href="./img/favicon.png">
</head>
<body>
    
    
    <?php include_once "./partials/header.php"; ?>
    <?php include_once "./partials/nav.php"; ?>

    <h1><?= APP_NAME ?></h1>
    <p>Página web de películas</p>


    <h2>Películas destacadas</h2>
    <section class="pelis-destacadas">
        <?php
        foreach ($peliculas as $pelicula):
            if ($pelicula["destacado"]):
        
                pintarTarjeta($pelicula); 

            endif;
        endforeach;
        ?>
    </section>

    <br>
    <hr>
    <?php include_once "./partials/footer.php"; ?>

    
</body>
</html>