<?php
//Este es el view-file el cual se encarga de mostrar la informacion desde la base de datos hacia nuestra pagina web, y que la informacion mostrada no sea maliciosa o sea perjudicial para nuestro codigo

declare(strict_types=1);

function signup_input(){
        //Aqui hacemos una condicion en la cual verificamos que el usuario haya escrito algo en el input del username y que al mismo tiempo no contenga el error de que el usuario ya existe
        if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])){
            echo '<input type="text" name="username" placeholder="Username" value ="'.$_SESSION["signup_data"]["username"].'">';
        }else{
            echo '<input type="text" name="username" placeholder="Username">';
            //esto lo escribimos asi como viene en caso de que de un error diferente de los que ya configuramos
        }
        echo '<input type="password" name="pwd" placeholder="Password">'; //esto es para poner la contra asi como viene, ya que no es correcto reescribir la contra por temas de seguridad

        //Realizamos lo mismo que hicimos con el usuario pero ahora con el correo
        if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) && !isset($_SESSION["errors_signup"]["invalid_email"])){
            echo '<input type="text" name="email" placeholder="E-mail" value ="'.$_SESSION["signup_data"]["email"].'">';
        }else{
            echo '<input type="text" name="email" placeholder="E-mail">';
        }
}



//Almacena los posibles errores para luego mostrarlos en pantalla 
function check_signup_errors(){
    if(isset($_SESSION["errors_signup"])){
        $errors = $_SESSION["errors_signup"]; //creo una variable $erro

        echo "<br>";
        foreach($errors as $error){
            echo '<p class="form-error">'.$error.'</p>';
        }
        unset($_SESSION["errors_signup"]);
    }else if(isset($_GET["signup"]) && $_GET["signup"] === "success"){
        echo "<br>";
        echo '<p class="form-success">Signup Success!</p>';
    }
}        


