<?php
$IF = 0;
?>
<h5 class="center-align">Capacitación</h5>

  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">Nueva capacitación</h6>
  </div>



<div class="row">
    <div class="col l12 m12 s12">

      <div class="col l12 m12 s12">
        <div class="input-field offset-l2 col l4 m6 s12">
          <input id="BEDP_ce" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce">Institución</label>
        </div>

        <div class="col l2 m2 s4 right-align" style="padding-top:15px;">Tipo de evento:</div>
        <div class="input-field col l4 m3 s8">
          <select class="browser-default" required> 
            <option value="">Seleccione</option>
          </select>
        </div>
      </div>


      <div class="col l12 m12 s12" style="margin-top:15px">
        <div class="input-field offset-l2 col l4 m6 s12">
          <input id="BEDP_ce" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce">Nombre del evento</label>
        </div>

        <div class="col l2 m2 s4 right-align" style="padding-top:15px;">Área de estudios:</div>
        <div class="input-field col l4 m3 s8">
          <select class="browser-default" required> 
            <option value="">Seleccione</option>
          </select>
        </div>
      </div>
      

      <div class="col l12 m12 s12">
        <div class="col l6 m6 s4 right-align" style="padding-top:15px;">Tipo de certificado</div>
        <div class="input-field col l6 m6 s8">
            <select class="browser-default" required> 
              <option value="">Seleccione</option>
            </select>
        </div>
      </div>
  
      <div class="row l12 m12 s12"></div>

      <div class="col l12 m12 s12">
        <div class="input-field offset-l2 col l4 m6 s6">
          <input id="BEDP_ce" name="BEDP_ce" type="text" maxlength="15" class="validate"  value=''required>
          <label for="BEDP_ce">Fecha desde</label>
        </div>

        <div class="input-field col l4 m6 s6">
          <input id="BEDP_ce" name="BEDP_ce" type="text" maxlength="15" class="validate"  value=''required>
          <label for="BEDP_ce">Fecha hasta</label>
        </div>

        <div class="input-field col offset-l6 l4 offset-m6 m6 offset-s2 s8">
          <input id="BEDP_ce" name="BEDP_ce" type="text" maxlength="15" class="validate"  value=''required>
          <label for="BEDP_ce">Duración en horas</label>
        </div>


      </div>


      <div class="col l12 m12 s12">
        <p class="center-align"><a class="btn-floating waves-effect waves-light red"><i class="material-icons medium">save</i></a></p>
      </div>

      
    <div class="col l12 m12 s12">
      <h6 class="center-align red white-text">Capacitaciones ingresadas</h6>
    </div>


      <div class="col l12 m12 s12 ">

        <div class="">
        <table>
          <thead>
            <tr>
              <th>Institución</th>
              <th>Tipo de evento </th>
              <th>Área de estudios</th>
              <th>Nombre del Evento</th>
              <th>Tipo de certificado </th>
              <th>Duración en horas </th>
              <th>Fecha desde </th>
              <th>Fecha hasta</th>
              <th>Acción</th>
            </tr>
          </thead>

          <tbody id="_contentID">

            <?php 


              if ($Idiomas = 0) {
                $niveles = ["B"=>"BÁSICO", "I"=>"INTERMEDIO", "A"=>"AVANZADO"];
                $row = '';
                $countI = count($Idiomas);

                for ($i=0; $i < $countI; $i++) { 
                  $idiomaS= $comboIdiomas[($Idiomas[$i][1])-1][1];
                  $idClient = "_:".rand().":".rand(0,$countI).":spatium".rand().":".$Idiomas[$i][1].":id:".rand();
                  $token= hash('sha256', $idClient);

                  $row.='<tr data-token="'.$token.'" data-id="'.$idClient.'"> <td data-label="IDIOMAS">'.$idiomaS.'</td>'.
                  '<td data-label="NIVEL HABLADO">'.$niveles[$Idiomas[$i][2]].'</td>'.
                  '<td data-label="NIVEL ESCRITO">'.$niveles[$Idiomas[$i][3]].'</td>'.
                  '<td data-label="ACCIÓN"><a href="javascript:" class="_deleteID"><i class="material-icons">delete</i></a><a href="javascript:" class="_editID"><i class="material-icons">edit</i></a></td>'.
                  '</tr>';
                }


                echo $row;
              }
            ?>

          </tbody>
        </table>
        </div>

      </div>

  

  </div>
</div>






