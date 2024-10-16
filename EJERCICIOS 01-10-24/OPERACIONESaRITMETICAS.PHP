<?php
    $lado= 2;
    $alto= 3;
    echo "perimetro: ". ($lado*2)+($alto*2);
    echo "area: ". $lado*$alto;


    $num1 = 3;
    $num2 = 5;
    echo " el cociente de los dos numeros es ". round($num1/$num2);
    echo "el resto es ". $num1%$num2;


    $num1 = 5;
    $num1 += 1;
    echo $num1;
    $num =+ 1;
    echo $num1;


    $num1 = 5.333333;
    $num1= round($num1,2);
    echo $num1;



    echo $num1**4;


    echo mt_rand(1,50);



    if ("10"==10){
        echo "son igules";
    }else{
        echo "no son iguales";
    }
?>