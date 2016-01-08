<!DOCTYPE html>
<html lang="es">
   
    
<?php include_once HEAD_U;?>


<body>

<main>
    <div class="center-align blue darken-4 z-depth-1">
      <img src="<?php echo URL;?>public/images/logo.png" alt="" class="circle responsive-img">
      <h5 class="center-align white-text light">ADMINISTRADOR - SELECCIÓN PERSONAL - CNEL</h5>
    </div>

<div class="row">
    <div class="container"></div>
</div>


<div class="row">
    <div class="col  s12 offset-m2 m8 offset-l4 l4 z-depth-1">
    <div class="container" style="padding-bottom:100px;">
      <p class="center-align"><i class="material-icons large">account_circle</i></p>
      	<div class="input-field">
		    <i class="material-icons prefix">person</i>
		    <input id="emai_cedu" type="text" class="validate">
		    <label for="emai_cedu">Usuario</label>
		</div>


        <div class="input-field">
		    <i class="material-icons prefix">vpn_key</i>
		    	<input id="passasp" type="password"  class="validate">
		        <label for="passasp">Password</label>
		</div>

		<div class="col l12 m12 s12 center-align">
			
			    <a class="waves-effect waves-light btn blue">Login</a>
			
			<br><br><br>
			        
		</div>


		

	</div>


	</div>
 </div>

</main>
<?php include_once SCRIPT_U;?>	

    

   
</body>
</html>
        