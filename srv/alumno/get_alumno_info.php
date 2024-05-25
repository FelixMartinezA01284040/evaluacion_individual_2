<?php
$id_alumno = $_POST['id_alumno'];

function get_datos_alumno($id_alumno)
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "SELECT * from alumno where idalumno = " . $id_alumno . " " ;

        $stmt = $conn->prepare($query);
        $resultado = $stmt->execute();
       
        if ($resultado){
    
        $valores = $stmt->fetchAll();
        
       
        return $valores;
   
        }
        else {
            echo "<br> Comando NO PUDO completarse correctamente "; 
        }
        
        $conn = NULL;
    } catch (PDOException $pe) {
        die("Could not connect to the database practica :" . $pe->getMessage());
    }
}

  $resultado = get_datos_alumno($id_alumno);

  echo json_encode($resultado);

