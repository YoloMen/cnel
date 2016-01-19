<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once HEAD_F; ?>
        <?php include_once CALENDAR; ?>
    </head>
    <body>
        <header>

            <?php include_once MENU_F; ?>

        </header>
        <main>
            <div class="center-align blue darken-4 z-depth-1">
                <img src="<?php echo URL; ?>public/images/logo.png" alt="" class="circle responsive-img">
                <h5 class="center-align white-text light">ADMINISTRADOR PERSONAL - CNEL</h5>
            </div>
            <div class="row ">
                <div class="container ">
                    <button class="btn waves-effect waves-light" type="submit" name="action" onclick="location.href='<?php echo URL; ?>management/creaconcurso_1';">Crear
                        <i class="material-icons right">send</i>
                    </button>
                    <button class="btn waves-effect waves-light" type="submit" name="action" onclick="location.href='<?php echo URL; ?>management/calendario';">Calendario
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
           
            <div class="row ">
                <div class="container ">

                    <div class="col  s12  m12 l12 z-depth-1">
                        <div class="container " style="padding-bottom:100px;">

                            <br>
                            <br>
                            
                            <table class="striped highlight ">
                                <thead>

                                    <tr >
                                    <th data-field="id">#</th>
                                    <th data-field="id">Código</th>
                                    <th data-field="price">Nombre</th>
                                    <th data-field="date">Fecha Inicio</th>
                                    <th data-field="date">Fecha Fin</th>
                                    <th data-field="name">Estado</th>
                                    <th data-field="name"></th>


                                    </tr>
                                </thead>

                                <tbody id="">
<?php
var_dump($this->DATA);
foreach ($this->DATA['Concursos'] as $key => $value) {
  
 
  switch ($value[12]) {

      case 'C':
          $colorlbl='blue-text text-darken-3';
          $estado='Creado';
          break;
      case 'I':
          $colorlbl='light-green-text text-accent-3';
          $estado='Inicializado';
          break;
      case 'P':
          $colorlbl='orange-text text-darken-4';
          $estado='En proceso';
          break; 
      case 'F':
          $colorlbl='red-text text-accent-4';
          $estado='Finalizado';
          break; 
      default:
          $colorlbl="";
          break;
  }
 
   echo' 
<tr class="center-align">
<td><i class="material-icons '. $colorlbl.' small ">label</i></td>
<td>'.$value[5].'</td>
<td>'.$value[1].'</td>
<td>'.$value[10].'</td>
<td>'.$value[11].'</td>
<td>'. $estado.'</td>
<td></td><td>
<a onclick="ejecuta_boton('.$value[0].')"> <i class="material-icons small">open_in_new</i></a>
<a onclick="eliminar_fase_concurso('.$value[12].')"><i class="material-icons small" >delete</i></a></td>
</tr>';
}
?>   

                                </tbody>
                            </table>
 
      
                           
                        </div>
                    </div>
                </div>
         </div>
        </main>   

<form action="<?php echo URL; ?>management/creaconcurso_1" method="POST"> 
<input type="hidden" name="IDCON_" id="IDCON_" value=""> 
<input type="submit" id="ejecutar" style="display: none;"> 
</form>


<?php include_once SCRIPT_U; ?> 
<?php include_once SCRIPT_F; ?>
    </body>
    <script src="<?php echo URL; ?>/public/js/globalJS.js"></script>
<script type="text/javascript">
//Post Editar
    function ejecuta_boton(id)
    {
        $("#IDCON_").val(id); 
        $("#ejecutar").trigger("click");
    }
</script>
</html>
