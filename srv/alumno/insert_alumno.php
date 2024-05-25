<?php

function insertar_alumno($datos)
{

    $matricula = $datos['matricula'];
    $nombre = $datos['nombre'];
    $grupo = $datos['grupo'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "INSERT INTO alumno (matricula, nombre, grupo) VALUES (:matricula, :nombre, :grupo);";

        $stmt = $conn->prepare($query);
        $stmt -> bindParam(":matricula",$matricula);
        $stmt -> bindParam(":nombre",$nombre);
        $stmt -> bindParam(":grupo",$grupo);
        
        if ($stmt->execute()){
            echo 1;
        }
        
        
        $conn = NULL;
    } catch (PDOException $pe) {  
        die("Could not connect to the database practica :" . $pe->getMessage());
    }
}

$datos = $_POST['datos'];

insertar_alumno($datos);

?>