<!--
Sin sesión:    Inicio | Catalogo | Login
Con sesión:  Inicio | Catalogo | Dashboard | Logout
ADMIN:           Inicio | Catalogo | Dashboard | Añadir item | Logout
-->
<nav>
    <a href="index.php">Inicio</a>
    <a href="catalogo.php">Catalogo</a>
    
    <?php
    if (isset($_SESSION["user_logged"])): ?>

        <a href="dashboard.php">Dashboard</a>

        <?php
        if ($_SESSION["user_rol"]==="ADMIN"): ?>
            <a href="add_item.php">Agregar item</a>

        <?php
        endif; ?>

        <a href="controllers/logout.php">Logout</a>
    
        <a class="nav-user">Usuari@ loguead@: <?=$_SESSION["user_logged"]?></a>
        
    <?php
    else: ?>

        <a href="login.php">Login</a>

    <?php
    endif;?>

    
</nav>
