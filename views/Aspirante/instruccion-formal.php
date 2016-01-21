<?php
  $education_level = $this->data['education_level'];
  $institution = $this->data['institution'];
  $study_area = $this->data['study_area'];

  $formal_education = $this->data['formal_education'];

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
            <select name="IFNSTR" id="IFNSTR" class="actS browser-default" required style="margin-top: 0px;"> 
              <option value="">Seleccione</option>
              <?php
                for ($i=0; $i < count($education_level); $i++) { 
                  echo '<option value="'.$education_level[$i][0].'">'.$education_level[$i][1].'</option>';
                }
              ?>
            </select>
        </div>
      </div>

    </div>

  <div class="row">

    <div class="col l12 m12 s12" id="contIF1" style="display:none;">
      <div class="col l8 m8 s12">
        <div class="input-field col offset-l2 l10 m12 s12">
          <input id="IFNOMB1" name="IFNOMB1" type="text" maxlength="140" class="actI validate"  value=''>
          <label for="IFNOMB1" class="actL">Titulo obtenido</label>
        </div>
      </div>
      <div class="col l4 m4 s12">
        <div class="input-field col l8 m12 s12">
          <input id="IFTIEM1" name="IFTIEM1" type="text" maxlength="2" class="actI validate" placeholder="En años" value=''>
          <label class="active" for="IFTIEM1">Tiempo de estudio</label>
        </div>
      </div>

      <div class="col l12 m12 s12" id="querycontIF1">
      </div>
    </div>

    <div class="col l12 m12 s12" id="contIF2" style="display:none;">    
      <div class="col l12 m12 s12">   
        <div class="col l6 m12 s12">
          <div class="input-field col l6 offset-m2 m4">
            <label for="IFINST" class="lll">Institución educativa</label>
            <select name="IFINST" id="IFINST" class="actS browser-default">
              <option value="">Seleccione</option>
              <?php
                $x = null;
                for ($i=0; $i < count($institution); $i++) { 
                  $x.= '<option value="'.$institution[$i][0].'">'.$institution[$i][1].'</option>';
                }
                echo $x;
              ?>
            </select>
          </div>
          
          <div class="input-field col l6 m6 s12" id="OINS" style="display:none;">
            <input id="IFOINS" name="IFOINS" type="text" maxlength="100" class="actI validate"  value=''>
            <label for="IFOINS" class="actL">Nombre Institución</label>
          </div> 

        </div>

        <div class="col l6 m12 s12">
          <div class="input-field col l10 m12 s12">
            <input id="IFNOMB" name="IFNOMB" type="text" maxlength="140" class="actI validate"  value=''>
            <label for="IFNOMB" class="actL">Titulo obtenido</label>
          </div> 
        </div>
      

        <div class="col l12 m12 s12">

          <div class="input-field col l2 m6 s6">
            <input name="IFTIEM" id="IFTIEM" type="text" maxlength="2" class="actI validate" placeholder="En años">
            <label for="IFTIEM" class="active">Tiempo de estudio</label>
          </div>

          <div class="input-field col offset-l1 l2 m6 s6">
            <input name="IFFGRA" id="IFFGRA" type="text" maxlength="10" class="actI validate" placeholder="yyyy-mm-dd">
            <label for="IFFGRA" class="active">Fecha de graduación</label>
          </div>

          <div class="input-field col offset-l1 l2 m6 s12">
            <label class="lll">Área de estudios</label>
            <select name="IFAEST" id="IFAEST" class="actS browser-default">
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

          <div class="input-field col l2 m6 s12">
            <input name="IFSENE" id="IFSENE" type="text" maxlength="40" class="actI validate" placeholder="N° registro">
            <label for="IFSENE" class="active">SENESCYT</label>
          </div>

          <div class="col l2 m6 s12">
            <a href="http://www.senescyt.gob.ec/web/guest/index.php/consultas" target="_BLANK">Consultar N° SENESCYT AQUI</a>
          </div>

        </div>


      </div>

    <input type="submit" id="subFORM" style="display:none;">
    <input type="hidden" value="instruccion-formal" name="ID" id="JIFID">
    </div>
  </div>
</form>
</div>

<div class="row">
  <div class="col l12 m12 s12">
    <p class="center-align contentBtn"><a class="btn-floating waves-effect waves-light red send2"><i class="material-icons medium">save</i></a></p>
  </div>

  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">Historial de instrucción formal</h6>
  </div>


  <div class="col l12 m12 s12 ">
    <table class="centered">
      <thead>
        <tr>
          <th>NIVEL INSTRUCCIÓN</th>
          <th>INSTITUCIÓN EDUCATIVA</th>
          <th>TÍTULO OBTENIDO</th>
          <th>N. REGISTRO DEL SENESCYT</th>
          <th>ACCIÓN</th>
        </tr>
      </thead>

      <tbody class="tableContent">
        <?php
          if ($formal_education) {
            $row = '';
            for ($i=0; $i < count($formal_education); $i++) { 

              $fe = $education_level[$formal_education[$i][1]-1][1];
              if($fe === 'PRIMARIA' || $fe === 'SECUNDARIA'){
                $inst = null;
              }else{
                if($formal_education[$i][5]){
                  $inst = $formal_education[$i][5];
                }else{
                  $inst= $institution[$formal_education[$i][2]-1][1];
                }
              }
             
              $row.='<tr data-id="'.$formal_education[$i][0].'">'.
              '<td>'.$fe.'</td>'.
              '<td>'.$inst.'</td>'.
              '<td>'.$formal_education[$i][3].'</td>'.
              '<td>'.$formal_education[$i][4].'</td>'.
              '<td><a href="javascript:" class="delete"><i class="material-icons">delete</i></a><a  href="javascript:" class="edit"><i class="material-icons">edit</i></a></td>'.
              '</tr>';
            }
            echo $row;
            //'<td>'.$institution[$formal_education[$i][1]-1][1].'</td>'.
          }
        ?>
      </tbody>
    </table>
  </div>

</div>
