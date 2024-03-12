<?php
//Este es el control-file de este nos encargamos de manejar, restringir, filtrar la informacion que nos entra de parte del usuario, pero todo manejado desde la pagina web.

declare(strict_types=1);

//funcion para verificar que no hayan inputs vacios
function is_input_empty(string $username,string $pwd,string $email){
    if(empty($username) || empty($pwd) || empty($email)){
        return true;
    }else{
        return false;
    }
}
//funcion que verifica que el email ingresado sea valido
function is_email_invalid(string $email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
//funcion que verifica si el usuario digitado no esta repetido desde la base de datos
function is_username_taken(object $pdo, string $username){
    
    if(get_username($pdo, $username)){
        return true;
    }else{
        return false;
    }
}
//funcion que verifica si el email digitado no esta repetido desde la base de datos
function is_email_register(object $pdo, string $email){
    if(get_email($pdo, $email)){
        return true;
    }else{
        return false;
    }
}

function create_user(object $pdo, string $username,string $pwd,string $email){
    set_user($pdo,$username,$pwd,$email);
}


