<?php

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'hbwebsite';

$con = mysqli_connect($hname,$uname,$pass,$db);

if(!$con){
    die("No se pudo conectar a la Base de Datos".mysqli_connect_error());
}

//Funcion realizada por seguridad de datos.
function filteration($data){
    foreach($data as $key => $value){
        $data[$key] = trim($value);
        $data[$key] = stripcslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

function select($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql)){
        
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }else{
            mysqli_stmt_close($stmt);
            die("la consulta no pudo ser ejecutada - Select");
        }
    }else{
        die("la consulta no pudo ser ejecutada - Select");
    }
}


function update($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql)){
        
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }else{
            mysqli_stmt_close($stmt);
            die("la consulta no pudo ser ejecutada - Update");
        }
    }else{
        die("la consulta no pudo ser ejecutada - Update");
    }
}

?>