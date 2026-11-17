<?php
session_start();


function redirect($archivo, $error = null): void {

    $url = "../" .$archivo. ".php";
    if ($error != null) {
        $url .= "?error=" . $error;
    }
    header("Location: $url");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $passwd = $_POST['passwd'];
    
    include_once "../data.php";

    $user_exists = false;
    $passwd_correct = false;
    $rol = "";

    foreach ($usuarios as $u) {
        if($u["username"] === $name){
            $user_exists = true;
            if($u["password"] === $passwd){
                $passwd_correct = true;
                $rol = $u["rol"];
            }
        }
    }

    if (count($usuarios)>0 && $user_exists){
        if ($passwd_correct){

            $_SESSION["user_logged"] = $name;
            $_SESSION["user_rol"] = $rol;
            redirect("dashboard");

        } else {
            redirect("login", "passwd-incorrect");
        }
    } else {
        redirect("login", "user-inexistent");
    }
} else {
    redirect("index");
}


?>