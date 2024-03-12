<?php
ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1); //Para permitir que el lugar donde se maneje todas las cookies sea unicamente en el servidor local

session_set_cookie_params([
    'lifetime' => 1800, //tiempo de vida de la sesion
    'domain' => 'localhost',       
    'path' => '/', //esto significa que aplica para cualquier sub-pagina de nuestra pagina
    'secure' => true, 
    'httponly' => true, //solo acepta protocolo http
]);

session_start();

if(isset($_SESSION['user_id'])){
}else{
    if(!isset($_SESSION['last_regeneration'])){
        //El condicional es en caso que sea la primera vez que se ingresa a la sesion
            session_regenerate_id(true);//regenera la sesion, dandole un Id distinto, como que lo mejora en pocas palabras
            $_SESSION['last_regeneration'] = time(); //le da el atributo de tiempo 
        }else {
            $interval = 60*30; //damos un tiempo de 30 minutos
            
            if (time() - $_SESSION['last_regeneration'] >= $interval){
                session_regenerate_id(true); //si la sesion excede los 30min entonces genera un nuevo id, para que asi los hackers, incluso aunque logren entrar a la sesion, luego de ese tiempo ya no les va a funcionar
                $_SESSION['last_regeneration'] = time(); //vuelve a asignar otro id a la sesion 
            }
        }
} 

function regenerate_session_id_loggedin(){
    session_regenerate_id(true);//regenera la sesion, dandole un Id distinto, como que lo mejora en pocas palabras
    $_SESSION['last_regeneration'] = time(); //le da el 
}

