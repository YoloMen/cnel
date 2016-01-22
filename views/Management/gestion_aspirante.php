<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once HEAD_U; ?>
    </head>
    <body>

            <?php include_once MENU_F; ?>

    
           
              <div class="row ">
                <div class="container ">

                    <div class="col  s12  m12 l12 z-depth-1">
                        <div class="container " style="padding-bottom:100px;">
                            <div class="col l12 m12 s12 center-align ">
                                        <h5 class="blue-text text-darken-2">Poceso de Reclutamiento</h5>
                                    </div>
                            <br>
                            <br>
                            
                            <table class="striped highlight ">
                                <thead>

                                    <tr >
                                    <th data-field="id">#</th>
                                    <th data-field="id">Código</th>
                                    <th data-field="price">Nombre</th>
                                    <th data-field="name">Estado</th>
                                    <th data-field="date">Fecha Inicio</th>
                                    <th data-field="date">Fecha Fin</th>
                                    <th data-field="name"></th>


                                    </tr>
                                </thead>

                                <tbody id="">
<?php

foreach ($this->DATA['Concursos'] as $key => $value) {
  
echo' 
<tr class="center-align">
<td><i class="material-icons light-green-text text-accent-3 small ">label</i></td>
<td>'.$value[5].'</td>
<td>'.$value[1].'</td>
<td>Reclutamiento</td>
<td>'.$value[10].'</td>
<td>'.$value[11].'</td>

<td></td><td>

<a onclick="ver_concurso('.$value[0].')"> <i class="material-icons small">visibility</i></a>
&nbsp;  
<a onclick="reclutamiento('.$value[0].')"><i class="material-icons small" >input</i></a></td>
</tr>';
}
?>   

                                </tbody>
                            </table>
 
      
                           
                        </div>
                    </div>
                </div>
         </div>

<form action="<?php echo URL; ?>management/creaconcurso_1" method="POST"> 
<input type="hidden" name="IDCON_" id="IDCON_" value=""> 
<input type="submit" id="ejecutar" style="display: none;"> 
</form>

<form action="<?php echo URL; ?>management/reclutamiento" method="POST"> 
<input type="hidden" name="IDCON_" id="IDCON_" value=""> 
<input type="submit" id="reclutar" style="display: none;"> 
</form>

<?php include_once SCRIPT_U; ?> 

<?php include_once JSPDF ?>
<script src="<?=URL.'public/js/controllerGestionAspirante.js'?>"></script>
    </body>
    
</html>

