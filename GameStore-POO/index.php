<?php require_once "./clases/Videojuego.php";

$games = [
    new Videojuego(1, "The Legend of Zelda: <br>Ocarina of Time", "Aventura", 59.99, 9.5, "./img/zelda.jpg", 0),
    new Videojuego(2, "Cuphead", "Plataformas", 19.99, 8.5, "./img/cuphead.jpg", 99),
    new Videojuego(3, "Minecraft", "Sandbox", 29.99, 9, "./img/minecraft.jpg", 24),
    new Videojuego(4, "Call Of Duty", "Shooter", 79.99, 8, "./img/cod.jpg", 67),
    new Videojuego(5, "Animal Crossing", "Simulación", 59.99, 8.5, "./img/animalcrossing.jpg", 0),
    new Videojuego(6, "Five Nights At Freddy's", "Terror", 7.99, 8, "./img/fnaf.jpg", 666),
    new Videojuego(7, "Hollow Knight", "Metroidvania", 14.99, 9, "./img/hollowknight.jpg", 0),
    new Videojuego(8, "Mario Kart 8 Deluxe", "Carreras", 59.99, 9, "./img/mariokart.jpg", 8),
    new Videojuego(9, "Pac-Man World Re-Pac", "Plataformas", 29.99, 7.5, "./img/pacman.jpg", 19),
    new Videojuego(10, "Life Is Strange", "Aventura gráfica", 19.99, 8.5, "./img/lifeisstrange.jpg", 33),
    new Videojuego(11, "Mortal Kombat 11", "Lucha", 49.99, 8, "./img/mortalkombat.jpg", 40),
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO-ejercicio</title>
    <link rel="stylesheet" href="./style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php include_once "./partials/header.php" ?>
    <?php include_once "./partials/nav.php" ?>


    <h2 class="categoria">Todos los juegos</h2>
    <section class="all-games">
    <hr class="top-separador-games">
    <?php
        foreach ($games as $game):
            $game->pintartarjeta();
        endforeach;
        ?>
    </section>
    
    

    <h2 class="categoria" id="recomendados">Juegos recomendados</h2>
    <section class="recomendados">
    <hr class="top-separador-games">
    <?php
        foreach ($games as $game):
            if ($game->filter("recomendado")):
                $game->pintarTarjeta();
            endif;
        endforeach;
    ?>
    </section>
    
    

    <h2 class="categoria" id="ofertas">Juegos en oferta</h2>
    <section class="ofertas">
    <hr class="top-separador-games">
    <?php
        foreach ($games as $game):
            if ($game->filter("oferta")):
                $tieneDscto = True;

                $precioConDscto = $game->aplicarDescuento(20);

                $game->setPrecio($precioConDscto);

                $game->pintarTarjeta($tieneDscto);
            
            endif;
        endforeach;
    ?>
    </section>
    
    <hr>

    <?php include_once "./partials/footer.php" ?>

</body>
</html>