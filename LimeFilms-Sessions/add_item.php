<?php
session_start();
include_once "./data.php";
include_once "./config.php";

if (isset($_SESSION["user_logged"])){
    if ($_SESSION["user_rol"] != "ADMIN"){

        header("Location: ./dashboard.php");
        exit();
    }
} else {
    header("Location: ./login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar item</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="./img/favicon.png">
</head>
<body>
<!--
### add_item.php - Solo ADMIN

Comprueba al inicio si hay sesión activa y si el rol es ADMIN
Si no hay sesión redirige a login.php
Si hay sesión pero no es ADMIN redirige a dashboard.php
Contiene un formulario con todos los campos del item
Al enviar el formulario (por POST al mismo archivo), muestra los datos recibidos en pantalla con el mismo estilo de tarjeta del catálogo.
-->
<?php
include_once "./partials/header.php";
include_once "./partials/nav.php";
?>

<form action="" class="form-add" method="post">

        <label for="titulo">Título: </label>
        <input type="text" name="titulo" id="titulo"><br>
        
        <label for="genero">Género: </label>
        <select name="genero" id="genero">
            <option value="Acción">Acción</option>
            <option value="Comedia">Comedia</option>
            <option value="Drama">Drama</option>
            <option value="Romance">Romance</option>
            <option value="Terror">Terror</option>
        </select><br>

        <label for="anyo">Año: </label>
        <input type="number" name="anyo" id="anyo" min="1888" max="2026"><br>

        <label for="imagen">Imagen: </label>
        <input type="file" name="imagen" id="imagen"><br>
        
        <label for="destacado">Destacado: </label>
        <input type="checkbox" name="destacado" id="destacado"><br>

        <button class="form-b">Enviar</button>

    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $item = ["id" => count($peliculas)+1, "titulo" => $_POST['titulo'] , "genero" => $_POST['genero'], "anyo" => $_POST['anyo'],
        "imagen" => RUTA_IMG.$_POST['imagen'], "destacado" => isset($_POST['destacado'])];

        ?><section><?php
        pintarTarjeta($item);
        ?></section><?php
    }
    ?>


</body>
</html>