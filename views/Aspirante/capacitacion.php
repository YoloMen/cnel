<?php
  $candidate_training = $this->data['candidate_training'];
  $event_type = $this->data['event_type'];
  $study_area = $this->data['study_area'];
  $certificate_type = ["A"=> "APROBACIÓN", "S"=>"ASISTENCIA"];

?>
<h5 class="center-align">Capacitación</h5>

<div class="col l12 m12 s12">
  <h6 class="center-align red white-text">Ingresar capacitación</h6>
</div>


<div class="row">
<form>
  <div class="col l12 m12 s12">
    
    <div class="row"></div>
    <div class="col l12 m12 s12">
      <div class="input-field offset-l2 col l4 m6 s12">
        <input name="CAECAP" id="CAECAP" type="text" maxlength="100" class="actI validate" required>
        <label for="CAECAP" class="actL">Nombre de la institución</label>
      </div>

      <div class="col l2 m2 s4 right-align" style="padding-top:15px;">Tipo de evento:</div>
      <div class="input-field col l4 m3 s8">
        <select name="CATEVE" id="CATEVE" class="actS browser-default" required> 
          <option value="">Seleccione</option>
          <?php
            $x = null;
            for ($i=0; $i < count($event_type); $i++) { 
              $x.= '<option value="'.$event_type[$i][0].'">'.$event_type[$i][1].'</option>';
            }
            echo $x;
          ?>
        </select>
      </div>
    </div>

    <div class="col l12 m12 s12" style="margin-top:15px">
      <div class="input-field offset-l2 col l4 m6 s12">
        <input name="CATITU" id="CATITU" type="text" maxlength="150" class="actI validate" required>
        <label for="CATITU" class="actL">Nombre del evento</label>
      </div>

      <div class="col l2 m2 s4 right-align" style="padding-top:15px;">Área de estudios:</div>
      <div class="input-field col l4 m3 s8">
        <select name="CAAEST" id="CAAEST" class="actS browser-default" required> 
          <option value="">Seleccione</option>
          <?php
            $x = null;
            for ($i=0; $i < count($study_area); $i++) { 
              $x.= '<option value="'.$study_area[$i][0].'">'.$study_area[$i][1].'</option>';
            }
            echo $x;
          ?>
        </select>
      </div>
    </div>
      

    <div class="col l12 m12 s12">
      <div class="col l6 m6 s4 right-align" style="padding-top:15px;">Tipo de certificado</div>
      <div class="input-field col l6 m6 s8">
        <select name="CATCER" id="CATCER" class="actS browser-default" required> 
          <option value="">Seleccione</option>
          <option value="A">APROBACIÓN</option>
          <option value="S">ASISTENCIA</option>
        </select>
      </div>
    </div>
  
    <div class="row l12 m12 s12"></div>

    <div class="col l12 m12 s12">
      <div class="input-field offset-l2 col l4 m6 s6">
        <input name="CAFICA" id="CAFICA" type="text" maxlength="15" class="actI validate" placeholder="yyyy-mm-dd" value='' required>
        <label for="CAFICA" class="active">Fecha desde</label>
      </div>

      <div class="input-field col l4 m6 s6">
        <input name="CAFFCA" id="CAFFCA" type="text" maxlength="15" class="actI validate" placeholder="yyyy-mm-dd" value='' required>
        <label for="CAFFCA" class="active">Fecha hasta</label>
      </div>

      <div class="input-field col offset-l6 l2 offset-m6 m3 offset-s2 s8">
        <input name="CADHOR" id="CADHOR" type="text" maxlength="5" class="actI validate" placeholder="En horas" value='' required>
        <label for="CADHOR" class="active">Duración</label>
      </div>
    </div>


    <div class="col l12 m12 s12">
      <p class="center-align contentBtn"><a class="btn-floating waves-effect waves-light red send2"><i class="material-icons medium">save</i></a></p>
    </div>

    <input type="submit" id="subFORM" style="display:none;">
    <input type="hidden" value="capacitacion" name="ID">
  </div>
</form>
</div>

<div class="row">
      
  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">Capacitaciones ingresadas</h6>
  </div>

  <div class="col l12 m12 s12">
    <table class="centered">
      <thead>
        <tr>
          <th>Institución</th>
          <th>Tipo de evento </th>
          <th>Área de estudios</th>
          <th>Nombre del Evento</th>
          <th>Tipo de certificado </th>
          <th>Duración en horas </th>
          <th>Fecha desde</th>
          <th>Fecha hasta</th>
          <th>Acción</th>
        </tr>
      </thead>

      <tbody class="tableContent">
        <?php 
          if ($candidate_training) {
            $row = null;
            for ($i=0; $i < count($candidate_training); $i++) { 
              $row.='<tr data-id="'.$candidate_training[$i][0].'">'. 
              '<td>'.$candidate_training[$i][3].'</td>'.
              '<td>'.$event_type[$candidate_training[$i][7]-1][1].'</td>'.
              '<td>'.$study_area[$candidate_training[$i][8]-1][1].'</td>'.
              '<td>'.$candidate_training[$i][1].'</td>'.
              '<td>'.$certificate_type[$candidate_training[$i][2]].'</td>'.
              '<td>'.$candidate_training[$i][4].'</td>'.
              '<td>'.$candidate_training[$i][5].'</td>'.
              '<td>'.$candidate_training[$i][6].'</td>'.
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