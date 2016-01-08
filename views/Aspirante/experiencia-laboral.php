<?php
$IF = 0;
?>
<h5 class="center-align">Experiencia laboral</h5>

  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">Agregar experiencia laboral</h6>
  </div>


<div class="row">


    <div class="col l12 m12 s12">

      <div class="col l12 m12 s12">
        <div class="input-field offset-l2 col l4 m6 s12">
          <input id="BEDP_ce" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce">Nombre de la empresa</label>
        </div>

        <div class="col l2 m2 s4 right-align" style="padding-top:15px;">Área de trabajo</div>
        <div class="input-field col l4 m3 s8">
          <select class="browser-default" required> 
            <option value="">Seleccione</option>
          </select>
        </div>
      </div>

      <div class="col l12 m12 s12">
        <div class="input-field offset-l2 col l2 m6 s6">
          <input id="BEDP_ce" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce">Cargo</label>
        </div>

        <div class="input-field col l2 m6 s6">
          <input id="BEDP_ce" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce">Telefono</label>
        </div>

        <div class="input-field col l4 m12 s12">
          <input id="BEDP_ce" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce">Referencia laboral</label>
        </div>
      </div>

        
      <div class="col l12 m12 s12">
        <div class="col offset-l5 l3 m4 s4 right-align">Tipo de empresa:</div>
      
        <div class="col l4 m8 s8" >
            <input name="group1" type="radio" id="test1" />
              <label for="test1">Pública</label>
              <input name="group1" type="radio" id="test2" />
              <label for="test2">Privada</label>
        </div>
      </div>



      </div>


      


    <div class="col l12 m12 s12">
        <p class="center-align"><a class="btn-floating waves-effect waves-light red"><i class="material-icons medium">save</i></a></p>
    </div>

      
    <div class="col l12 m12 s12">
      <h6 class="center-align red white-text">Experiencia laboral</h6>
    </div>


      <div class="col l12 m12 s12 ">

        <div class="">
        <table>
          <thead>
            <tr>
              <th>Empresa</th>
              <th>Área de trabajo</th>
              <th>Cargo</th>
              <th>Referencia laboral</th>
              <th>Teléfono</th>
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


