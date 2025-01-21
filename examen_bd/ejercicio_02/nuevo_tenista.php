<?php
    require_once("../utiles/config.php");
    require_once("../utiles/funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta nuevo tenista</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Alta de un nuevo tenista</h1>

	<!--  
        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 
        Recuerda:
        - Crea las variables que vas a utilizar para recibir los datos del formulario y validar los datos recibidos.
		- Comprobar si hemos accedido por POST ($_SERVER["REQUEST_METHOD"] == "POST").
		- Usa la función "obtenerValorCampo" con los datos recibidos.
		- Validar: Nombre, apellidos, altura...y crea los mensajes en caso de que no cumplan los requisitos.
		- Mostrar el formulario y errores si hay.

    -->
		<!-- Formulario -->
  		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  			<p>
  				<!-- Campo nombre del tenista -->
        		<label for="nombre">Nombre:</label>
        		<input type="text" id="nombre" name="nombre" value="">
		        <span style="color: red">
		          	<!--  
        				ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR ERROR EN EL NOMBRE
        			-->
		        </span>
      		</p>
      		<p>
  				<!-- Campo apellidos del tenista -->
        		<label for="apellidos">Apellidos:</label>
        		<input type="text" id="apellidos" name="apellidos" value="">
		        <span style="color: red">
		          	<!--  
        				ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR ERROR EN LOS APELLIDOS
        			-->
		        </span>
      		</p>
	    	<p>
  				<!-- Campo altura del tenista -->
        		<label for="altura">Altura:</label>
        		<input type="text" id="altura" name="altura" value=""> cm
		        <span style="color: red">
		          	<!--  
        				ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR ERROR EN LA ALTURA
        			-->
		        </span>
      		</p>
      		<p>
  				<!-- Campo año de nacimiento del tenista -->
        		<label for="anno_nacimiento">Año del nacimiento:</label>
        		<input type="text" id="anno_nacimiento" name="anno_nacimiento" value="">
		        
      		</p>
      		<p>
      			<!-- Campo mano del tenista -->
				Seleccione mano:
				<input type="radio" id="mano1" name="mano" value="Diestro"/>
				<label for="mano1">Diestro</label> 
				<input type="radio" id="mano2" name="mano" value="Zurdo"/>
				<label for="mano2">Zurdo</label>
				<span style="color: red">
		          	<!--  
        				ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR ERROR EN LA MANO
        			-->
		        </span>
			</p>
					
	        <fieldset>
	        	<legend>Título</legend>
	        	<p>
					<select id="torneo" name="torneo">
						<option value="">Seleccione Torneo</option>
						<!--  
        				ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA RELLENAR EL SELECT DE LOS TORNEOS TAL Y COMO SE SOLICITA
        				-->
	  					
					</select>
					<span style="color: red">
						<!--  
        				ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR ERROR EN NOMBRE DEL TORNEO
        				-->
		          	</span>
				</p>
	        	<p>
					<select id="anno" name="anno">
						<option value="">Seleccione Año</option>
						<!--  
        				ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA RELLENAR EL SELECT DE LOS AÑOS TAL Y COMO SE SOLICITA
        				-->
  					</select>
		          	<span style="color: red">
						<!--  
        				ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA MOSTRAR ERROR EN EL AÑO DEL TORNEO
        				-->
		          	</span>
				</p>
	        </fieldset>
	        
	        <p>
	            <!-- Botón submit -->
	            <input type="submit" value="Guadar">
	            <!-- Botón borrar -->
	            <input type="reset" value="Borrar">
	        </p>
	    </form>
  	
						<!--  
        				ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO. Recuerda:
						- Conéctate a la BBDD.
						- Prepara la consulta para insertar al nuevo jugador. 
						- Ejecuta la consulta de inserción.
						- A continuación, si ha ganado algún título, hay que insertarlo en la tabla "titulos"
        				-->
	    
</body>
</html>