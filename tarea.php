<?php
$text = $_POST['text'];
if ($text == null || $text=='undefined') $text = "";
if (strcmp($text,"inicial")==0)  echo "Estamos listos para lo que desees hacer.";
else {
    switch ($text) {
     case "lalumno": clic_ajax_lalumno(); break;
     default:  echo "No entendi el comando..."; break;
    }
}

function clic_ajax_lalumno()
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "SELECT * from alumno where 1 = 1;";
       // echo $query;
        $stmt = $conn->prepare($query);
       $resultado = $stmt->execute();
        
        if ($resultado){
       
        $valores = $stmt->fetchAll();
        
        foreach ($valores as $valor){
            $salida = "idalumno = " . $valor["idalumno"] . " grupo = " . $valor["grupo"];
            $salida = $salida . " matricula= " . $valor["matricula"] . " nombre= " . $valor["nombre"];
            echo $salida . "<br>";
        }
        //echo $valores;
        }
        else {
            echo "<br> Comando NO PUDO completarse correctamente "; 
        }
        
        $conn = NULL;
    } catch (PDOException $pe) {
        die("Could not connect to the database practica :" . $pe->getMessage());
    }
}