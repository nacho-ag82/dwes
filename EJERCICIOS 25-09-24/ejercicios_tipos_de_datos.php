<h1>EJERCICIOS TIPOS DE DATOS</h1>

Ejercicio 1
<p>
<?php

/*Ejercicio: Crea un script en PHP que declare 
y muestre diferentes tipos de datos: enteros, 
flotantes, cadenas y booleanos. */

$entero = 1;
$flotante = 1.1;
$cadena = "hola";
$booleano= true;

echo "esto es un entero \$entero = ",$entero,", esto es un float \$flotante = ",$flotante,", esto es una cadena \$cadena = ",$cadena,", esto es un booleano \$booleano = ",$booleano
?>
</p>

Ejercicio 2
<p>
    <?php
        /*Ejercicio: Declara una cadena y realiza operaciones básicas como obtener 
        su longitud, convertirla a mayúsculas y concatenarla con otra cadena. */

        $cadena = "Hola mundo";
        $longitud = $cadena.ob_get_length();

        echo "esta es la cadena '$cadena' y esta es tu longitud = $longitud";
    ?>
</p>

Ejercicio 3
<p>
    <?php
        /*Ejercicio: Crea una cadena en la que incluyas comillas simples y dobles.*/ 

        echo "esto es una cadena que inclulle comillas simples '' y comillas dobles \"\"";

    ?>
</p>

Ejercicio 4
<p>
    <?php
        /*Ejercicio: Escribe dos cadenas, una con comillas simples y 
        otra con comillas dobles, que incluyan una variable. Observa la diferencia.*/ 

        echo "esto es una cadena entre comillas dobles y la variable $cadena";
        echo PHP_EOL;
        echo 'esto es una cadena entre comillas simples y la variable $cadena';

    ?>
</p>


Ejercicio 5
<p>
    <?php
        /*Ejercicio: Crea una cadena que incluya código HTML y CSS, utilizando comillas correctamente.*/ 

        echo "<p  style='background-color:blue; color:white'>esta linea contiene html css y php</p>";

    ?>
</p>

Ejercicio 6
<p>
    <?php
        /*Ejercicio: Usa caracteres especiales como saltos de línea, tabulaciones o barras invertidas dentro de una cadena.*/ 

        echo "esto es una cadena con solo una instruccion echo \\ ". PHP_EOL ."\$ \"";
        //NO COONSIGO QUE FUNCIONE EL PHP_EOL(LO HEMOS VISTO EN CLASE)
    ?>
</p>


Ejercicio 7
<p>
    <?php
        /*Ejercicio: Concatenar dos cadenas y mostrar el resultado.*/ 
        $cadena1 = "Esto es ";

        $cadena2 = "una concatenacion de cadenas";
        $cadena1 .= $cadena2;
        echo $cadena1;

    ?>
</p>

Ejercicio 8
<p>
    <?php
        /*Ejercicio: Modifica el script anterior para que el texto 
        concatenado se muestre en líneas separadas.*/ 

        $cadena1 = "Esto es ";

        $cadena2 = "una concatenacion de cadenas";
        echo $cadena1. PHP_EOL . $cadena2;
        //NO COONSIGO QUE FUNCIONE EL PHP_EOL(LO HEMOS VISTO EN CLASE)

    ?>
</p>


Ejercicio 9
<p>
    <?php
        /*Ejercicio: Declara una variable y asígnale un valor. Luego, imprímela en pantalla.*/ 
        $nombre = "manolete";
        echo $nombre;
    ?>
</p>

Ejercicio 10
<p>
    <?php
        /*Ejercicio: Usa varias variables en un cálculo simple y muestra el resultado.*/ 
        $num1 = 2;
        $num2 = 3;
        $num3 = 5;
        $num4 = $num1+$num2+$num3;
        echo "el resultado de la suma de las tres variables es $num4";
    ?>
</p>

Ejercicio 11
<p>
    <?php
        /*Ejercicio: Concatenar una variable y una cadena en una sola línea de texto.*/
        $nombre = "manolete";
        echo $nombre . " hola manolete";
    ?>
</p>


Ejercicio 12
<p>
    <?php
        /*Ejercicio: Incluye una variable dentro de una cadena usando comillas dobles.*/
        $nombre = "manolete";
        echo " hola $nombre";
    ?>
</p>


Ejercicio 13
<p>
    <?php
        /*Ejercicio: Declara variables de diferentes tipos (entero, flotante, booleano) 
        y muéstralas.*/
        $entero = 1;
        $flotante = 1.1;
        $booleano= true;
        echo "esto es un entero \$entero = ",$entero,", esto es un float \$flotante = ",$flotante,", esto es un booleano \$booleano = ",$booleano

    ?>
</p>


Ejercicio 14
<p>
    <?php
        /*Ejercicio: Realiza operaciones aritméticas básicas (suma, resta, multiplicación, división).*/
        $num1 = 2;
        $num2 = 5;

        echo "<p>$num1 + $num2=". $num1+$num2 . "</p>";
        echo "<p>$num1 - $num2=". $num1-$num2 . "</p>";
        echo "<p>$num1 x $num2=". $num1*$num2 . "</p>";
        echo "<p>$num1 / $num2=". $num1/$num2 . "</p>";
    ?>
</p>


Ejercicio 15
<p>
    <?php
        /*Ejercicio: Declara variables con nombres significativos y utiliza buenas prácticas para nombrarlas.*/
        $nombre = "manolete";
        $apellido = "garcia";
        $edad = 57;
        echo " hola mi nombre es $nombre, mi apellidos es $apellido y mi edad es $edad";
    ?>
</p>

Ejercicio 16
<p>
    <?php
        /*Ejercicio: Une variables y texto dentro de un echo.*/
        $nombre = "manolete";
        $apellido = "garcia";
        $edad = 57;
        echo " hola mi nombre es $nombre, mi apellidos es $apellido y mi edad es $edad";

        //es valido el ejercicio anterior, este es una copia del ejercicio 15
    ?>
</p>


Ejercicio 17
<p>
    <?php
        /*Ejercicio: Declara una variable booleana y usa un if para mostrar un mensaje dependiendo de su valor.*/
        $var1 = true;
        
        if ($var1){
            echo "la variable es verdadera";
        }else{
            echo "la variable es falsa";
        }
    ?>
</p>


Ejercicio 18
<p>
    <?php
        /*Ejercicio: Declara una variable entera y úsala en una operación.*/
        $var1 = 10;
        
        echo 2+$var1
    ?>
</p>


Ejercicio 19
<p>
    <?php
        /*Ejercicio: Realiza una operación binaria y muestra el resultado. */
        
        echo 2+5;
    ?>
</p>

Ejercicio 20
<p>
    <?php
        /*Ejercicio: Usa una variable de tipo flotante y realiza una operación con ella.*/
        $float = 2.5;
        echo $float/2;
    ?>
</p>


Ejercicio 21
<p>
    <?php
        /*Ejercicio: Declara una variable de cadena y manipúlala (mayúsculas, minúsculas).*/
        $cadena = "holiwi";
        echo  strtoupper($cadena);
    ?>
</p>

Ejercicio 22
<p>
    <?php
        /*Ejercicio: Convierte un número en una cadena y una cadena en un número.*/
        $num = 10;
        $cadena = strval($num);
        echo $cadena;
        echo "<p>esto es una cadena ". intval($cadena) ."</p>"
    ?>
</p>


Ejercicio 23
<p>
    <?php
        /*Ejercicio: Convierte explícitamente una variable flotante en entera..*/
        $num = 10.3;
        echo $num;
        echo "<p>". intval($num) ."</p>";
    ?>
</p>


Ejercicio 24
<p>
    <?php
        /*Ejercicio: Realiza una operación entre diferentes 
        tipos de datos (flotante y entero) y observa la conversión automática.*/
        $num = 10.3;
        $num2 = 5;
        echo $num ."-". $num2 . "=";
        echo "<p>". $num-$num2 ."</p>";
    ?>
</p>


Ejercicio 25
<p>
    <?php
        /*Ejercicio: Usa una variable como condicional lógica.*/
        $num = 0;
        if ($num){
            echo "ferdadero";
        }else{
            echo "falso";
        }
    ?>
</p>



