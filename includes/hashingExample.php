<?php

$sensitiveData = "Krossing"; //es lo que el usuario nos da, en este caso yo estoy dando el valor, pero esto seria lo que el usuario nos de en un input o un label.
$salt = bin2hex(random_bytes(16)); //con esto generamos 16 bits random, para luego convertirlos a hexadecimal, con lo cual podremos usar para hacer el hashing o tambien llamado encriptamiento
$pepper = "ASecretPepperString"; //es una keyword que voy a usar para fusionarla con la varibale $salt y poder hacer el hashing

echo "<br>". $salt;

$dataToHash = $sensitiveData.$salt.$pepper;
$hash = hash("sha256",$dataToHash); //uso un metodo propio de PHP

echo "<br>". $hash;

//----------------------PART II
$sensitiveData = "Krossing"; 

$StoredSalt = $salt;
$StoredHash = $hash;
$pepper = "ASecretPepperString";

$dataToHash = $sensitiveData.$salt.$pepper;

$verificationHash = hash("sha256",$dataToHash); 

if($StoredHash === $verificationHash){
    echo "The data are the same";
}else{
    echo "The data are not the same!";
}


