
<div class="container-fluid">
   <div id="" class="row">

            <input type="hidden" id="id_alumno_updt">

            <div id="alumno" class="col-12 justify-content-center ms-5" style="border: 1px solid gray;border-radius: 8px;height: 250px;">

                  <div class="col-6">
                    <div class = "field_bg">  
                      <label class="tandem_lbl">Matrícula</label>
                    </div>
                    <input id="matricula_updt" class="tandem_field" style="width:90%;">
                  </div>

                  <div class="col-6">
                    <div class = "field_bg">  
                      <label class="tandem_lbl">Nombre</label>
                    </div>
                    <input id="nombre_updt" class="tandem_field" style="width:90%;">
                  </div>


                  <div class="col-6">
                    <div class = "field_bg">  
                      <label class="tandem_lbl">Grupo</label>
                    </div>
                    <input type="number" min="1" id="grupo_updt" class="tandem_field" style="width:90%;">
                  </div>                 



                  <div class="row mt-3 mb-3 justify-content-around">  
        
                    <div class="col-3">
                        <button id="" type="button" class="btn btn-secondary btn_hover" onclick="f_ajax_edita_alumno()">Actualizar</button>
                   </div>

                   <div class="col-3">
                    <button id="" type="button" class="btn btn-secondary btn_hover" onclick="cancelar_edita_alumno()">Cancelar</button>
                   </div>

                 </div>


            </div>



            <div id="respuesta" class="col-8">


            </div>

   </div>
</div>
