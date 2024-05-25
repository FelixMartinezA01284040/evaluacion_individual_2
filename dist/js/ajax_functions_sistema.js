$(document).ready(function(){
    f_ajax_select_sistemas();
});


function f_ajax_ingresar_sistema(){

    var p1 = $("#p1_input").val();
    var p2 = $("#p2_input").val();
    var p3 = $("#p3_input").val();

    if (p1 == "" || p1 == undefined){
        alert("EL CAMPO P1 ESTA VACIO");
        return false;
    }

    if (p2 == "" || p2 == undefined){
        alert("EL CAMPO P2 ESTA VACIO");
        return false;
    }


    if (p3 == "" || p3 == undefined){
        alert("EL CAMPO P3 ESTA VACIO");
        return false;
    }

    var datos = {
        'datos':{
        'p1': p1,
        'p2': p2,
        'p3': p3
        }
    }

    //var datos = {matricula: matricula, nombre: nombre, grupo: grupo};
    $.ajax({
        method: "POST",
        url: "srv/sistema/insert_sistema.php",
        data: datos
    })
            .done(function (response) {                    

                if (response){
                    alert("SE INSERTO EL SISTEMA DE MANERA CORRECTA");

                    $("#p1_input").val('');
                    $("#p2_input").val('');
                    $("#p3_input").val('');

                    f_ajax_select_sistemas();

                }
                else{
                    alert("EL SISTEMA NO FUE INSERTADO")
                }
            });
}


function cancelar_ingresar_sistema(){
               
    $("#p1_input").val('');
    $("#p2_input").val('');
    $("#p3_input").val('');           
   
}


var f_ajax_select_sistemas = function () {

    var datos = {texto: ""};
    $.ajax({
        method: "POST",
        url: "srv/sistema/select_sistemas.php",
        data: datos
    })
            .done(function (response) {                    

                $("#lista_sistemas").html(response);
            });

}

function f_ajax_edita_sistema_form(aux){

    var datos = {id_sistema: aux};

    var updt_form = {text: "inicial"};
    $.ajax({
        method: "POST",
        url: "srv/sistema/update_sistema_form.php",
        data:updt_form
    })
            .done(function (response) {      

                $("#lista_sistemas").html(response);
                
                
                $.ajax({
                    method: "POST",
                    url: "srv/sistema/get_sistema_info.php",
                    data: datos
                })            

                .done(function (sistema_info) {  

                   // alert(alumno_info); 

                    var obj_sistema_info = jQuery.parseJSON( sistema_info ); 
                    var count_sistema_info = Object.keys(obj_sistema_info).length; 

                    if(count_sistema_info == 1){

                       $("#id_sistema_updt").val(obj_sistema_info[0]['idsistema']);
                       $("#p1_updt").val(obj_sistema_info[0]['p1']);
                       $("#p2_updt").val(obj_sistema_info[0]['p2']);
                       $("#p3_updt").val(obj_sistema_info[0]['p3']);

                    }else{

                        alert("ERROR AL DESPLEGAR INFORMACIÓN DE SISTEMA");
                    }

                });                            
                

            });   
   
}

function cancelar_edita_sistema(){
               
                            
    $("#lista_sistemas").html('');

    f_ajax_select_sistemas();

   
}

function f_ajax_edita_sistema(){

    var idsistema = $("#id_sistema_updt").val();
    var p1 = $("#p1_updt").val();
    var p2 = $("#p2_updt").val();
    var p3 = $("#p3_updt").val();

    if (p1 == "" || p1 == undefined){
        alert("EL CAMPO P1 ESTA VACIO");
        return false;
    }

    if (p2 == "" || p2 == undefined){
        alert("EL CAMPO P2 ESTA VACIO");
        return false;
    }


    if (p3 == "" || p3 == undefined){
        alert("EL CAMPO P3 ESTA VACIO");
        return false;
    }

    var datos = {
        'datos':{
        'idsistema': idsistema,
        'p1': p1,
        'p2': p2,
        'p3': p3
        }
    }

    //var datos = {matricula: matricula, nombre: nombre, grupo: grupo};
    $.ajax({
        method: "POST",
        url: "srv/sistema/update_sistema.php",
        data: datos
    })
            .done(function (response) {                    

                if (response){
                    alert("SE EDITO EL SISTEMA DE MANERA CORRECTA");

                    $("#lista_sistemas").html('');
                    f_ajax_select_sistemas();

                }
                else{
                    alert("EL SISTEMA NO FUE EDITADO")
                }
            });
}