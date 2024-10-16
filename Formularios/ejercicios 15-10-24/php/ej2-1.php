
<form action="../php/ej2-2.php" method="POST">
<?php 
if(intval($_REQUEST["num"])>0 && intval($_REQUEST["num"])<=10){
    echo "numero de elementos: ".$_REQUEST["num"]."<br>Introduzca los numeros a tratar<br>";
    for ($i=0; $i < $_REQUEST["num"]; $i++) {
        for ($j=0; $j < $_REQUEST["num"]; $j++) { 
            echo "<input type='text' name='num$i$j' id='num$i$j'>";
        } 
        echo "<br>";
    }
?>
<br>

Selecciona una fila:
<select name="fila" id="fila">
<?php 
    for ($i=1; $i <=$_REQUEST["num"]; $i++) { 
        echo "<option value=\"$i\">$i</option>";
    }
?>
</select>
Selecciona una columna:
<select name="columna" id="columna">
<?php 
    for ($i=1; $i <=$_REQUEST["num"]; $i++) { 
        echo "<option value=\"$i\">$i</option>";
    }
?>
</select>

<select name="direccion" id="direccion">
    <option value="1">Arriba derecha</option>
    <option value="2">Arriba izquierda</option>
    <option value="3">Abajo derecha</option>
    <option value="4">Abajo izquierda</option>
    <option value="5">Abajo</option>
    <option value="6">Arriba</option>
    <option value="7">Izquierda</option>
    <option value="8">Derecha</option>
</select>
<br>
<button type="submmit" value="enviar">Enviar</button>
<button type="reset" value="borrar">Borrar</button><br>
<?php
    
}else{
    echo "el valor es incorrecto. Debe ser un numero entre 1 y 10<br>";
}
?>


</form>
<a href='../html/ej2.html'>Volver al inicio.</a>