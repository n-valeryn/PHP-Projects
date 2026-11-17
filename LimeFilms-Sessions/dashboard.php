<?php
session_start();
if (!isset($_SESSION["user_logged"])) {
    header("Location: login.php");
    exit();
}
include_once "./config.php";
include_once "./data.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="./img/favicon.png">
</head>
<body><!--
### dashboard.php - Privado

Comprueba al inicio si hay sesión activa, si no redirige a login.php
Muestra un mensaje de bienvenida con el username y el role del usuario
Muestra el número total de items del catálogo
Si el usuario es ADMIN, muestra además un enlace a add_item.php-->

    <?php include_once "./partials/header.php"; ?>
    <?php include_once "./partials/nav.php"; ?>

    <main class="header-dash">
        <h3>
            ¡Bienvenid@, <?= $_SESSION["user_logged"] ?>! Eres <?= $_SESSION["user_rol"] ?> 🍋
        </h3>

        <p>Total de items en el catálogo: <?=count($peliculas)?> </p>
        
    </main>

    <main class="header-dash">
        <?php
        if ($_SESSION["user_rol"]==="ADMIN"):
            echo "<a href='add_item.php' class='add-b'>Agregar item</a>";
        endif;
        ?>

        <form action="controllers/logout.php" method="post">
            <button type="submit" class="form-b">LOGOUT</button>
        </form>
    </main>

    <br>
    <hr>
    <?php include_once "./partials/footer.php"; ?>

</body>
</html>