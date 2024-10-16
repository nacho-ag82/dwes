
<form action="../php/ej1-2.php" method="POST">
<?php 
if(intval($_REQUEST["num"])>0 && intval($_REQUEST["num"])<=10){
    echo "numero de elementos: ".$_REQUEST["num"]."<br>Introduzca los numeros a tratar<br>";
    for ($i=0; $i < $_REQUEST["num"]; $i++) { 
        echo "<input type='text' name='num$i' id='num$i'>";
    }


    
}else{
    echo "el valor es incorrecto. Debe ser un numero entre 1 y 10<br>";
}
?>
<button type="submmit" value="enviar">Enviar</button>
<button type="reset" value="borrar">Borrar</button><br>

</form>
<a href='../html/ej1.html'>Volver al inicio.</a>