<!DOCTYPE html>
<html lang="es">

<?php include_once HEAD_U;?>

<style>

	@media only screen and (max-width: 992px){

		nav .nav-wrapper i{
			display:inline;
			font-size: 1.5 rem;
		}

		.table-of-contents a.active {
	    font-weight: 500;
	    padding-left: 18px;
	    border-left: 4px solid #0d47a1;
		}

		.table-of-contents a:hover{
			border-left: 1px solid #0d47a1;
		}

		
	}

	@media only screen and (min-width: 993px){
		.tabs .tab a {
	    	color: #0d47a1;
	    	text-transform: none;
	    	line-height: none;
	    }

	    .tabs .tab{
	    	line-height: normal;
	    }

	    .tabs .tab a:hover {
    		color: #2196f3;	    
		}

		.tabs .indicator {
		    background-color: #0d47a1;
		}

	
	.iconC{
		color: #0d47a1;
	}

}
select.browser-default {
    background-color: rgba(255,255,255,0.9);
    width: 145px;
    padding: 0 0 0 0; 
    border: none;
    border-radius: none; 
    height: inherit;
 }

 label.lll{
 	/*padding-top: 10px;*/
 	top:0px;
 }

 select{
 	margin-top: 20px;
 }

 .input-field{
 	margin-top: 0px;
 }

 select.browser-default{
 	border: 1px solid #000;
 }

 select:focus {
    outline: 2px solid #f44336;
 }
	
</style>

<body>

<?php include_once NAV_U;?>

<main>
<h5 class="center-align">Hoja de vida</h5>

<div class="row z-depth-1 hide-on-med-and-down fixed">
    <div class="col l12 m4 ">
      <ul class="tabs">
        <li class="tab"><a section="informacion-personal">
        	<i class="material-icons">account_box</i><br>Información personal</a></li>
        <li class="tab"><a section="datos-familiares">
        	<i class="material-icons">supervisor_account</i><br>Datos familiares</a></li>
        <li class="tab"><a section="instruccion-formal">
        	<i class="material-icons">school</i><br>Instrucción formal</a></li>
        <li class="tab"><a section="idiomas">
        	<i class="material-icons">language</i><br>Idiomas</a></li>
        <li class="tab"><a section="capacitacion">
        	<i class="material-icons">subject</i><br>Capacitación</a></li>
        <li class="tab"><a section="experiencia-laboral">
        	<i class="material-icons">work</i><br>Experiencia</a></li>
        <li class="tab"><a section="referencias-personales">
        	<i class="material-icons">contact_phone</i><br>Referencias personales</a></li>
      </ul>
    </div>
    
 </div>

 <div class="container z-depth-1" id="containerHV" >
</div>

  <div class="fixed-action-btn jSend" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">save</i>
    </a>
  </div>
   
</main>

<?php include_once SCRIPT_U;?>
<script>var URL = '<?=URL?>';</script>
<script src="<?=URL.'public/js/controllerAspirante.js'?>"></script>
</body>
</html>
        
