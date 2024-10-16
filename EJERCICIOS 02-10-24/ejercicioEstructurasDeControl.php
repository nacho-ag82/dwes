<h1>ESTRUCTURAS DE CONTROL</h1>


<p>
    <h2>Ejercicio 1</h2>
    <?php
    //bucle 1
        for ($i=1; $i < 4; $i++) { 
            echo nl2br("esto es la variable i ". $i."\n");
            //bucle anidado
            for ($j="a"; $j < "e"; $j++) { 
                echo nl2br(" &emsp; esto es la variable j ". $j."\n");
            }
        }
    ?>
</p>

<p>
    <h2>Ejercicio 2</h2>
    <?php
        //bucle tirar dado 1 3 veces
        for ($i=1; $i < 4; $i++) { 
            $dado1 = rand(1,6);
            echo nl2br("esto es el resultado del dado 1: ". $dado1."\n");
            //tirar tantos dados como el resultado del dado 1
            for ($j= 1; $j < $dado1+1; $j++) { 
                $dado2 = rand(1,6);
                echo nl2br(" &emsp; esto es el resultado del dado 2: ". $dado2."\n");
            }
        }
    ?>
</p>

<p>
    <h2>Ejercicio 3</h2>
    <?php
        //numero aleatorio para hacer el factorial
        $numero = rand(1,100);
        echo "el  factorial de $numero es :";
        //asignar el primer valor al sumatorio
        $sumatorio = $numero;
        //Recorrer factorial
        for ($i=$numero-1; $i > 1; $i--) { 
            //sumatorio de resultados
            $sumatorio = $sumatorio*$i;
        }
        //impresion de resultados
        echo $sumatorio;
    ?>
</p>