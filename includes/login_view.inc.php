<?php

declare(strict_types=1);

function output_username(){
    if(isset($_SESSION["user_id"])){
        echo "You are logged in as ". $_SESSION["user_username"];
        echo "And your ID in our DB is ". $_SESSION["user_id"];
    }else {
        echo "You are not logged in";
    }
}


function check_login_errors(){
    if(isset($_SESSION["errors_login"])){
        $errors = $_SESSION["errors_login"];
        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">'.$error.'</p>';
        }

        unset($_SESSION["errors_login"]); //aqui hago unset(limpio) de todos los errores que pueda almacenar la sesion $_SESSION["errors_login"] ya que no debo de acumular los errores durante una sesion
    }
    else if(isset($_GET["login"]) && $_GET["login"] === "success"){
        echo "<br>";
        echo '<p class="form-success">Login Success!</p>';
    }
}