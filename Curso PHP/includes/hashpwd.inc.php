<?php 

$pwdSignup = "Krossing";

$option = [
    'cost' => 12
];

$hashedPwd = password_hash($pwdSignup,PASSWORD_BCRYPT, $option);

$pwdLogin = "Krossing1";

if(password_verify($pwdLogin, $hashedPwd)){
    echo "They are the same";
}else{
    echo "They are not the same";    
}
