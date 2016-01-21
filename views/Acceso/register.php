<div class="row">
    <h5 class="center-align light" id="title">Regístrate</h5>
</div>

<form method="POST">
<div class="row">
  <div class="col s12 offset-m2 m8 offset-l4 l4 z-depth-1" id="contentM">
    <div class="container" style="padding-bottom:100px;" id="contentRegister">
      <p class="center-align"><i class="material-icons large">account_circle</i></p>
        <div class="col l12 m12 s12">
          <div class="input-field"> 
    		    <input name="email" id="email" type="email" maxtlength="50" class="validate" required>
    		    <label for="email">Correo electrónico</label>
  	      </div>    
        </div>

        <div class="col l12 m12 s12">
          <div class="input-field">
            <input name="password1" id="password1" type="password" maxtlength="50" class="validate" required 
            title="Mínimo 8 caracteres al menos 1 Alfabeto y 1 Número:" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
  	        <label for="password1">Elija una contraseña</label>
          </div>    
        </div>

        <div class="col l12 m12 s12">
          <div class="input-field">
    		    <input name="password2" id="password2" type="password" maxtlength="50" class="validate" required 
            title="Mínimo 8 caracteres al menos 1 Alfabeto y 1 Número:" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
    		    <label for="password2">Confirmar contraseña</label>
  	      </div>        
        </div>

        <div class="center-align col l12 m12 s12">        
          <div class="g-recaptcha" data-sitekey="6Ldc7hQTAAAAAHsjSCzinkQVuZykQRPjel_qaWE2"></div>
        </div>

        <div class="center-align col l12 m12 s12">
          <br>       
          <a class="waves-effect waves-light btn blue send">Registrarse</a>
          <br><br>
        </div>
        
        <div class="col l12 m12 s12 center-align">
          <div class="row"><div class="divider"></div></div>
          <a class="bindAction" href="javascript:" section="login"><i class="material-icons tiny">chevron_left</i>&nbsp;Iniciar sesión</h6></a>        
        </div>
     </div>

	</div>
 </div>

  <input type="submit" id="subFORM" style="display:none;">
  <input type="hidden" value="register" name="ID">
</form>



