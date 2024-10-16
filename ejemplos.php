PROGRAMAS DE PRUEBA

----------ERROR DE ANIDADO-------
<?php
echo "<p>Hola</p>";

//<?php  no se pueden anidar etiquetas php
echo "<p>Adios</p>";
?>


----------PROGRAMA PHP NO CERRADO SIN ERROR-------

<?php
echo "<p>Hola</p>";
?>
<?php
echo "<p>Adios</p>";
//si es el fin de programa funciona sin etiqueta de cierre
?>
----------EJEMPLOS DE PROGRAMAS QUE GENERAN EL MISMO RESULTADO-------
--INICO FRAGMENTO PHP-
<?php
echo "<p>Hola</p>";
echo "<p>¿Cómo estás?</p>";
echo "<p>Adios</p>";
?>

--  un fragmento PHP y un fragmento HTML-

<p>Hola</p>
<?php
echo "<p>¿Cómo estás?</p>";
echo "<p>Adios</p>";
?>
--  DOS fragmentoS PHP y un fragmento HTML-

<?php
echo "<p>Hola</p>";
?>
<p>¿Cómo estás?</p>
<?php
echo "<p>Adios</p>";
?>


--  ECHO vs PRINT----

<?php
print "<p>Hola</p>";
echo "<p>Hola</p>", "<p>Hola de nuevo</p>";
?>

--  print_r vs var_dump----

<p>
<?php
$valores = [5, 0.0, "Hola", false, ""];
print_r($valores);
?>
</p>

<?php
$valores = [5, 0.0, "Hola", false, ""];
var_dump($valores);
?>

<?php
$valores = [5, 0.0, "Hola", false, ""];
$salida = print_r($valores, true);
?>

<p>--  print_r como valor de salida----</p>
<p>
<?php
$valores = [5, 0.0, "Hola", false, ""];
$salida = print_r($valores, true);
?>
</p>
<p><?= $salida ?></p>


--  EJEMPLOS DE COMENTARIOS----

<p><strong>
<?php
// La instrucción print escribe texto en la página web
echo "Hola"; // El comentario se puede escribir al final de la línea
?>
</strong></p>



<p><strong>
<?php
# La instrucción print escribe texto en la página web
echo "Hola"; # El comentario se puede escribir al final de la línea
?>
</strong></p>



<?php
echo "<p><strong>";
/* Dentro de un fragmento PHP no se pueden escribir etiquetas
html sueltas, tienen que estar siempre incluidas en
instrucciones print
*/
?>
Hola
<?php
echo "</strong></p>";
?>


<p>
<?php
print "Hola";
?>
</p>
<!-- El texto anterior ha sido generado por PHP -->
