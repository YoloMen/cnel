<?php
  $languages = $this->data['languages'];
  $languages_applicant = $this->data['languages_applicant'];
  $niveles = ["B"=>"BÁSICO", "I"=>"INTERMEDIO", "A"=>"AVANZADO"];

?>
<h5 class="center-align">Idiomas</h5>
<div class="col l12 m12 s12">
  <h6 class="center-align red white-text">Agregar idioma</h6>
</div>

<div class="row">
  <form>
  <div class="col l12 m12 s12">
    <div class="col l1 m2 s4 right-align languageWS" style="padding-top:15px;">Idioma</div>
    <div class="col l3 m4 s8">
      <select name="IDIDIO" id="IDIDIO" class="actS triggerI browser-default" required> 
        <option value="">Seleccione</option>
        <?php
          for ($i=0; $i < count($languages); $i++) { 
            echo '<option value="'.$languages[$i][0].'">'.$languages[$i][1].'</option>';
          }
        ?>
      </select>
    </div>

    <div class="col l1 m2 s4 right-align levelW" style="padding-top:15px;">Nivel Escrito</div>
    <div class="col l3 m4 s8">
      <select name="IDNESC" id="IDNESC" class="actS browser-default" required> 
        <option value="">Seleccione</option>
        <option value="B">BÁSICO</option>
        <option value="I">INTERMEDIO</option>
        <option value="A">AVANZADO</option>
      </select>
    </div>        

    <div class="col l1 offset-m6 m2 s4 right-align levelS" style="padding-top:15px;">Nivel Hablado</div>
    <div class="col l3 m4 s8">
      <select name="IDNHAB" id="IDNHAB" class="actS browser-default" required> 
        <option value="">Seleccione</option>
        <option value="B">BÁSICO</option>
        <option value="I">INTERMEDIO</option>
        <option value="A">AVANZADO</option>
      </select>
    </div>
  </div>

  <div class="col l12 m12 s12">
    <p class="center-align contentBtn"><a class="btn-floating waves-effect waves-light red send2"><i class="material-icons medium">save</i></a></p>
  </div>

  <input type="submit" id="subFORM" style="display:none;">
  <input type="hidden" value="idiomas" name="ID">

  </form>
</div>
      

<div class="row">
  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">Idiomas ingresados</h6>
  </div>
      
  <div class="col l12 m12 s12 ">
    <table class="centered">
      <thead>
        <tr>
          <th>IDIOMA</th>
          <th>NIVEL ESCRITO</th>
          <th>NIVEL HABLADO</th>
          <th>ACCIÓN</th>
        </tr>
      </thead>

      <tbody class="tableContent">
        <?php 
          if ($languages_applicant) {
            
            $row = '';
            for ($i=0; $i < count($languages_applicant); $i++) { 
              $row.='<tr data-id="'.$languages_applicant[$i][0].'">'.
              '<td>'.$languages[$languages_applicant[$i][4]-1][1].'</td>'.
              '<td>'.$niveles[$languages_applicant[$i][1]].'</td>'.
              '<td>'.$niveles[$languages_applicant[$i][2]].'</td>'.
              '<td><a href="javascript:" class="delete"><i class="material-icons">delete</i></a><a href="javascript:" class="edit"><i class="material-icons">edit</i></a></td>'.
              '</tr>';
            }
            echo $row;
          }
        ?>
      </tbody>
    </table>
  </div>

</div>







