$(document).ready(function(){
    f_ajax_select_alumnos();
    f_ajax_select_sistemas();
    f_ajax_select_laboratorios();
});


function f_ajax_ingresar_laboratorio(){

    var idalumno = $("#idalumno_input").val();
    var idsistema = $("#idsistema_input").val();
    var practica = $("#practica_input").val();

    if (idalumno == "" || idalumno == undefined){
        alert("EL CAMPO ALUMNO ESTA VACIO");
        return false;
    }

    if (idsistema == "" || idsistema == undefined){
        alert("EL CAMPO SISTEMA ESTA VACIO");
        return false;
    }


    if (practica < 1 || (practica == "" || practica == undefined)){
        alert("EL CAMPO PRACTICA ESTA VACIO");
        return false;
    }

    var datos = {
        'datos':{
        'idalumno': idalumno,
        'idsistema': idsistema,
        'practica': practica
        }
    }

    //var datos = {matricula: matricula, nombre: nombre, grupo: grupo};
    $.ajax({
        method: "POST",
        url: "srv/laboratorio/insert_laboratorio.php",
        data: datos
    })
            .done(function (response) {                    

                if (response){
                    alert("SE INSERTO EL LABORATORIO DE MANERA CORRECTA");

                    $("#idalumno_input").val('');
                    $("#idsistema_input").val('');
                    $("#practica_input").val('');

                    f_ajax_select_laboratorios();

                }
                else{
                    alert("EL LABORATORIO NO FUE INSERTADO")
                }
            });
}


function cancelar_ingresar_laboratorio(){
               
    $("#idalumno_input").val('');
    $("#idsistema_input").val('');
    $("#practica_input").val('');

    $("#alumno_lbl").val('Alumno');
    $("#sistema_lbl").val('Sistema');           
   
}

// INICIO DE FORMA INGRESAR LABORATORIO

var f_ajax_select_alumnos = function () {

    var datos = {texto: ""};
    $.ajax({
        method: "POST",
        url: "srv/laboratorio/select_alumnos.php",
        data: datos
    })
            .done(function (response) {                    

                $("#lista_alumnos").html(response);
            });

}

var f_ajax_select_alumno_form = function (aux, mat) {

    $("#idalumno_input").val(aux);
    $("#alumno_lbl").html("Alumno: " + mat);

}

var f_ajax_select_sistemas = function () {

    var datos = {texto: ""};
    $.ajax({
        method: "POST",
        url: "srv/laboratorio/select_sistemas.php",
        data: datos
    })
            .done(function (response) {                    

                $("#lista_sistemas").html(response);
            });

}

var f_ajax_select_sistema_form = function (aux, num) {

    $("#idsistema_input").val(aux);
    $("#sistema_lbl").html("Sistema: " + num);

}

// FIN DE FORMA INGRESAR LABORATORIO


var f_ajax_select_laboratorios = function () {

    var datos = {texto: ""};
    $.ajax({
        method: "POST",
        url: "srv/laboratorio/select_laboratorios.php",
        data: datos
    })
            .done(function (response) {                    

                $("#lista_laboratorios").html(response);
            });

}

function f_ajax_edita_laboratorio_form(aux){

    var datos = {id_lab: aux};

    var updt_form = {text: "inicial"};
    $.ajax({
        method: "POST",
        url: "srv/laboratorio/update_laboratorio_form.php",
        data:updt_form
    })
            .done(function (response) {      

                $("#lista_laboratorios").html(response);
                
                
                $.ajax({
                    method: "POST",
                    url: "srv/laboratorio/get_laboratorio_info.php",
                    data: datos
                })            

                .done(function (laboratorio_info) {  

                   //alert(laboratorio_info); 

                    var obj_laboratorio_info = jQuery.parseJSON( laboratorio_info ); 
                    var count_laboratorio_info = Object.keys(obj_laboratorio_info).length; 

                    if(count_laboratorio_info == 1){

                       $("#id_laboratorio_updt").val(obj_laboratorio_info[0]['idlab']);
                       $("#idalumno_updt").val(obj_laboratorio_info[0]['idalumno']);
                       $("#idsistema_updt").val(obj_laboratorio_info[0]['idsistema']);
                       $("#practica_updt").val(obj_laboratorio_info[0]['numero_practica']);

                    }else{

                        alert("ERROR AL DESPLEGAR INFORMACIÓN DE LABORATORIO");
                    }

                });                            
                

            });   
   
}

function cancelar_edita_laboratorio(){
               
                            
    $("#lista_laboratorios").html('');

    f_ajax_select_laboratorios();

   
}

function f_ajax_edita_laboratorio(){

    var idlab = $("#id_laboratorio_updt").val();
    var idalumno = $("#idalumno_updt").val();
    var idsistema = $("#idsistema_updt").val();
    var practica = $("#practica_updt").val();

    if (idalumno == "" || idalumno == undefined){
        alert("EL CAMPO ALUMNO ESTA VACIO");
        return false;
    }

    if (idsistema == "" || idsistema == undefined){
        alert("EL CAMPO SISTEMA ESTA VACIO");
        return false;
    }


    if (practica == "" || practica == undefined){
        alert("EL CAMPO PRACTICA ESTA VACIO");
        return false;
    }

    var datos = {
        'datos':{
        'idlab': idlab,
        'idalumno': idalumno,
        'idsistema': idsistema,
        'practica': practica
        }
    }

    //var datos = {matricula: matricula, nombre: nombre, grupo: grupo};
    $.ajax({
        method: "POST",
        url: "srv/laboratorio/update_laboratorio.php",
        data: datos
    })
            .done(function (response) {                    

                if (response){
                    alert("SE EDITO EL LABORATORIO DE MANERA CORRECTA");

                    $("#lista_laboratorios").html('');
                    f_ajax_select_laboratorios();

                }
                else{
                    alert("EL LABORATORIO NO FUE EDITADO")
                }
            });
}


var f_ajax_select_laboratorios_by_practica = function () {

    var npractica = $("#npractica_input").val();

    var datos = {practica: npractica};
    $.ajax({
        method: "POST",
        url: "srv/laboratorio/select_laboratorios_by_practica.php",
        data: datos
    })
            .done(function (response) {                    

                $("#lista_laboratorios").html(response);
            });

}