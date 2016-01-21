<?php
  $pr = $this->data['personal_references'];
?>
<h5 class="center-align">Referencias personales</h5>

  
<div class="row">
  <form>
    <div class="col l12 m12 s12">
      <h6 class="center-align red white-text">*&nbsp;Referencia 1</h6>
    </div>
    
    <div class="row"></div>

    <div class="col l12 m12 s12">
      <div class="input-field col l3 m3 s6">
        <input id="RPR1AP" name="RPR1AP" type="text" maxlength="50" class="validate <?=$pr["ASP_R1AP"] ? 'valid' : '' ?>"  value='<?=$pr["ASP_R1AP"]?>' required>
        <label class="<?=$pr["ASP_R1AP"] ? 'active' : ''?>" for="RPR1AP">Apellidos</label>
      </div>

      <div class="input-field col l3 m3 s6">
        <input id="RPR1NO" name="RPR1NO" type="text" maxlength="50" class="validate <?=$pr["ASP_R1NO"] ? 'valid' : '' ?>"  value='<?=$pr["ASP_R1NO"]?>' required>
        <label class="<?=$pr["ASP_R1NO"] ? 'active' : ''?>" for="RPR1NO">Nombres</label>
      </div>

      <div class="input-field col l3 m3 s6">
        <input id="RPR1TE" name="RPR1TE" type="text" maxlength="15" class="validate <?=$pr["ASP_R1TE"] ? 'valid' : '' ?>"  value='<?=$pr["ASP_R1TE"]?>' required>
        <label class="<?=$pr["ASP_R1TE"] ? 'active' : ''?>" for="RPR1TE">Teléfono</label>
      </div>

      <div class="input-field col l3 m3 s6">
        <input id="RPR1CO" name="RPR1CO" type="email" maxlength="50" class="validate <?=$pr["ASP_R1CO"] ? 'valid' : '' ?>"  value='<?=$pr["ASP_R1CO"]?>'  required>
        <label class="<?=$pr["ASP_R1CO"] ? 'active' : ''?>" for="RPR1CO">Correo electrónico</label>
      </div>

    </div>


    <div class="col l12 m12 s12">
      <h6 class="center-align red white-text">*&nbsp;Referencia 2</h6>
    </div>
  
  <div class="row"></div>
    <div class="col l12 m12 s12">
      <div class="input-field col l3 m3 s6">
        <input id="RPR2AP" name="RPR2AP" type="text" maxlength="50" class="validate <?=$pr["ASP_R2AP"] ? 'valid' : '' ?>"  value='<?=$pr["ASP_R2AP"]?>'  required>
        <label class="<?=$pr["ASP_R2AP"] ? 'active' : ''?>" for="RPR2AP">Apellidos</label>
      </div>

      <div class="input-field col l3 m3 s6">
        <input id="RPR2NO" name="RPR2NO" type="text" maxlength="50" class="validate <?=$pr["ASP_R2NO"] ? 'valid' : '' ?>"  value='<?=$pr["ASP_R2NO"]?>'  required>
        <label class="<?=$pr["ASP_R2NO"] ? 'active' : ''?>" for="RPR2NO">Nombres</label>
      </div>

      <div class="input-field col l3 m3 s6">
        <input id="RPR2TE" name="RPR2TE" type="text" maxlength="25" class="validate <?=$pr["ASP_R2TE"] ? 'valid' : '' ?>"  value='<?=$pr["ASP_R2TE"]?>'  required>
        <label class="<?=$pr["ASP_R2TE"] ? 'active' : ''?>" for="RPR2TE">Teléfono</label>
      </div>

      <div class="input-field col l3 m3 s6">
        <input id="RPR2CO" name="RPR2CO" type="email" maxlength="50" class="validate <?=$pr["ASP_R2CO"] ? 'valid' : '' ?>"  value='<?=$pr["ASP_R2CO"]?>'  required>
        <label class="<?=$pr["ASP_R2CO"] ? 'active' : ''?>" for="RPR2CO">Correo electrónico</label>
      </div>

    </div>


  <input type="submit" id="subFORM" style="display:none;">
  <input type="hidden" value="referencias-personales" name="ID">
  </form>


</div>


