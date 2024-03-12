<?php

declare(strict_types = 1);

//el simbolo que tengo en el argumento es para combinar diferentes tipos de datos, porque ahorita estoy regresando una variable llamada "result" la cual puede que me de tanto un array en el caso de que si encuentre el usuario o un booleano en el caso de que el usuario no exista, y para que no exista ningun error en el argumento eso el simbolo "|" para decir que si es esto o aquello que lo utilice 
function is_input_empty(string $username,string $pwd){
    if(empty($username) || empty($pwd)){
        return true;
    }else{
        return false;
    }
}

function is_username_wrong(bool|array $result){
    if(!$result){
        return true;
    }
    else {
        return false;
    }
}

function is_password_wrong(string $pwd, string $hashedPwd){
    if(!password_verify($pwd, $hashedPwd)){
        return true;
    }
    else {
        return false;
    }
}