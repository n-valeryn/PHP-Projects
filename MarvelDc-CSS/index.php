<?php
include_once 'arrays_a_usar.php';
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Primer Ejercicio PHP Web</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <link rel="icon" type="image/x-icon" href="./img/favicon.png">
</head>
<body>

    <?php
    
    function imprimirDatos($pelicula): void{
        echo "<img src=" . $pelicula["imagen"] . ">";
        echo "<div class='datos'>";
        echo "<h2>" . $pelicula["titulo"] . "</h2>";
        echo "<h3>" . $pelicula["universo"] . "</h3>";
        echo "<p>" . $pelicula["anyo"] ."  ⏱ ". $pelicula["duracion"] . "min</p>";
        echo "<p> ★ " . $pelicula["puntuacion"] . "</p>";
        
        if (!$pelicula["disponible"]):
            echo "<p class='no-disp'>**No disponible**</p>";
        endif;
        echo "</div>";
    }

    ?>

    <h2 class="seccion">Todo</h2>
    <section class="peliculas">


        <?php 
        foreach($peliculas as $pelicula):
        ?>
        <div class="item <?php if(!$pelicula['disponible']){ echo 'no-disp2'; } ?>">
            <?php
            imprimirDatos($pelicula)
            ?>
        </div>
        <?php
        endforeach;
        ?>

    </section>

    <?php $filtrouniverso = "Marvel"; ?>
    <h2 class="seccion">Universo <?=$filtrouniverso?></h2>
    <section class="universo">

        <?php
        foreach($peliculas as $pelicula):
            if ($pelicula["universo"]===$filtrouniverso):
            ?>

            <div class="item">
                <?php imprimirDatos($pelicula) ?>
            </div>

            <?php
            endif;
        endforeach;
        ?>

    </section>

    <h2 class="seccion">Mejor puntuadas</h2>
    <section class="best-ranked">

        <?php
        foreach($peliculas as $pelicula):
            if ($pelicula["puntuacion"] >= 8):
        ?>

        <div class="item">
            <?php imprimirDatos($pelicula) ?>
        </div>

        <?php
            endif;
        endforeach;
        ?>

    </section>

    <h2 class="seccion">Watchlist</h2>
    <section class="watch">

        <?php
        foreach($watchlist as $w):
            $id = $w["pelicula_id"];
            foreach($peliculas as $pelicula):
                if($pelicula["id"]===$id):
        ?>

        <div class="item">
            <img src= <?= $pelicula["imagen"] ?> >
            <div class="datos">
            <h2> <?= $pelicula["titulo"] ?> </h2>
            <p> <?= $pelicula["anyo"] ?> </p>

            <?php if($w["vista"]): ?>
                <p class="vista">VISTA</p>
            <?php else: ?>
                <p class="vista">NO VISTA</p>
            <?php endif;?>
            </div>
        </div>

        <?php
                endif;
            endforeach;
        endforeach;
        ?>

    </section>

    <h2 class="seccion">Añadir al catálogo</h2>
    <section class="anyadir-peli">
        <form action="">

        <div class="campo">
            <label for="titulo">Título: </label>
            <input type="text" placeholder="Shrek"><br><br>
        </div>
        
        <div class="campo">
            <label for="universo">Universo: </label>
            <select name="universo" id="universo">
                <option value="Marvel">Marvel</option>
                <option value="DC">DC</option>
            </select><br><br>
        </div>
        
        <div class="campo">
            <label for="director">Director: </label>
            <input type="text"><br><br>
        </div>

        <div class="campo">
            <label for="anyo">Año: </label>
            <input type="number" min="1888"><br><br>
        </div>
        
        <div class="campo">
            <label for="duracion">Duración: </label>
            <input type="number" min="0"><br><br>
        </div>
        
        <div class="campo">
            <label for="puntuacion">Puntuación: </label>
            <input type="number" min="0" max="10" placeholder="0-10"><br><br>
        </div>

        <div class="campo">
            <label for="imagen">Imagen: </label>
            <input type="file"><br><br>
        </div>

        <div class="campo">
            <label for="disponible">Disponible: </label>
            <input type="checkbox" checked><br><br>
        </div>

        <button type="submit">Enviar</button>

        </form>
        
    </section>

</body>
</html>