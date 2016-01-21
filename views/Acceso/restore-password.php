<div class="row">
  <h5 class="center-align light">Restablecer contraseña</h5>
</div>

<form method="POST">
<div class="row">
  <div class="col  s12 offset-m1 m10 offset-l3 l6 z-depth-1">
    <div class="container" style="padding-bottom:100px;">
      <p class="center-align"><i class="material-icons medium">email</i></p> 
      
      <div id="contentRP">
        <div class="col l12 m12 s12">
          <div class="input-field">
            <input name="email" id="email" type="email" maxtlength="50" class="validate" required>
            <label for="email">Correo electrónico</label>
          </div>    
        </div>

        <div class="center-align col l12 m12 s12">
          <a class="waves-effect waves-light btn blue send">Restablecer Contraseña</a>
          <br><br><br>
        </div>
      </div>

      <div class="col l12 m12 s12 center-align">
        <div class="row"><div class="divider"></div></div>
        <a class="bindAction" href="javascript:" section="login"><i class="material-icons tiny">chevron_left</i>&nbsp;Iniciar sesión</h6></a>        
      </div>	    
	  </div>
	</div>
</div>
  <input type="submit" id="subFORM" style="display:none;">
  <input type="hidden" value="restore-password" name="ID">
</form>


