<?php


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
        
        $salida ="";
        foreach ($valores as $valor){
            
            $salida = $salida . '<li onclick="f_ajax_select_alumno_form('.$valor["idalumno"].',\''.$valor["matricula"].'\')"><div class="row">';
           // $salida = $salida . '<div class="col-2">' . $valor["idalumno"]."</div>";
            $salida = $salida . '<div class="col-3 bordes">' . $valor["matricula"]."</div>";
            $salida = $salida . '<div class="col-4 bordes">' . $valor["nombre"]."</div>";
            $salida = $salida . '<div class="col-3 bordes">' . $valor["grupo"]."</div>";
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

$salida = clic_ajax_lalumno();

?>


<div class="row">    
    <div class="col-3 center lbl_header"> Matrícula </div>
    <div class="col-4 center lbl_header"> Nombre </div>
    <div class="col-3 center lbl_header"> Grupo </div>
</div>

<div style="height:250px;overflow-x:hidden;overflow-y:scroll;">
 <ul style="list-style:none;cursor:pointer;">
   <?php echo $salida; ?> 
 </ul>

</div>
