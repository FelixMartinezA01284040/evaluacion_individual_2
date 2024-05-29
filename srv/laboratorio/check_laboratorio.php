<?php

function check_alumno($idalumno)
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "SELECT idalumno from alumno where idalumno= :idalumno;";

       // echo $query;
        $stmt = $conn->prepare($query);
        $stmt -> bindParam(":idalumno",$idalumno);
       $resultado = $stmt->execute();
       
        if ($resultado){
    
            $valores = $stmt->fetchAll();
            
            if(empty($valores)){
                return 0;
            }else{
                return 1;
            }
        

        }
        else {
            echo "<br> Comando NO PUDO completarse correctamente "; 
        }
        
        $conn = NULL;
    } catch (PDOException $pe) {
        die("Could not connect to the database practica :" . $pe->getMessage());
    }
}

function check_sistema($idsistema)
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "SELECT idsistema from sistema where idsistema= :idsistema;";

       // echo $query;
        $stmt = $conn->prepare($query);
        $stmt -> bindParam(":idsistema",$idsistema);
       $resultado = $stmt->execute();
       
        if ($resultado){
    
            $valores = $stmt->fetchAll();
            
            if(empty($valores)){
                return 0;
            }else{
                return 1;
            }
        

        }
        else {
            echo "<br> Comando NO PUDO completarse correctamente "; 
        }
        
        $conn = NULL;
    } catch (PDOException $pe) {
        die("Could not connect to the database practica :" . $pe->getMessage());
    }
}

$datos = $_POST['cdatos'];

$alumno = check_alumno($datos['idalumno']);
$sistema = check_sistema($datos['idsistema']);


echo json_encode(array('alumno' => $alumno, 'sistema' => $sistema));

?>


