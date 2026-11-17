<?php
session_start();

if (isset($_SESSION["user_logged"])) {
    header("Location: ./dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="icon" type="image/png" href="./img/favicon.png">
</head>
<body>

<!--
### login.php - Login

Formulario que envía los datos a controllers/middleware.php por POST
Tiene dos campos: username y password
Si existe $_GET["error"] muestra un mensaje de error visible
-->

    <section class="login">
    <form  class="form-login" method="post" action="controllers/middleware.php">

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["error"])){
            if ($_GET["error"] === "user-inexistent"){
                echo "<p class='error'> Usuario inexistente </p>";
            }
            else if ($_GET["error"] === "passwd-incorrect") {
                echo "<p class='error'> Contraseña incorrecta </p>";
            }
            else {
                echo "<p class='error'> Acceso denegado </p>";
            }
        }
        ?>

        <h3>Inicia sesión</h3>

        <div class="form-div">
            <label for="name">Usuario: </label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class=form-div>
            <label for="passwd">Contraseña: </label>
            <input type="password" name="passwd" id="passwd" required>
        </div>

        <div class=form-div>
            <button type="submit" class="form-b">Enviar</button>
        </div>
    </form>
    </section>

</body>
</html>