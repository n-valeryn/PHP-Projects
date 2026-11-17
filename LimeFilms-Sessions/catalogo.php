<?php
session_start();
include_once "config.php";
include_once "data.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Catalogo</title>
    <link rel="icon" type="image/png" href="./img/favicon.png">
</head>
<body>
    <?php include_once "partials/header.php"; ?>
    <?php include_once "partials/nav.php"; ?>
    
<h2>Todas las películas</h2>
<section class="pelis-total">
    <?php foreach ($peliculas as $pelicula):
        
        pintarTarjeta($pelicula);
        
    
    endforeach;
    ?>
</section>


<?php $categoria = "Comedia"; ?>
<h2>Películas de <?=$categoria?> </h2>
<section class="pelis-filtro">
    <?php foreach ($peliculas as $pelicula):
        if ($pelicula["genero"]===$categoria):
    
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