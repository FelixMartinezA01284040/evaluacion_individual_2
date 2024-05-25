<?php

function insertar_sistema($datos)
{

    $p1 = $datos['p1'];
    $p2 = $datos['p2'];
    $p3 = $datos['p3'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "INSERT INTO sistema (p1, p2, p3) VALUES (:p1, :p2, :p3);";

        $stmt = $conn->prepare($query);
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

insertar_sistema($datos);

?>