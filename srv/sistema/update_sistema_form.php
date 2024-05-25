
<div class="container-fluid">
   <div id="" class="row">

            <input type="hidden" id="id_sistema_updt">

            <div id="sistema" class="col-12 justify-content-center ms-5" style="border: 1px solid gray;border-radius: 8px;height: 250px;">

                  <div class="col-6">
                    <div class = "field_bg">  
                      <label class="tandem_lbl">Parámetro 1</label>
                    </div>
                    <input type="number" id="p1_updt" class="tandem_field" style="width:90%;">
                  </div>

                  <div class="col-6">
                    <div class = "field_bg">  
                      <label class="tandem_lbl">Parámetro 2</label>
                    </div>
                    <input type="number" id="p2_updt" class="tandem_field" style="width:90%;">
                  </div>


                  <div class="col-6">
                    <div class = "field_bg">  
                      <label class="tandem_lbl">Parámetro 3</label>
                    </div>
                    <input type="number" id="p3_updt" class="tandem_field" style="width:90%;">
                  </div>                 



                  <div class="row mt-3 mb-3 justify-content-around">  
        
                    <div class="col-3">
                        <button id="" type="button" class="btn btn-secondary btn_hover" onclick="f_ajax_edita_sistema()">Actualizar</button>
                   </div>

                   <div class="col-3">
                    <button id="" type="button" class="btn btn-secondary btn_hover" onclick="cancelar_edita_sistema()">Cancelar</button>
                   </div>

                 </div>


            </div>



            <div id="respuesta" class="col-8">


            </div>

   </div>
</div>
