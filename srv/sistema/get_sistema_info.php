<?php
$idsistema = $_POST['id_sistema'];

function get_datos_alumno($idsistema)
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "SELECT * from sistema where idsistema = " . $idsistema . " " ;

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

  $resultado = get_datos_alumno($idsistema);

  echo json_encode($resultado);

