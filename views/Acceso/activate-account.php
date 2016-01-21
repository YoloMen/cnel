<?php
  $value =$this->data["STATUS"];

  switch ($value) {
    case 'OK':
      echo "Su cuenta ya se encuentra activa.<br>";
      echo "<a href=".URL.">Iniciar sesión</a>";
      return false;
    break;

    case 'INVALID':
      echo "ERROR: Access denied";
      return false;
    break;

    case 'INVALID-M':
      echo "Error<br>Lamentamos los inconvenientes. Por favor, contáctenos a <a hfred=\"mailto:jaimebusiness3@gmail.com\">Soporte</a>";
      return false;
    break;

    case 'FAIL':
      echo "No es posible verificar su cuenta. Por favor, intentelo más tarde...<br>Si el problema persiste, contáctenos a <a hfred=\"mailto:jaimebusiness3@gmail.com\">Soporte</a>";
      return false;
    break;
    
  }


?>
<!DOCTYPE html>
<html lang="es">     
<head>
     <meta charset="UTF-8"/>
     <title>TRABAJA - CNEL</title>
     <link type="text/css" rel="stylesheet" href="<?=URL?>public/materialize/0.97.1/css/materialize.min.css"  media="screen, projection"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="icon" type="image/png" href="<?=URL?>public/images/logo.png" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>

<style>

</style>

<body>

<main>

<div id="contentAccess" class="center-align">
  <div class="preloader-wrapper big active" id="preloader">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>

  <p></p>
  <h5>Verificando código...</h5>
  <input type="hidden" value="<?=$value?>">

</div>

</main>
<?php include_once SCRIPT_U;?>

<script>
$(function(){
  setTimeout(function(){ 
     configResponse();
  }, 2000);
});


function configResponse(){
  $("#preloader").slideUp();
  if($("input").val()==='SUCCESS'){
    var x = '<div class="preloader-wrapper small active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left">'+
        '<div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';
    $("p").append('<i class="material-icons large green-text">done</i>');
    $("h5").html('¡Su cuenta ha sido activada!');
    $("#contentAccess").append('<h6><i>Para acceder a su cuenta, debe iniciar sesión.</i> <br><br></h6><h6>'+x+'<br>Redirigiendo...</h6>');
    setTimeout(function(){ window.location.href = "<?=URL?>"; }, 3000);
  }

  if($("input").val()==='TIMEOUT'){

    $("p").append('<i class="material-icons large red-text">error</i>');
    $("h5").html('No es posible activar su cuenta');
    $("#contentAccess").append('<br><h6><i>Nota: Recuerde que el enlace de activación enviado a su correo electrónico <b>es válido sólo por 5 días desde su emisión.</b></i></h6><a href="<?=URL?>">Solicitar enlace de activación</a>');
  }

  //window.location.href = "<?=URL?>";
}


</script>	

</body>
</html>
        