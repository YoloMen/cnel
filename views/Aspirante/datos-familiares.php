<?php
$IF = 0;
?>
<h5 class="center-align">Datos familiares</h5>

  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">Agregar familiar</h6>
  </div>


<div class="row">


    <div class="col l12 m12 s12">

        <div class="input-field col offset-l1 l2 m4 offset-s4 s8">
          <label class="lll">Tipo familiar</label>
          <select name="BEDP_ec" class="browser-default" required>
            <option value="">Seleccione opción</option>
            <option value="" selected>Cónyuge</option>
            <option value="">...</option>
          </select>
        </div>



        <div class="input-field col l3 m4 s6">
          <input id="BEDP_ce" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce">Apellidos</label>
        </div>

        <div class="input-field col l3 m4 s6">
          <input id="BEDP_ce" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce">Nombres</label>
        </div>

        <div class="input-field col l2 m4 s6">
          <input id="BEDP_ce" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce">C.I/Pasaporte</label>
        </div>

        <div class="input-field col offset-l1 l3 m4 s6">
          <input id="BEDP_ce2" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce2">Fecha nacimiento</label>
        </div>


        <div class="input-field col l2 m4 offset-s4 s8">
          <label class="lll">Nivel de instrucción</label>
          <select name="BEDP_ec" class="browser-default" required>
            <option value="">Seleccione</option>
            <option value="">...</option>
          </select>
        </div>

     

        <div class="input-field col l2 offset-m2 m4 offset-s4 s8">
          <label class="lll">Oficio</label>
          <select name="BEDP_ec" class="browser-default" required>
            <option value="">Seleccione</option>
            <option value="">...</option>
          </select>
        </div>

        <div class="col offset-l1 l3 m4 offset-s4 s8">
            <h6>Contácto de emergencia<br>
              <input name="group1" type="radio" id="test1" />
              <label for="test1">Si</label>
              <input name="group1" type="radio" id="test2" />
              <label for="test2">No</label>
            </h6>
        </div>


      <div class="col l12 m12 s12">
         <div class="input-field col offset-l1 l5 m4 s12">
          <input id="BEDP_ce2" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce2">Dirección</label>
        </div>

        <div class="input-field col l2 m4 s6">
          <input id="BEDP_ce2" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce2">Teléfono 1</label>
        </div>

        <div class="input-field col l2 m4 s6">
          <input id="BEDP_ce2" name="BEDP_ce" type="text" class="validate" required>
          <label for="BEDP_ce2">Teléfono 2</label>
        </div>
    
      </div>

       


  
 





      </div>


      


    <div class="col l12 m12 s12">
        <p class="center-align"><a class="btn-floating waves-effect waves-light red"><i class="material-icons medium">save</i></a></p>
    </div>

      
    <div class="col l12 m12 s12">
      <h6 class="center-align red white-text">Familiares ingresados</h6>
    </div>


      <div class="col l12 m12 s12 ">

        <div class="">
        <table>
          <thead>
            <tr>
              <th>Apellidos</th>
              <th>Nombres</th>
              <th>C.I/Pasaporte</th>
              <th>F. de nacimiento</th>
              <th>Instrucción</th>
              <th>C. de emergencia</th>
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


