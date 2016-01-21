<?php

  $id = $this->data["id"];
  $token = $this->data["token"];

?>

<!DOCTYPE html>
<html lang="es">
       
<head>
     <meta charset="UTF-8"/>
     <title>TRABAJA - CNEL</title>
     <link type="text/css" rel="stylesheet" href="<?=URL?>public/materialize/0.97.1/css/materialize.min.css"  media="screen, projection"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="icon" type="image/png" href="<?=URL?>public/images/logo.png" />
     <!--<link type="text/css" rel="stylesheet" href="materialize/css/stylePrint.css" media="print"/>-->
     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>

<style>

  .input-field input[type=text]:focus + label, .input-field input[type=password]:focus + label, .input-field input[type=email]:focus + label, .input-field input[type=number]:focus + label  {
   color: #2196F3;
  }

  .input-field .prefix.active {
   color: #2196F3;
  }

  .input-field input[type=text]:focus, .input-field input[type=password]:focus, .input-field input[type=email]:focus, .input-field input[type=number]:focus {
   border-bottom: 1px solid #2196F3;
   box-shadow: 0 1px 0 0 #2196F3;
  }

</style>

<body>

<main>
  <div class="center-align z-depth-1">
    <img src="<?php echo URL;?>public/images/logo.png" class="responsive-img">
    <h6 class="center-align blue-text text-darken-4">Trabaja con nosostros</h6>
  </div>



<div class="row">
  <h5 class="center-align light">Restablecer contraseña</h5>
</div>

<form method="POST">
<div class="row">
  <div class="col  s12 offset-m1 m10 offset-l3 l6 z-depth-1">
    <div class="container" style="padding-bottom:100px;" id="contentAccess">
      <p class="center-align"><i class="material-icons medium">vpn_key</i></p> 
      <div class="col l12 m12 s12">
        <div class="input-field col l6 m6 s12">
          <input name="pass1" id="pass1" type="password" maxtlength="50" class="validate" required 
            title="Mínimo 8 caracteres al menos 1 Alfabeto y 1 Número:" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
          <label for="pass1">Elija una contraseña</label>
        </div>

        <div class="input-field col l6 m6 s12">
          <input name="pass2" id="pass2" type="password" maxtlength="50" class="validate" required 
            title="Mínimo 8 caracteres al menos 1 Alfabeto y 1 Número:" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
          <label for="pass2">Confirmar contraseña</label>
        </div>    

      </div>

      <div class="center-align col l12 m12 s12">
        <a class="waves-effect waves-light btn blue send">Cambiar Contraseña</a>
        <br><br><br>
      </div>
      
    </div>
  </div>
</div>
  <input type="submit" id="subFORM" style="display:none;">
<input type="hidden" value="<?=$id?>" name="id">
<input type="hidden" value="<?=$token?>" name="token">
  <input type="hidden" value="3d3064e3a080ad90951a3ab500c9026e13e68858" name="service">
</form>




</main>
<?php include_once SCRIPT_U;?>	
<script>var URL = '<?=URL?>';</script>
<script src="<?=URL.'public/js/controllerRestorePass.js'?>"></script>


</body>
</html>
        