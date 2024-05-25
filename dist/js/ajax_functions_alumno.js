$(document).ready(function(){
    f_ajax_select_alumnos();
});


function f_ajax_ingresar_alumno(){

    var matricula = $("#matricula_input").val();
    var nombre = $("#nombre_input").val();
    var grupo = $("#grupo_input").val();

    if (matricula == "" || matricula == undefined){
        alert("EL CAMPO MATRICULA ESTA VACIO, INSERTE UNA MATRICULA");
        return false;
    }

    if (nombre == "" || nombre == undefined){
        alert("EL CAMPO NOMBRE ESTA VACIO, INSERTE UN NOMBRE");
        return false;
    }


    if (grupo < 1 || (grupo == "" || grupo == undefined)){
        alert("EL GRUPO NO EXISTE, SELECCIONE UN NÚMERO MAYOR A 0");
        $("#grupo_input").val('');
        return false;
    }

    var datos = {
        'datos':{
        'matricula': matricula,
        'nombre': nombre,
        'grupo': grupo
        }
    }

    //var datos = {matricula: matricula, nombre: nombre, grupo: grupo};
    $.ajax({
        method: "POST",
        url: "srv/alumno/insert_alumno.php",
        data: datos
    })
            .done(function (response) {                    

                if (response){
                    alert("SE INSERTO EL ALUMNO DE MANERA CORRECTA");

                    $("#matricula_input").val('');
                    $("#nombre_input").val('');
                    $("#grupo_input").val('');

                    f_ajax_select_alumnos();

                }
                else{
                    alert("EL ALUMNO NO FUE INSERTADO")
                }
            });
}


function cancelar_ingresar_alumno(){
               
    $("#matricula_input").val('');
    $("#nombre_input").val('');
    $("#grupo_input").val('');           
   
}


var f_ajax_select_alumnos = function () {

    var datos = {texto: ""};
    $.ajax({
        method: "POST",
        url: "srv/alumno/select_alumnos.php",
        data: datos
    })
            .done(function (response) {                    

                $("#lista_alumnos").html(response);
            });

}

function f_ajax_edita_alumno_form(aux){

    var datos = {id_alumno: aux};

    var updt_form = {text: "inicial"};
    $.ajax({
        method: "POST",
        url: "srv/alumno/update_alumno_form.php",
        data:updt_form
    })
            .done(function (response) {      

                $("#lista_alumnos").html(response);
                
                
                $.ajax({
                    method: "POST",
                    url: "srv/alumno/get_alumno_info.php",
                    data: datos
                })            

                .done(function (alumno_info) {  

                   // alert(alumno_info); 

                    var obj_alumno_info = jQuery.parseJSON( alumno_info ); 
                    var count_alumno_info = Object.keys(obj_alumno_info).length; 

                    if(count_alumno_info == 1){

                       $("#id_alumno_updt").val(obj_alumno_info[0]['idalumno']);
                       $("#matricula_updt").val(obj_alumno_info[0]['matricula']);
                       $("#nombre_updt").val(obj_alumno_info[0]['nombre']);
                       $("#grupo_updt").val(obj_alumno_info[0]['grupo']);

                    }else{

                        alert("ERROR AL DESPLEGAR INFORMACIÓN DE ALUMNO");
                    }

                });                            
                

            });   
   
}

function cancelar_edita_alumno(){
               
                            
    $("#lista_alumnos").html('');

    f_ajax_select_alumnos();

   
}

function f_ajax_edita_alumno(){

    var idalumno = $("#id_alumno_updt").val();
    var matricula = $("#matricula_updt").val();
    var nombre = $("#nombre_updt").val();
    var grupo = $("#grupo_updt").val();

    if (matricula == "" || matricula == undefined){
        alert("EL CAMPO MATRICULA ESTA VACIO, INSERTE UNA MATRICULA");
        return false;
    }

    if (nombre == "" || nombre == undefined){
        alert("EL CAMPO NOMBRE ESTA VACIO, INSERTE UN NOMBRE");
        return false;
    }


    if (grupo < 1 || (grupo == "" || grupo == undefined)){
        alert("EL GRUPO NO EXISTE, SELECCIONE UN NÚMERO MAYOR A 0");
        $("#grupo_updt").val('');
        return false;
    }

    var datos = {
        'datos':{
        'idalumno': idalumno,
        'matricula': matricula,
        'nombre': nombre,
        'grupo': grupo
        }
    }

    //var datos = {matricula: matricula, nombre: nombre, grupo: grupo};
    $.ajax({
        method: "POST",
        url: "srv/alumno/update_alumno.php",
        data: datos
    })
            .done(function (response) {                    

                if (response){
                    alert("SE EDITO EL ALUMNO DE MANERA CORRECTA");

                    $("#lista_alumnos").html('');
                    f_ajax_select_alumnos();

                }
                else{
                    alert("EL ALUMNO NO FUE EDITADO")
                }
            });
}