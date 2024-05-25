<?php

function editar_sistema($datos)
{

    $idsistema = $datos['idsistema'];
    $p1 = $datos['p1'];
    $p2 = $datos['p2'];
    $p3 = $datos['p3'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "UPDATE sistema SET p1 = :p1, p2 = :p2, p3 = :p3 WHERE idsistema = :idsistema;";

        $stmt = $conn->prepare($query);
        $stmt -> bindParam(":idsistema",$idsistema);
        $stmt -> bindParam(":p1",$p1);
        $stmt -> bindParam(":p2",$p2);
        $stmt -> bindParam(":p3",$p3);
        
        if ($stmt->execute()){
            echo 1;
        }
        
        
        $conn = NULL;
    } catch (PDOException $pe) {  
        die("Could not connect to the database practica :" . $pe->getMessage());
    }
}

$datos = $_POST['datos'];

editar_sistema($datos);

?>