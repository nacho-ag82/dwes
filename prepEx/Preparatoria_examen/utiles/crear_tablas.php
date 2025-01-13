<?php 
    // Incluir el archivo de conexion a la base de datos
    require_once("./conexion_bbdd.php");

    // Crear la tabla SEDES
    $sql_sedes = "CREATE TABLE IF NOT EXISTS sedes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        direccion VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB;";
    // Ejecutar la consulta para la tabla SEDES
    try {
        $conexion->query($sql_sedes);
        echo "Tabla 'sedes' creada correctamente.<br>";
    } catch (PDOException $e) {
        echo "Error al crear la tabla 'sedes': " . $e->getMessage() . "<br>";
    }

    // Crear la tabla DEPARTAMENTOS
    $sql_departamentos = "CREATE TABLE IF NOT EXISTS departamentos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL UNIQUE,
        presupuesto INT(11) NOT NULL,
        sede_id INT,
        FOREIGN KEY (sede_id) REFERENCES sedes(id) ON DELETE CASCADE
    ) ENGINE=InnoDB;";
    // Ejecutar la consulta para la tabla departamentos
    try {
        $conexion->query($sql_departamentos);
        echo "Tabla 'departamentos' creada correctamente.<br>";
    } catch (PDOException $e) {
        echo "Error al crear la tabla 'departamentos': " . $e->getMessage() . "<br>";
    }
    
    // Crear la tabla PAISES
    $sql_paises = "CREATE TABLE IF NOT EXISTS paises (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nacionalidad VARCHAR(50) NOT NULL,
        pais VARCHAR(50) NOT NULL
    ) ENGINE=InnoDB;";
    // Ejecutar la consulta para la tabla paises
    try {
        $conexion->query($sql_paises);
        echo "Tabla 'paises' creada correctamente.<br>";
    } catch (PDOException $e) {
        echo "Error al crear la tabla 'paises': " . $e->getMessage() . "<br>";
    }
    
    // Crear la tabla EMPLEADOS
    $sql_empleados = "CREATE TABLE IF NOT EXISTS empleados (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        email VARCHAR(120) NOT NULL,
        apellidos VARCHAR(150) NOT NULL,
        salario FLOAT NOT NULL,
        hijos INT NOT NULL,
        departamento_id INT,
        pais_id INT,
        FOREIGN KEY (departamento_id) REFERENCES departamentos(id) ON DELETE CASCADE,
        FOREIGN KEY (pais_id) REFERENCES paises(id) ON DELETE CASCADE
    ) ENGINE=InnoDB;";
    // Ejecutar la consulta para la tabla empleados
    try {
        $conexion->query($sql_empleados);
        echo "Tabla 'empleados' creada correctamente.<br>";
    } catch (PDOException $e) {
        echo "Error al crear la tabla 'empleados': " . $e->getMessage() . "<br>";
    }  

?>