<?php

if($_SERVER["REQUEST_METHOD"]=== "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php'; 

        
        //ERROR HANDLERS
        $errors =[];

        if(is_input_empty($username,$pwd)){  
        $errors["empty_input"] = "Fill in all fields!";
        }

        $results = get_user($pdo, $username);

        if(is_username_wrong($results)){  
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        if(is_username_wrong($results) && is_password_wrong($pwd, $result["pwd"])){  
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        //con el if de abajo, si el array llamado $errors llega a contener datos, el condicional se cumpliria y entrara en el mismo condicional, caso contrario, sino tiene data dentro del array, entonces se retorna como false y no entraria al condicional.
        require_once 'config_session.inc.php'; //mando a llamar este documento para inicializar la Session

        //aqui a diferencia del signup, le quitamos la sesion y no guardamos nada que el usuario escribio en los input, porque en el caso de cuando se quiere logear es mejor que aunque sea tedioso, si el usuario deba reescribir todo de nuevo.
        if($errors){
            $_SESSION["errors_login"] = $errors; 

            header("Location: ../index.php"); //regresamos al usuario al login
            die(); //detenemos la ejecucion del codigo
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId ."_". $results["id"];
        session_id($sessionId);

        $_SESSION['user_id'] = $result["id"];
        $_SESSION['user_username'] = htmlspecialchars($result["username"]); //hago esto en caso de que el nombre del username lo quiera mostrar en alguna parte de la pagina entonces sanetizo lo que sea que el username sea. no lo hago con el ID porque no es algo que yo imprima en pantalla como tal
       
        $_SESSION['last_regeneration'] = time();

        header("Location: ../index.php?login=success");

        $pdo = null; 
        $stmt = null;
        die();
    } 
    catch (PDOException $e) {
        die("Query Failed". $e->getMessage());
    }

}else{
    header("Location: ../index.php");
    die();
}

