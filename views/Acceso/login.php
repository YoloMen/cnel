<div class="row">
   <h5 class="center-align light">Iniciar sesión</h5>
</div>

<form method="POST">
<div class="row">

    <div class="col  s12 offset-m2 m8 offset-l4 l4 z-depth-1">
    <div class="container" style="padding-bottom:100px;">
      <p class="center-align"><i class="material-icons large" id="accountCircle">account_circle</i></p>
      <div id="contentLogin">
      	<div class="input-field">
		    <i class="material-icons prefix">person</i>
		    <input name="email" id="email" type="email" maxlength="50" class="validate" required>
		    <label for="email">Correo electrónico</label>
		</div>


        <div class="input-field">
		    <i class="material-icons prefix">vpn_key</i>
	    	<input name="password" id="password" type="password" maxlength="45" class="validate" required>
	        <label for="password">Contraseña</label>
		</div>

		<div class="col l12 m12 s12">
			<div class="col l8 m8 s7">
			    <a class="bindAction" href="javascript:" section="restore-password">¿Ha olvidado su contraseña?</a>
			</div>

			<div class="col l4 m4 s5">
			    <a class="waves-effect waves-light btn blue send">Iniciar</a>
			</div>
			<br><br><br>	     
		</div>

		<div class="col l12 m12 s12">
			<div class="row">
			    <div class="divider gray"></div>
			</div>
            <a class="bindAction" href="javascript:" section="register"><h6 class="center-align">Crear una nueva cuenta</h6></a>        
		</div>
		</di>   
	</div>

	</div>
 </div>

	<input type="submit" id="subFORM" style="display:none;">
	<input type="hidden" value="login" name="ID">
</form>
  
        