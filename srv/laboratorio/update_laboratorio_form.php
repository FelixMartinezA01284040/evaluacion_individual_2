
<div class="container-fluid">
   <div id="" class="row">

            <input type="hidden" id="id_laboratorio_updt">

            <div id="laboratorio" class="col-12 justify-content-center ms-5" style="border: 1px solid gray;border-radius: 8px;height: 250px;">

                  <div class="col-6">
                    <div class = "field_bg">  
                      <label class="tandem_lbl">Alumno</label>
                    </div>
                    <input type="number" id="idalumno_updt" class="tandem_field" style="width:90%;">
                  </div>

                  <div class="col-6">
                    <div class = "field_bg">  
                      <label class="tandem_lbl">Sistema</label>
                    </div>
                    <input type="number" id="idsistema_updt" class="tandem_field" style="width:90%;">
                  </div>


                  <div class="col-6">
                    <div class = "field_bg">  
                      <label class="tandem_lbl"># Práctica</label>
                    </div>
                    <input type="number" id="practica_updt" class="tandem_field" style="width:90%;">
                  </div>                 



                  <div class="row mt-3 mb-3 justify-content-around">  
        
                    <div class="col-3">
                        <button id="" type="button" class="btn btn-secondary btn_hover" onclick="f_ajax_edita_laboratorio()">Actualizar</button>
                   </div>

                   <div class="col-3">
                    <button id="" type="button" class="btn btn-secondary btn_hover" onclick="cancelar_edita_laboratorio()">Cancelar</button>
                   </div>

                 </div>


            </div>



            <div id="respuesta" class="col-8">


            </div>

   </div>
</div>
