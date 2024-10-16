<h1>EJERCICIOS TIPOS DE DATOS CON MATRICES</h1>

<?php
/*1. Ejercicio: Crea una matriz que contenga los nombres de cinco colores y luego
imprime el tercer color en la matriz.
○ Objetivo: Familiarizarse con la creación y acceso a los elementos de una
Matrices asociativas */

echo "<h2>Ejercicio 1</h2>";
$matrizColores = ["azú","roza","naraha","amarisho","morao"];
echo "<p>$matrizColores[2]</p>";

/*2. Ejercicio: Crea una matriz asociativa para almacenar información de un coche
(marca, modelo, año) y luego imprime el valor del modelo.*/

echo "<h2>Ejercicio 2</h2>";
$matrizCoche = ["marca" =>"bmw", "modelo" =>"m3", "año" =>1982];

echo "<h2>". $matrizCoche["modelo"] ."</h2>";

/*3. Ejercicio: Crea una matriz multidimensional que contenga información de tres
estudiantes (nombre, edad, nota). Imprime el nombre del segundo estudiante.
○ Objetivo: Practicar la creación y acceso a matrices multidimensionales.*/

echo "<h2>Ejercicio 3</h2>";

$matrizMulidim = [];
$matrizMulidim[1] = ["nombre"=>"Eduardo","edad"=>"ManosTijeras","nota"=>2];
$matrizMulidim[2] = ["nombre"=>"Manolo","edad"=>"ElDelBombo","nota"=>10];
$matrizMulidim[3] = ["nombre"=>"Fede","edad"=>"GarcíaLorca","nota"=>6];

echo "<p>". $matrizMulidim[2]["nombre"]."</p>";

/*4. Ejercicio: Crea una matriz con los días de la semana y usa la función print_r()
para imprimirla.
○ Objetivo: Usar la función print_r() para visualizar matrices completas.*/
echo "<h2>Ejercicio 4</h2>";

$diasDeLaSemana = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
print_r($diasDeLaSemana);


/*5. Ejercicio: Crea una matriz con tres números y añade dos números más a la matriz.
○ Objetivo: Añadir elementos a una matriz existente.*/
echo "<h2>Ejercicio 5</h2>";


$matNumerica = [0=>0,1=>1,2=>2];

$matNumerica2 = [3=>3,4=>4];

print_r($matNumerica+$matNumerica2);

/*6. Ejercicio: Crea dos matrices, una con los nombres de tres frutas y otra con tres
verduras. Únelas en una sola matriz.
○ Objetivo: Unir matrices usando array_merge().*/

echo "<h2>Ejercicio 6</h2>";

$matFrutas = ["Manzana", "Pera", "Platano"];
$matVerduras = ["Pinmiento", "Cebolla", "Rabano"];
$matFrutVer = array_merge($matFrutas,$matVerduras);
print_r($matFrutVer);

/*7. Ejercicio: Crea una matriz con tres valores, utiliza count() para mostrar cuántos
elementos tiene.
○ Objetivo: Contar elementos en una matriz.*/
echo "<h2>Ejercicio 7</h2>";

$matNumerica=[0,1,2];
echo "<p>". count($matNumerica) ."</p>";

/*8. Ejercicio: Crea una matriz con cinco números y elimina el tercer número usando
unset().
○ Objetivo: Eliminar elementos de una matriz.*/
echo "<h2>Ejercicio 8</h2>";
$matNumerica=[0,1,2,3,4];

unset($matNumerica[2]);
print_r($matNumerica);


/*9. Ejercicio: Crea una matriz y luego copia sus valores a otra variable.
○ Objetivo: Copiar matrices en PHP.*/

echo "<h2>Ejercicio 9</h2>";
$matNumerica =[0,1,2,3,4,5,6,7];
$matNumerica2 = $matNumerica;
print_r($matNumerica2);

/*10. Ejercicio: Define una constante con el valor de la velocidad de la luz en metros por
segundo y úsala para mostrarla en pantalla.
○ Objetivo: Definir y usar una constante.*/

echo "<h2>Ejercicio 10</h2>";
define("vl",299792458);

echo "<p>La velocida de la luz es: ". vl;


/*11. Ejercicio: Crea una constante para el nombre de una aplicación web y muestra su
valor en un mensaje.
○ Objetivo: Practicar la definición y uso de constantes.*/
echo "<h2>Ejercicio 11</h2>";
define("pw","google");

echo "<p>La pagina web es: ". pw;


/*12. Ejercicio: Usa la constante predefinida PHP_VERSION para mostrar la versión actual
de PHP en la que se está ejecutando el script.
○ Objetivo: Usar constantes predefinidas de PHP.
Lista completa de constantes predefinidas*/
echo "<h2>Ejercicio 12</h2>";

echo "<p>La variable php version contiene: ". PHP_VERSION;

/*13. Ejercicio: Crea un script que use get_defined_constants() para mostrar todas
las constantes predefinidas disponibles en tu entorno PHP.
○ Objetivo: Explorar todas las constantes predefinidas en PHP.*/
echo "<h2>Ejercicio 13</h2>";
$definedConstants= get_defined_constants();
echo "<p>La variable php version contiene: ";
print_r(get_defined_constants());

?>