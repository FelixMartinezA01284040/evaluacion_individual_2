<?php

function insertar_laboratorio($datos)
{

    $idalumno = $datos['idalumno'];
    $idsistema = $datos['idsistema'];
    $practica = $datos['practica'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "INSERT INTO lab (idalumno, idsistema, numero_practica) VALUES (:idalumno, :idsistema, :practica);";

        $stmt = $conn->prepare($query);
        $stmt -> bindParam(":idalumno",$idalumno);
        $stmt -> bindParam(":idsistema",$idsistema);
        $stmt -> bindParam(":practica",$practica);
        
        if ($stmt->execute()){
            echo 1;
        }
        
        
        $conn = NULL;
    } catch (PDOException $pe) {  
        die("Could not connect to the database practica :" . $pe->getMessage());
    }
}

$datos = $_POST['datos'];

insertar_laboratorio($datos);

?>