<?php
$idlab = $_POST['id_lab'];

function get_datos_laboratorio($idlab)
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "SELECT * from lab where idlab= " . $idlab . " " ;

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

  $resultado = get_datos_laboratorio($idlab);

  echo json_encode($resultado);

