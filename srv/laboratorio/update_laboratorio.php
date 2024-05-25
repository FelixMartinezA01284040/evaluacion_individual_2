<?php

function editar_laboratorio($datos)
{

    $idlab = $datos['idlab'];
    $idalumno = $datos['idalumno'];
    $idsistema = $datos['idsistema'];
    $practica = $datos['practica'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "UPDATE lab SET idalumno = :idalumno, idsistema = :idsistema, numero_practica = :practica WHERE idlab = :idlab;";

        $stmt = $conn->prepare($query);
        $stmt -> bindParam(":idlab",$idlab);
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

editar_laboratorio($datos);

?>