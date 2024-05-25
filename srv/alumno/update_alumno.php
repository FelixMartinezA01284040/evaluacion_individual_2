<?php

function editar_alumno($datos)
{

    $idalumno = $datos['idalumno'];
    $matricula = $datos['matricula'];
    $nombre = $datos['nombre'];
    $grupo = $datos['grupo'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "UPDATE alumno SET matricula = :matricula, nombre = :nombre, grupo = :grupo WHERE idalumno = :idalumno;";

        $stmt = $conn->prepare($query);
        $stmt -> bindParam(":idalumno",$idalumno);
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

editar_alumno($datos);

?>