<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];

        if (is_numeric($num1)&&is_numeric($num2)){
            echo "el resultado es:", $num1+$num2;
        }else{
            echo "<p>Introduzca numeros validos</p>";
        }
    }else{
        echo "la pagina no funciona";
    }

?>