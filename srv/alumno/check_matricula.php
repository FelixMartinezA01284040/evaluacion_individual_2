<?php

function check_matricula($matricula)
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "SELECT matricula from alumno where matricula = :matricula;";
       // echo $query;
        $stmt = $conn->prepare($query);
        $stmt -> bindParam(":matricula",$matricula);
       
        if ($stmt->execute()){
    
            $valores = $stmt->fetchAll();
            return $valores;

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


$matricula = $_POST['matricula'];
$result = check_matricula($matricula);
echo json_encode($result);

?>

