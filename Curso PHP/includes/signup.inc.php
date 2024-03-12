<?php

if($_SERVER["REQUEST_METHOD"]=== "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    //en el caso de las variables anteriores no es necesario sanetizarlas porque eso es recomendable unicamente cuando guardamos informacion en nuestra BD o la pagina como tal, o cuando imprimimos datos en nuestra pagina.
    
    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //ERROR HANDLERS
        $errors =[];

        if(is_input_empty($username,$pwd,$email)){  
        $errors["empty_input"] = "Fill in all fields!";
        }
        if(is_email_invalid($email)){ 
        $errors["invalid_email"] = "Invalid email used!";
        }
        if(is_username_taken($pdo, $username)){    
        $errors["username_taken"] = "Username already taken!";
        }
        if(get_email($pdo, $email)){    
        $errors["email_used"] = "Email already registered!";
        }
        //con el if de abajo, si el array llamado $errors llega a contener datos, el condicional se cumpliria y entrara en el mismo condicional, caso contrario, sino tiene data dentro del array, entonces se retorna como false y no entraria al condicional.
        require_once 'config_session.inc.php'; //mando a llamar este documento para inicializar la Session

        //Este condicional sirve para guardar en un array las cosas que el usuario digito, ya que en caso el usuario digite digamos el correo mal, pero el username este bien, seria fastidioso para el usuario que tener que volver a digitar todo nuevamente, para eso se hace esta sesion, ya que mantiene en un array los datos que el usuario escribio a excepcion de la contra para que sea mas Amigable para el usuario
        if($errors){
            $_SESSION["errors_signup"] = $errors; //guardamos los errores en una variable tipo sesion
            
            //vamos a utilizar este arrray para que en el caso de que el usuario tenga un error, la informacion que escribio en el input no se pierda y tenga que volverla a escribir nuevamente el usuario.
            $signupData = [
                "username" => $username,
                "email" => $email
            ];

            $_SESSION["signup_data"] = $signupData; //guardamos los errores en una variable tipo sesion

            header("Location: ../index.php"); //regresamos al usuario al login
            die(); //detenemos la ejecucion del codigo
        }

        create_user($pdo, $username, $pwd, $email);
        
        header("Location: ../index.php?signup=success");

        //luego de terminar el registro o los errores, cerramos la conexion con la BD y las statements
        $pdo = null; 
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query Failed". $e->getMessage());
    }
    
}else{
    header("Location: ../index.php");
    die();
}