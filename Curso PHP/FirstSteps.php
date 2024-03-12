<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" class="calcu">
            <input type="number" name="num1" placeholder="Escriba un numero" required="Write a number"><br>
            <select name="operator" id="">
                <option value="sumar">Sumar(+)</option>
                <option value="restar">restar(-)</option>
                <option value="dividir">dividir(/)</option>
                <option value="multiplicar">multiplicar(*)</option>
            </select>
            <br>
            <input type="numberxa" name="num2" placeholder="Escriba un numero" required="Write a number"><br>
            <button>Calcular</button>
        </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //Grab dataa from inputs
        $num1 = filter_input(INPUT_POST,"num1",FILTER_SANITIZE_NUMBER_FLOAT);
        $num2 = filter_input(INPUT_POST,"num2",FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);
    
        //Error handlers
        $errors = false;
        if(empty($num1) || empty($num2) || empty($operator))
        {
            echo "<p class='cal-error'> Fill in all fields!</p>";
            $errors = true;
        }

        if(!is_numeric($num1) || !is_numeric($num2)){
            echo "<p class='cal-error'> Only write numbers!</p>";
            $errors = true;
        }

        //Calculate numbers if no errors
        if(!$errors){
            $value = 0;
            switch($operator){
                case "sumar":
                    $value = $num1 + $num2;
                    break;
                case "restar":
                    $value = $num1 - $num2;
                    break;
                case "dividir":
                    $value = $num1 / $num2;
                    break;
                case "multiplicar":
                    $value = $num1 * $num2;
                    break;
                default:
                    echo "<p class='cal-error'> Something went wrong!</p>";   
            }
            echo "<p class='calc-result'>Result = ".$value. "</p>";
        }
    }
    ?>
    
</body>
</html>