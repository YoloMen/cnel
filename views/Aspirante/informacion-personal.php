<?php
$countries = $this->data['countries'];
$provinces = $this->data['provinces'];
$candidate = $this->data['candidate'];
$etnia = [
  'A' => 'Afroecuatoriano/Afrodescendiente',
  'B' =>'Blanco/a',
  'I' => 'Indígena',
  'M' => 'Mestizo/a',
  'O' => 'Montubio/a'
];

$tipo_sangre = ["A+","AB-","AB+","B-","B+","O-","O+"];

$estado_civil = [
  "D" => "DIVORCIADO (A)",
  "S" => "SOLTERO (A)",
  "U" => "UNION LIBRE",
  "V" => "VIUDO (A)"
];

$tipo_licencia = ["A","A1","B","C","C1","D","D1","E","E1","F","G"];


?>
<h5 class="center-align">Información personal</h5>

<form>
<div class="row">
  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">Información personal</h6>
  </div>

  <div class="row"></div>

  <div class="col l12 s12 s12">
    <div class="input-field col l3 m3 s12">
      <input id="IPCEDU" name="IPCEDU" type="text" maxlength="15" class="validate <?=$candidate["ASP_CEDU"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_CEDU"]?>'  required>
      <label class="<?=$candidate["ASP_CEDU"] ? 'active' : ''?>" for="IPCEDU">C.I/Pasaporte</label>
    </div>

    <div class="input-field offset-l1 col l3 m3 s6">
      <label class="lll">Etnia</label>
      <select name="IPETNI" class="browser-default" style="width:100px" required>
        <option value="">Seleccione</option>
        <?php
          foreach ($etnia as $key => $value) {
            $x = ($key == $candidate["ASP_ETNI"]) ? 'selected' : '' ;
            echo '<option value="'.$key.'"'. $x.' >'.$value.'</option>';
          }
        ?>
      </select>
    </div>

    <div class="col offset-m1 l5 m5 s6" >
        <h6>Eres ciudadano ecuatoriano de nacimiento<br>
          <input name="IPENAC" type="radio" id="ENAC1" />
          <label for="ENAC1">Si</label>
          <input name="IPENAC" type="radio" id="ENAC2" />
          <label for="ENAC2">No</label>
        </h6>
    </div>
  </div>

  <div class="col l6 m6 s12">
    <h6 class="center-align"><b>Apellidos</b></h6>
    <div class="input-field col l6 m6 s6">
      <input id="IPAPE1" name="IPAPE1" type="text" maxlength="20" class="validate <?=$candidate["ASP_APE1"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_APE1"]?>' required>
      <label class="<?=$candidate["ASP_APE1"] ? 'active' : ''?>" for="IPAPE1">Paterno</label>
    </div>
    <div class="input-field col l6 m6 s6">
      <input id="IPAPE2" name="IPAPE2" type="text" maxlength="20" class="validate <?=$candidate["ASP_APE2"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_APE2"]?>'>
      <label class="<?=$candidate["ASP_APE2"] ? 'active' : ''?>" for="IPAPE2">Materno</label>
    </div>
  </div>

  <div class="col l6 m6 s12">
    <h6 class="center-align"><b>Nombres</b></h6>
    <div class="input-field col l6 m6 s6">
      <input id="IPNOM1" name="IPNOM1" type="text" maxlength="20" class="validate <?=$candidate["ASP_NOM1"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_NOM1"]?>' required>
      <label class="<?=$candidate["ASP_NOM1"] ? 'active' : ''?>" for="IPNOM1">Primero</label>
    </div>
    <div class="input-field col l6 m6 s6">
      <input id="IPNOM2" name="IPNOM2" type="text" maxlength="20" class="validate <?=$candidate["ASP_NOM2"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_NOM2"]?>'>
      <label class="<?=$candidate["ASP_NOM2"] ? 'active' : ''?>" for="IPNOM2">Segundo</label>
    </div>
  </div>

  <div class="col l6 m6 s12">
    <h6 class="center-align"><b>Correo electrónico</b></h6>
    <div class="input-field col l6 m6 s6">
      <input id="IPEMAP" name="IPEMAP" type="email" maxlength="45" class="validate <?=$candidate["ASP_EMAP"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_EMAP"]?>' required>
      <label class="<?=$candidate["ASP_EMAP"] ? 'active' : ''?>" for="IPEMAP">Personal</label>
    </div>
    <div class="input-field col l6 m6 s6">
      <input id="IPEMAI" name="IPEMAI" type="email" maxlength="45" class="validate <?=$candidate["ASP_EMAI"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_EMAI"]?>'>
      <label class="<?=$candidate["ASP_EMAI"] ? 'active' : ''?>" for="IPEMAI">Institucional</label>
    </div>
  </div>

  <div class="col l6 m6 s12">
    <h6 class="center-align"><b>Lugar de nacimiento</b></h6>

    <div class="input-field col l4 m12 s12">
      <label class="lll">País</label>
        <select name="IPPAIS" id="IPPAIS" class="browser-default" style="width:100px">
          <option value="">Seleccione</option>
          <?php
          for ($i=0; $i < count($countries); $i++) { 
            echo '<option value="'.$countries[$i][0].'">'.$countries[$i][1].'</option>';
          }
          ?>
        </select>
    </div>

    <div class="input-field col l4 m6 s6">
      <label class="lll">Provincia</label>
      <select id="IPPROV" class="browser-default" required style="width:100px">
        <option value="">Seleccione</option>
          <?php
            for ($i=0; $i < count($provinces); $i++) { 
              echo '<option value="'.$provinces[$i][0].'">'.$provinces[$i][1].'</option>';
            }
          ?>
      </select>
    </div>

    <div class="input-field col l4 m6 s6">
      <label class="lll">Cantón</label>
      <select name="IPLOCN" id="IPLOCN" class="browser-default" required style="width:100px">
        <option value="">Seleccione</option>
      </select>
    </div>
  </div>

  <div class="row"></div>

  <div class="col l12 m12 s12">
    <div class="input-field col l3 m3 s6">                           
      <input id="IPFENA" name="IPFENA" type="text" class="validate <?=$candidate["ASP_FENA"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_FENA"]?>' placeholder="dd/mm/yyyy" required>
      <label class="active">Fecha nacimiento</label>
    </div>
    <div class="input-field col l3 m3 s6">
     <p id="EDAD"></p>
    </div>
    <!-- <div class="row s12" style="margin-bottom:0px;"></div>-->
    <div class="input-field col l2 m6 s12">
      <label class="lll">Género</label>
      <select name="IPGENE" class="browser-default" required style="width:100px">
        <option value="">Seleccione</option>
        <option value="M" <?=$candidate["ASP_GENE"]=="M" ? 'selected' : '' ?>>Masculino</option>
        <option value="F" <?=$candidate["ASP_GENE"]=="F" ? 'selected' : '' ?>>Femenino</option>
      </select>
    </div>

    <div class="input-field col l2 m3 s6">
      <label class="lll">Tipo de sangre</label>
      <select name="IPTISA" class="browser-default" required style="width:100px">
        <option value="">Seleccione</option>
        <?php
          for ($i=0; $i < count($tipo_sangre) ; $i++) {
            $x = ($tipo_sangre[$i] == $candidate["ASP_TISA"]) ? 'selected' : '' ; 
            echo '<option value="'.$tipo_sangre[$i].'"'. $x.' >'.$tipo_sangre[$i].'</option>';
          }
        ?>      
      </select>
    </div>

    <div class="input-field col l2 m3 s6">
      <label class="lll">Estado civil</label>
      <select name="IPESCI" class="browser-default" required style="width:100px">
        <option value="">Seleccione</option>
        <?php
          foreach ($estado_civil as $key => $value) {
            $x = ($key == $candidate["ASP_ESCI"]) ? 'selected' : '' ;
            echo '<option value="'.$key.'"'. $x.' >'.$value.'</option>';
          }
        ?>
      </select>
    </div>   
  </div>

  <div class="col l12 m12 s12">
    <div class="col l6 m3 s6 TLIC">
      <h6>Tienes licencia<br>
        <input name="IPTLIC" type="radio" id="TLIC1" />
        <label for="TLIC1">Si</label>
        <input name="IPTLIC" type="radio" id="TLIC2" />
        <label for="TLIC2">No</label>
      </h6>
    </div>

    <div class="input-field col l3 m3 s6 TILI" style="display:none;">
      <label class="lll">Tipo de licencia</label>
      <select name="IPTILI" id="IPTILI" class="browser-default" style="width:100px">
        <option value="">Seleccione</option>
        <?php
          for ($i=0; $i < count($tipo_licencia) ; $i++) {
            $x = ($key == $candidate["ASP_TILI"]) ? 'selected' : '' ; 
            echo '<option value="'.$tipo_licencia[$i].'"'. $x.' >'.$tipo_licencia[$i].'</option>';
          }
        ?>  
      </select>
    </div>
  
    <div class="input-field col offset-l2 l2 m3 s7">
      <input id="IPESTA" name="IPESTA" type="text" maxlength="15" class="validate <?=$candidate["ASP_ESTA"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_ESTA"]?>' required>
      <label class="<?=$candidate["ASP_ESTA"] ? 'active' : ''?>" for="IPESTA">Estatura (m)</label>
    </div>

    <div class="input-field col l2 m3 s5">
      <input id="IPPESO" name="IPPESO" type="text" maxlength="15" class="validate <?=$candidate["ASP_PESO"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_PESO"]?>' required>
      <label class="<?=$candidate["ASP_PESO"] ? 'active' : ''?>" for="IPPESO">Peso (Kg)</label>
    </div>
  </div>

  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">Dirección actual domicilio</h6>
  </div>

  <div class="col l12 m12 s12">
    <div class="input-field col offset-l3 l3 m4 s12">
      <label class="lll">Provincia</label>
        <select name="DDPROV" id="DDPROV" class="browser-default" style="width:100px" required>
          <option value="">Seleccione</option>
          <?php
            for ($i=0; $i < count($provinces); $i++) { 
              echo '<option value="'.$provinces[$i][0].'">'.$provinces[$i][1].'</option>';
            }
          ?>
        </select>
    </div>

    <div class="input-field col l3 m4 s6">
      <label class="lll">Cantón</label>
      <select name="DDCANT" id="DDCANT" class="browser-default" style="width:100px" required>
        <option value="">Seleccione</option>
      </select>
    </div>
    <div class="input-field col l3 m4 s6">
      <label class="lll">Parroquia</label>
      <select name="DDPARR" id="DDPARR" class="browser-default" style="width:100px" required>
        <option value="">Seleccione</option>
      </select>
    </div>
  </div>
  
  <div class="row"></div>

  <div class="col l12 m12 s12">
    <div class="input-field col l3 m4 s6">
      <input id="DDCAPR" name="DDCAPR" type="text" maxlength="75" class="validate"  value='' required>
      <label for="DDCAPR">Calle principal</label>
    </div>

    <div class="input-field col l3 m4 s6">
      <input id="DDCASE" name="DDCASE" type="text" maxlength="75" class="validate"  value=''>
      <label for="DDCASE">Calle Secundaria</label>
    </div>

    <div class="input-field col l4 m4 s6">
      <input id="DDSECT" name="DDSECT" type="text" maxlength="75" class="validate"  value='' required>
      <label for="DDSECT">Sector</label>
    </div>

    <div class="input-field col l2 m4 s6">
      <input id="DDNCAS" name="DDNCAS" type="text" maxlength="45" class="validate"  value=''>
      <label for="DDNCAS">N° de casa</label>
    </div>


    <div class="input-field col l3 m4 s6">
      <input id="DDREFE" name="DDREFE" type="text" maxlength="100" class="validate"  value='' required>
      <label for="DDREFE">Referencia</label>
    </div>

    <div class="input-field col l3 m4 s6">
      <input id="DDTEL1" name="DDTEL1" type="text" maxlength="15" class="validate"  value=''>
      <label for="DDTEL1">Telf. Convencional</label>
    </div>

    <div class="input-field col l4 m4 s6">
      <input id="DDTEL2" name="DDTEL2" type="text" maxlength="15" class="validate"  value='' required>
      <label for="DDTEL2">Telf. Celular</label>
    </div>

    <!--<div class="input-field col l2 m4 s6">
      <input id="DDTEL3" name="DDTEL3" type="text" maxlength="15" class="validate"  value=''>
      <label for="DDTEL3">Telf. Celular 2</label>
    </div>-->
  </div>

  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">PARTICIPACIÓN DE PERSONAS CON DISCAPACIDAD Y ENFERMEDADES CATASTRÓFICAS</h6>
  </div>

  <div class="col l12 m12 s12">
    <div class="col offset-l3 l6 m6 s6" >
      <h6 class="right-align">Tienes algún tipo de discapacidad</h6>
    </div>

    <div class="col l3 m6 s6" >
      <input name="DEDISC" type="radio" id="DEDISC1" />
      <label for="DEDISC1">Si</label>
      <input name="DEDISC" type="radio" id="DEDISC2" />
      <label for="DEDISC2">No</label>
    </div>

    <div class="row l12 m12 s12"></div>

    <div class="cDE" style="display:none;">

      <div class="input-field col l3 m3 s6 cSUST" style="display:none;">
        <label class="lll">Familiar</label>
        <select name="DESUST" id="DESUST" class="browser-default" style="width:110px">
          <option value="">Seleccione</option>
          <option value="CO">CONYUGE</option>
          <option value="HE">HERMANO/A</option>
          <option value="HI">HIJO/A</option>
          <option value="MA">MADRE</option>
          <option value="PA">PADRE</option>
          <option value="AB">ABUELO(A)</option>
        </select>
      </div>



      <div class="input-field col offset-l3 l2 m6 s6 cTIDI">
        <label class="lll">Discapacidad</label>
        <select name="DETIDI" id="DETIDI" class="browser-default" style="width:110px">
          <option value="" selected>Seleccione</option>
          <option value="A">AUDITIVA</option>
          <option value="F">FÍSICA</option>
          <option value="I">INTELECTUAL</option>
          <option value="L">LENGUAJE</option>
          <option value="M">MENTAL</option>
          <option value="P">PSICOLÓGICA</option>
          <option value="V">VISUAL</option>
          <option value="S">SUSTITUTO</option>
        </select>
      </div>
 
      <div class="input-field col offset-l1 l3 m3 s12">
        <input id="DECONA" name="DECONA" type="text" maxlength="45" class="validate"  value=''>
        <label for="DECONA">N° Carnet CONADIS</label>
      </div>

      <div class="input-field col l2 m3 s12">
        <input id="DEPORC" name="DEPORC" type="text" maxlength="3" class="validate"  value=''>
        <label for="DEPORC">% de discapacidad</label>
      </div>
    </div>

    <div class="row divider col l12"></div>
    
    <div class="col l6 m6 s6" >
       <h6 class="right-align">Tienes alguna enfermedad catastrófica</h6>
    </div>

    <div class="col l6 m6 s6">
      <input name="DEENCA" type="radio" id="DEENCA1" />
      <label for="DEENCA1">Si</label>
      <input name="DEENCA" type="radio" id="DEENCA2" />
      <label for="DEENCA2">No</label>
      </h6>
    </div>

    <div class="input-field col l6 m12 s12 cENFE" style="display:none;">
        <label class="lll">Tipo de enfermedad catastrófica</label>
        <select name="DEENFE" class="browser-default">
          <option value="">Seleccione</option>
          <option value="">ANEURISMA TORACO-ABDOMINALES</option>
          <option value="">CANCER (DE TODO TIPO)</option>
          <option value="">INSUFICIENCIA RENAL CRÓNICA</option>
          <option value="">MALFORMACIONES ARTERIOVENOSAS CEREBRALES</option>
          <option value="">MALFORMACIONES CONGÉNITAS DE CORAZÓN (DE CUALQUIER TIPO)</option>
          <option value="">SECUELAS DE QUEMADURAS GRAVES</option>
          <option value="">TRANSPLANTES DE ÓRGANOS (RIÑÓN, MEDULA ÓSEA, HÍGADO)</option>
          <option value="">TUMOR CEREBRAL (DE CUALQUIER TIPO)</option>
        </select>
    </div>
  </div>
</div> 

<input type="submit" id="subFORM" style="display:none;">
<input type="hidden" value="informacion-personal" name="ID">
</form>



