<?php
$IF = 0;
?>
<h5 class="center-align">Instrucción formal</h5>
<div clas="row">

  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">Agregar instrucción formal</h6>
  </div>


  <form>
    <div class="row">
      <div class="col l12 m12 s12">
        <div class="col l6 m6 s4">
          <h6 class="right-align">Nivel de instrucción formal</h6>
        </div>
        <div class="col l6 m6 s8">
            <select name="BEIF_ni" id="BEIF_ni" class="browser-default" required style="margin-top: 0px;"> 
              <option value="">Seleccione una opción</option>
              <option value="">PRIMARIA</option>
            </select>
        </div>
      </div>

    </div>

  <div class="row">
      <div class="col l12 m12 s12">
      
        <!-- PRIMARIA -->
          <!-- <div class="col l8 m8 s12">
            <div class="input-field col offset-l2 l10 m12 s12">
              <input id="BEDP_c2" name="BEDP_c2" type="text" maxlength="15" class="validate"  value=''required>
              <label for="BEDP_c2">Titulo obtenido</label>
            </div> 
          </div>

          <div class="col l4 m4 s12">
            <div class="input-field col l8 m12 s12">
              <input id="BEDP_ce" name="BEDP_ce" type="text" maxlength="15" class="validate"  value=''required>
              <label for="BEDP_ce">Tiempo de estudio</label>
            </div>
          </div>
          </div> -->

        
        <div class="col l6 m12 s12">
          <div class="input-field col l6 offset-m2 m4">
            <label for="BEDP_c2" class="lll">Institución educativa</label>
            <select name="BEDP_ec" class="browser-default" required style="width:150px">
              <option value="">Seleccione opción</option>
              <option value="">...</option>
              <option value="">...</option>
            </select>
          </div>
          
          <div class="input-field col l6 m6 s12">
            <input id="BEDP_c2" name="BEDP_c2" type="text" maxlength="15" class="validate"  value=''required>
            <label for="BEDP_c2">Nombre Institución</label>
          </div> 

        </div>

        <div class="col l6 m12 s12">
          <div class="input-field col l10 m12 s12">
            <input id="BEDP_c2" name="BEDP_c2" type="text" maxlength="15" class="validate"  value=''required>
            <label for="BEDP_c2">Titulo obtenido</label>
          </div> 
        </div>
      

      <div class="col l12 m12 s12">

          <div class="col l2 m4 s8 right-align">Tiempo de estudio:</div>
          <div class="input-field col l1 m2 s4">
            <input id="BEDP_c2" name="BEDP_c2" type="text" maxlength="15" class="validate"  value=''required>
          </div>
          
          <div class="col l3 m4 s8 right-align">Año de egresamiento o graduación:</div>
          <div class="input-field col l1 m2 s4">
            <input id="BEDP_c2" name="BEDP_c2" type="text" maxlength="15" class="validate"  value=''required>
          </div> 

          <div class="col l3 m6 s8 right-align">N° registro del SENESCYT:</div>
          <div class="input-field col l2 m3 s4">
            <input id="BEDP_c2" name="BEDP_c2" type="text" maxlength="15" class="validate"  value=''required>
          </div>  

    

      </div>


  </div>




      <div class="col l12 m12 s12" id="contentIF">
      </div>

      <div class="col l12 m12 s12">
        <p class="center-align" id="contentBtnIF" style="margin-bottom:20px"><a class="btn-floating waves-effect waves-light red btnSaveIF"><i class="material-icons medium">save</i></a></p>
      </div>

      <div class="col l12 m12 s12">
        <h6 class="center-align red white-text">Historial de instrucción formal</h6>
      </div>


        <div class="col l12 m12 s12 ">
          <table class="tableCBE">
            <thead>
              <tr>
                <th data-field="NIVEL INSTRUCCIÓN">NIVEL INSTRUCCIÓN</th>
                <th data-field="INSTITUCIÓN EDUCATIVA">INSTITUCIÓN EDUCATIVA</th>
                <th data-field="TÍTULO OBTENIDO">TÍTULO OBTENIDO</th>
                <th data-field="N. REGISTRO DEL SENESCYT">N. REGISTRO DEL SENESCYT</th>
              </tr>
            </thead>

            <tbody id="_contentIF">
              <?php

                if ($IF) {
                  $row = '';
                  $countIF = count($IF);
                  for ($i=0; $i < $countIF; $i++) { 
                    $instruccionS= $comboInstruccion[$IF[$i][6]-1][1];
                    $idClient = "_:".rand().":".rand(0,$countIF).":spatium".rand().":".$IF[$i][0].":id:".rand();
                    $token= hash('sha256', $idClient);

                    $row.='<tr data-token="'.$token.'" data-id="'.$idClient.'">'.
                    '<td data-label="NIVEL INSTRUCCIÓN">'.$instruccionS.'</td>'.
                    '<td data-label="INSTITUCIÓN EDUCATIVA">'.$IF[$i][1].'</td>'.
                    '<td data-label="TÍTULO OBTENIDO">'.$IF[$i][3].'</td>'.
                    '<td data-label="N. REGISTRO DEL SENESCYT">'.$IF[$i][4].'</td>'.
                    '<td data-label="ACCIÓN"><a href="javascript:" class="_deleteIF"><i class="material-icons">delete</i></a><a  href="javascript:" class="_editIF"><i class="material-icons">edit</i></a></td>'.
                    '</tr>';
                  }

                  echo $row;
                }
              ?>

            </tbody>
          </table>
        </div>
  </form>
</div>