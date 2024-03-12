<?php
//Este es el model-file, quien se encarga de las querys que hagamos desde la pagina web hacia nuestra base de datos


declare(strict_types=1);
/*en PHP es una directiva de declaración que se coloca al principio de un archivo PHP. Su propósito es habilitar o deshabilitar la coerción de tipos estricta para las declaraciones de tipo en las funciones y métodos. Cuando strict_types está habilitado con el valor 1, PHP realiza una comparación de tipos estricta al llamar a funciones y métodos que tienen tipos de parámetros y valores de retorno declarados. Esto significa que los tipos deben coincidir exactamente, incluyendo el tipo y el modo de conversión. */

//funcion que me sirve para tomar el username de la BD, y el string que se le pone a la par de la variable es porque tenemos restriccion de los tipos, asi damos a entender al programa que esa variable es unicamente de tipo string

//con la parte de "object $pdo" lo que hago es decirle a la funcion que tome las propiedades de la variable "$pdo" la cual es una variable que se creo en el documento "dbh.inc.php" y como estamos trabajando con objetos, y claro en el documento php principal, el cual es "signup.inc.php" se instacio el require_once para el documento "dbh.inc.php" ya podemos utilizar sus variables en el documento actual, si se declarece despues, no nos serviria el codigo ni podriamos tomar la variable $pdo por lo mismo.

//Va a consultar a la BD si el usuario existe
function get_username(object $pdo, string $username){
    $query = "SELECT username FROM users WHERE username=:username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username",$username);
    $stmt->execute();
    //en esta caso el Fetch toma un solo resultado de la base de datos, y como parametro le ponemos fetch_assoc para referirnos a los datos dentro de nuestra BD, usando el nombre de la columna de la tabla, en vez de tomar los datos con un array indexado (osea con numeros) y con el fetch_assoc lo hacemos asociativo.
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//Va a consultar a la BD si el email ya existe
function get_email(object $pdo, string $email){
    $query = "SELECT email FROM users WHERE email=:email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//Inserta datos a la base de datos
function set_user(object $pdo, string $username,string $pwd,string $email){
    $query = "INSERT INTO username(username,pwd,email) VALUES (:username,:pwd,:email);";

    $stmt = $pdo->prepare($query);
    //hacemos un hashing o encriptacion de la contraseña para darle mayor seguridad
    $option = [
        'cost' => 12
    ];    
    $hashedPwd = password_hash($pwd,PASSWORD_BCRYPT, $option);
    
    //hacemos las statements 
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":pwd",$hashedPwd);
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
