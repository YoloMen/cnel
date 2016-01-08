<?php
$IF = 0;
?>
<h5 class="center-align">Idiomas</h5>


  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">Agregar idioma</h6>
  </div>

<div class="row">
        <div class="col l12 m12 s12">

        <div class="col l1 m2 s4 right-align" style="padding-top:15px;">Idioma:</div>
        <div class="col l3 m4 s8">
          <select class="browser-default" required> 
            <option value="">Seleccione</option>
          </select>
        </div>

        <div class="col l1 m2 s4 right-align" style="padding-top:15px;">Nivel Escrito:</div>
        <div class="col l3 m4 s8">
          <select class="browser-default" required> 
            <option value="">Seleccione</option>
          </select>
        </div>        

        <div class="col l1 offset-m6 m2 s4 right-align" style="padding-top:15px;">Nivel Hablado:</div>
        <div class="col l3 m4 s8">
          <select class="browser-default" required> 
            <option value="">Seleccione</option>
          </select>
        </div>


      </div>

      <div class="col l12 m12 s12">
        <p class="center-align"><a class="btn-floating waves-effect waves-light red"><i class="material-icons medium">save</i></a></p>
      </div>

      


  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">Idiomas ingresados</h6>
  </div>


      <div class="col l12 m12 s12 ">

        <div class="">
        <table class="responsive tableCBE">
          <thead>
            <tr>
              <th data-field="IDIOMAS">IDIOMA</th>
              <th data-field="NIVEL HABLADO">NIVEL HABLADO</th>
              <th data-field="NIVEL ESCRITO">NIVEL ESCRITO</th>
              <th data-field="ACCIÓN">ACCIÓN</th>
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






