<?php

$npractica = $_POST['practica'];

function f_ajax_lista_laboratorio($npractica)
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=evaluacion_individual_2", "root", "");
        $query = "SELECT l.*,a.*,s.* from lab AS l 
        INNER JOIN alumno AS a ON l.idalumno = a.idalumno
        INNER JOIN sistema AS s ON l.idsistema = s.idsistema 
        where l.numero_practica = :npractica;";

       // echo $query;
        $stmt = $conn->prepare($query);
        $stmt -> bindParam(":npractica",$npractica);
       $resultado = $stmt->execute();
       
        if ($resultado){
    
        $valores = $stmt->fetchAll();
        
        $salida ="";
        foreach ($valores as $valor){
            
            $salida = $salida . '<li onclick="f_ajax_edita_laboratorio_form('.$valor["idlab"].')"><div class="row">';
           // $salida = $salida . '<div class="col-2">' . $valor["idalumno"]."</div>";
            $salida = $salida . '<div class="col-2 bordes">' . $valor["matricula"]."</div>";
            $salida = $salida . '<div class="col-2 bordes">' . $valor["idsistema"]."</div>";
            $salida = $salida . '<div class="col-1 bordes">' . $valor["p1"]."</div>";
            $salida = $salida . '<div class="col-1 bordes">' . $valor["p2"]."</div>";
            $salida = $salida . '<div class="col-1 bordes">' . $valor["p3"]."</div>";
            $salida = $salida . '<div class="col-2 bordes">' . $valor["numero_practica"]."</div>";
            $salida = $salida . '</div></li>';
        }
        
        return $salida;
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

$salida = f_ajax_lista_laboratorio($npractica);

?>


<div class="row">    
    <div class="col-2 center lbl_header"> ID Alumno </div>
    <div class="col-2 center lbl_header"> ID Sistema </div>
    <div class="col-1 center lbl_header"> P. 1 </div>
    <div class="col-1 center lbl_header"> P. 2 </div>
    <div class="col-1 center lbl_header"> P. 3 </div>
    <div class="col-2 center lbl_header"> # Práctica </div>
</div>

<div style="height:450px;overflow-x:hidden;overflow-y:scroll;">
 <ul style="list-style:none;cursor:pointer;">
   <?php echo $salida; ?> 
 </ul>

</div>

