<?php
$canton_birth = $this->data['canton_birth'];
$canton_home = $this->data['canton_home'];
$countries = $this->data['countries'];
$provinces = $this->data['provinces'];
$parish_home = $this->data['parish_home'];

$candidate = $this->data['candidate'];
$catastrophic_illness = $this->data['catastrophic_illness'];
$disability = $this->data['disability'];
$family_type = $this->data['family_type'];

$disability_candidate = $this->data['disability_candidate'];

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
      <select name="IPETNI" class="browser-default selectS" required>
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
      <input id="IPEMAP" type="email" maxlength="50" class="validate <?=$candidate["ASP_EMAP"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_EMAP"]?>' disabled>
      <label class="<?=$candidate["ASP_EMAP"] ? 'active' : ''?>" for="IPEMAP">Personal</label>
    </div>
    <div class="input-field col l6 m6 s6">
      <input id="IPEMAI" name="IPEMAI" type="email" maxlength="50" class="validate <?=$candidate["ASP_EMAI"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_EMAI"]?>'>
      <label class="<?=$candidate["ASP_EMAI"] ? 'active' : ''?>" for="IPEMAI">Institucional</label>
    </div>
  </div>

  <div class="col l6 m6 s12">
    <h6 class="center-align"><b>Lugar de nacimiento</b></h6>

    <div class="input-field col l4 m12 s12">
      <label class="lll">País</label>
        <select name="IPPAIS" id="IPPAIS" class="triggerI browser-default selectS" required>
          <option value="">Seleccione</option>
          <?php
          for ($i=0; $i < count($countries); $i++) {
            $x = ($countries[$i][0] == $candidate["ASP_COUN"]) ? 'selected' : '' ; 
            echo '<option value="'.$countries[$i][0].'"'. $x.' >'.$countries[$i][1].'</option>';
          }
          ?>
        </select>
    </div>

    <div class="input-field col l4 m6 s6">
      <label class="lll">Provincia</label>
      <select id="IPPROV" class="browser-default selectS" required>
        <option value="">Seleccione</option>
          <?php
            for ($i=0; $i < count($provinces); $i++) { 
              $x = ($provinces[$i][0] == $candidate["ASP_PRON"]) ? 'selected' : '' ;
              echo '<option value="'.$provinces[$i][0].'"'. $x.' >'.$provinces[$i][1].'</option>';
            }
          ?>
      </select>
    </div>

    <div class="input-field col l4 m6 s6">
      <label class="lll">Cantón</label>
      <select name="IPLOCN" id="IPLOCN" class="browser-default selectS" required>
        <option value="">Seleccione</option>
        <?php
          if($canton_birth){
            for ($i=0; $i < count($canton_birth); $i++) { 
              $x = ($canton_birth[$i][0] == $candidate["ASP_FK_LOCN"]) ? 'selected' : '' ;
              echo '<option value="'.$canton_birth[$i][0].'"'. $x.' >'.$canton_birth[$i][1].'</option>';
            }
          }
        ?>
      </select>
    </div>
  </div>

  <div class="row"></div>

  <div class="col l12 m12 s12">
    <div class="input-field col l3 m3 s6">                           
      <input id="IPFENA" name="IPFENA" type="text" class="triggerI validate <?=$candidate["ASP_FENA"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_FENA"]?>' placeholder="dd/mm/yyyy" required>
      <label class="active">Fecha nacimiento</label>
    </div>
    <div class="input-field col l3 m3 s6">
     <p id="EDAD"></p>
    </div>
    <!-- <div class="row s12" style="margin-bottom:0px;"></div>-->
    <div class="input-field col l2 m6 s12">
      <label class="lll">Género</label>
      <select name="IPGENE" class="browser-default selectS" required>
        <option value="">Seleccione</option>
        <option value="M" <?=$candidate["ASP_GENE"]=="M" ? 'selected' : '' ?>>Masculino</option>
        <option value="F" <?=$candidate["ASP_GENE"]=="F" ? 'selected' : '' ?>>Femenino</option>
      </select>
    </div>

    <div class="input-field col l2 m3 s6">
      <label class="lll">Tipo de sangre</label>
      <select name="IPTISA" class="browser-default selectS" required>
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
      <select name="IPESCI" class="browser-default selectS" required>
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
    <div class="col m3 s6 <?=$candidate["ASP_TILI"] ? 'l3' : 'l6'?> TLIC">
      <h6>Tienes licencia<br>
        <input name="IPTLIC" type="radio" id="TLIC1" value="S" <?=$candidate["ASP_TILI"] ? 'checked' : ''?>/>
        <label for="TLIC1">Si</label>
        <input name="IPTLIC" type="radio" id="TLIC2" value="N" <?=!$candidate["ASP_TILI"] ? 'checked' : ''?>/>
        <label for="TLIC2">No</label>
      </h6>
    </div>

    <div class="input-field col l3 m3 s6 TILI" <?=!$candidate["ASP_TILI"] ? 'style="display:none;"' : ''?>>
      <label class="lll">Tipo de licencia</label>
      <select name="IPTILI" id="IPTILI" class="browser-default selectS">
        <option value="">Seleccione</option>
        <?php
          for ($i=0; $i < count($tipo_licencia) ; $i++) {
            $x = ($tipo_licencia[$i] == $candidate["ASP_TILI"]) ? 'selected' : '' ; 
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
        <select name="DDPROV" id="DDPROV" class="browser-default selectS" required>
          <option value="">Seleccione</option>
          <?php
            for ($i=0; $i < count($provinces); $i++) {
            $x = ($provinces[$i][0] == $candidate["ASP_PARD"]) ? 'selected' : '' ; 
              echo '<option value="'.$provinces[$i][0].'"'. $x.' >'.$provinces[$i][1].'</option>';
            }
          ?>
        </select>
    </div>

    <div class="input-field col l3 m4 s6">
      <label class="lll">Cantón</label>
      <select name="DDCANT" id="DDCANT" class="browser-default selectS" required>
        <option value="">Seleccione</option>
        <?php
          if($canton_home){
            for ($i=0; $i < count($canton_home); $i++) { 
              $x = ($canton_home[$i][0] == $candidate["ASP_CAND"]) ? 'selected' : '' ;
              echo '<option value="'.$canton_home[$i][0].'"'. $x.' >'.$canton_home[$i][1].'</option>';
            }
          }
        ?>
      </select>
    </div>
    <div class="input-field col l3 m4 s6">
      <label class="lll">Parroquia</label>
      <select name="DDPARR" id="DDPARR" class="browser-default selectS" required>
        <option value="">Seleccione</option>
        <?php
          if($parish_home){
            for ($i=0; $i < count($parish_home); $i++) { 
              $x = ($parish_home[$i][0] == $candidate["ASP_FK_LOCD"]) ? 'selected' : '' ;
              echo '<option value="'.$parish_home[$i][0].'"'. $x.' >'.$parish_home[$i][1].'</option>';
            }
          }
        ?>
      </select>
    </div>
  </div>
  
  <div class="row"></div>

  <div class="col l12 m12 s12">
    <div class="input-field col l3 m4 s6">
      <input id="DDCAPR" name="DDCAPR" type="text" maxlength="75" class="validate <?=$candidate["ASP_CAPR"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_CAPR"]?>' required>
      <label class="<?=$candidate["ASP_CAPR"] ? 'active' : ''?>" for="DDCAPR">Calle principal</label>
    </div>

    <div class="input-field col l3 m4 s6">
      <input id="DDCASE" name="DDCASE" type="text" maxlength="75" class="validate <?=$candidate["ASP_CASE"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_CASE"]?>'>
      <label class="<?=$candidate["ASP_CASE"] ? 'active' : ''?>" for="DDCASE">Calle Secundaria</label>
    </div>

    <div class="input-field col l4 m4 s6">
      <input id="DDSECT" name="DDSECT" type="text" maxlength="75" class="validate <?=$candidate["ASP_SECT"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_SECT"]?>' required>
      <label class="<?=$candidate["ASP_SECT"] ? 'active' : ''?>" for="DDSECT">Sector</label>
    </div>

    <div class="input-field col l2 m4 s6">
      <input id="DDNCAS" name="DDNCAS" type="text" maxlength="45" class="validate <?=$candidate["ASP_NCAS"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_NCAS"]?>'>
      <label class="<?=$candidate["ASP_NCAS"] ? 'active' : ''?>" for="DDNCAS">N° de casa</label>
    </div>


    <div class="input-field col l3 m4 s6">
      <input id="DDREFE" name="DDREFE" type="text" maxlength="100" class="validate <?=$candidate["ASP_REFE"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_REFE"]?>' required>
      <label class="<?=$candidate["ASP_REFE"] ? 'active' : ''?>" for="DDREFE">Referencia</label>
    </div>

    <div class="input-field col l3 m4 s6">
      <input id="DDTEL1" name="DDTEL1" type="text" maxlength="15" class="validate <?=$candidate["ASP_TEL1"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_TEL1"]?>'>
      <label class="<?=$candidate["ASP_TEL1"] ? 'active' : ''?>" for="DDTEL1">Telf. Convencional</label>
    </div>

    <div class="input-field col l4 m4 s6">
      <input id="DDTEL2" name="DDTEL2" type="text" maxlength="15" class="validate <?=$candidate["ASP_TEL2"] ? 'valid' : '' ?>"  value='<?=$candidate["ASP_TEL2"]?>' required>
      <label class="<?=$candidate["ASP_TEL2"] ? 'active' : ''?>" for="DDTEL2">Telf. Celular</label>
    </div>
  </div>

  <div class="col l12 m12 s12">
    <h6 class="center-align red white-text">Participación de personas con Discapacidad y Enfermedades Catastróficas</h6>
  </div>

  <div class="col l12 m12 s12">
    <div class="col offset-l3 l6 m6 s6" >
      <h6 class="right-align">Tienes algún tipo de discapacidad</h6>
    </div>

    <div class="col l3 m6 s6" >
      <input name="DEDISC" type="radio" id="DEDISC1" value="S" <?=$disability_candidate["ADI_FK_TIDI"] ? 'checked' : ''?>/>
      <label for="DEDISC1">Si</label>
      <input name="DEDISC" type="radio" id="DEDISC2" <?=!$disability_candidate["ADI_FK_TIDI"] ? 'value="N" checked' : 'value=":N"'?>/>
      <label for="DEDISC2">No</label>
    </div>


    <div class="row l12 m12 s12"></div>

    <div class="cDE" <?=!$disability_candidate["ADI_FK_TIDI"] ? 'style="display:none;"' : ''?>>

      <div class="input-field col l3 m3 s6 cSUST" <?=!$disability_candidate["ADI_FK_TIFA"] ? 'style="display:none;"' : ''?>>
        <label class="lll">Familiar</label>
        <select name="DESUST" id="DESUST" class="browser-default" style="width:110px">
          <option value="">Seleccione</option>
          <?php
            for ($i=0; $i < count($family_type); $i++) { 
              $x = ($family_type[$i][0] == $disability_candidate["ADI_FK_TIFA"]) ? 'selected' : '' ; 
              echo '<option value="'.$family_type[$i][0].'" '.$x.'>'.$family_type[$i][1].'</option>';
            }
          ?>
        </select>
      </div>

      <div class="input-field col l2 <?=!$disability_candidate["ADI_FK_TIFA"] ? 'offset-l3 m6 s6' : 'm3 s6'?> cTIDI">
        <label class="lll">Discapacidad</label>
        <select name="DETIDI" id="DETIDI" class="browser-default" style="width:110px">
          <option value="">Seleccione</option>
          <?php
            for ($i=0; $i < count($disability); $i++) { 
              $x = ($disability[$i][0] == $disability_candidate["ADI_FK_TIDI"]) ? 'selected' : '' ; 
              echo '<option value="'.$disability[$i][0].'" '.$x.'>'.$disability[$i][1].'</option>';
            }
          ?>
        </select>
      </div>
 
      <div class="input-field col offset-l1 l3 m3 s12">
        <input id="DECONA" name="DECONA" type="text" maxlength="45" class="validate <?=$disability_candidate["ADI_CONA"] ? 'valid' : '' ?>"  <?=$disability_candidate["ADI_CONA"] ? 'value="'.$disability_candidate["ADI_CONA"].'"' : 'value=""' ?>>
        <label class="<?=$disability_candidate["ADI_CONA"] ? 'active' : ''?>" for="DECONA">N° Carnet CONADIS</label>
      </div>

      <div class="input-field col l2 m3 s12">
        <input id="DEPORC" name="DEPORC" type="text" maxlength="3" class="validate <?=$disability_candidate["ADI_PORC"] ? 'valid' : '' ?>"  <?=$disability_candidate["ADI_PORC"] ? 'value="'.$disability_candidate["ADI_PORC"].'"' : 'value=""' ?>>
        <label class="<?=$disability_candidate["ADI_PORC"] ? 'active' : ''?>" for="DEPORC">% de discapacidad</label>
      </div>
    </div>

    <div class="row divider col l12"></div>
    
    <div class="col l6 m6 s6" >
       <h6 class="right-align">Tienes alguna enfermedad catastrófica</h6>
    </div>

    <div class="col l6 m6 s6">
      <input name="DEENCA" type="radio" id="DEENCA1" value="S" <?=$candidate["ASP_FK_ENCA"] ? ' checked' : ''?>/>
      <label for="DEENCA1">Si</label>
      <input name="DEENCA" type="radio" id="DEENCA2" value="N" <?=!$candidate["ASP_FK_ENCA"] ? 'checked' : ''?>/>
      <label for="DEENCA2">No</label>
      </h6>
    </div>

    <div class="input-field col l6 m12 s12 cENFE" <?=!$candidate["ASP_FK_ENCA"] ? 'style="display:none;"' : ''?>>
        <label class="lll">Tipo de enfermedad catastrófica</label>
        <select name="DEENFE" id="DEENFE" class="browser-default">
          <option value="">Seleccione</option>
          <?php
            for ($i=0; $i < count($catastrophic_illness); $i++) { 
              $x = ($catastrophic_illness[$i][0] == $candidate["ASP_FK_ENCA"]) ? 'selected' : '' ; 
              echo '<option value="'.$catastrophic_illness[$i][0].'" '.$x.'>'.$catastrophic_illness[$i][1].'</option>';
            }
          ?>
        </select>
    </div>
  </div>
</div> 


<input type="submit" id="subFORM" style="display:none;">
<input type="hidden" value="informacion-personal" name="ID">
</form>



