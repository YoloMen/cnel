<!DOCTYPE html>
<html lang="es">
       
<?php include_once HEAD_U;?>

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

<div id="contentAccess">
    
</div>

</main>
<?php include_once SCRIPT_U;?>	
<script>var URL = '<?=URL?>';</script>
<script src="<?=URL.'public/js/controllerAccess.js'?>"></script>


</body>
</html>
        