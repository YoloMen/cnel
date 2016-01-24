<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once HEAD_U; ?>
        <?php include_once CALENDAR; ?>
    </head>
    <body>
          <?php include_once MENU_F; ?>
            <div class="row ">
                <div class="container ">
                    <button class="btn waves-effect waves-light" type="submit" name="action" onclick="location.href='<?php echo URL; ?>management/creaconcurso';">Crear
                        <i class="material-icons right">send</i>
                    </button>
                    <button class="btn waves-effect waves-light" type="submit" name="action" onclick="location.href='<?php echo URL; ?>management/calendario';">Calendario
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
           
   <br>
        <div class="row ">
                <div class="col  s12  m12 l12 ">
                    <div class="container z-depth-1" style="padding: 10px;">
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

                            <tbody >
<?php
//var_dump($this->DATA);
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

<a onclick="concursoPDF('.$value[0].')"> <i class="material-icons small">visibility</i></a>
<a onclick="ejecuta_boton('.$value[0].')"> <i class="material-icons small">open_in_new</i></a>
<a onclick="eliminar_fase_concurso('.$value[12].')"><i class="material-icons small" >input</i></a></td>
</tr>';
}
?>   

                            </tbody>
                        </table>
                    </div>
                </div>
        </div> 

<form action="<?php echo URL; ?>management/creaconcurso" method="POST"> 
<input type="hidden" name="IDCON_" id="IDCON_" value=""> 
<input type="submit" id="ejecutar" style="display: none;"> 
</form>

  <!-- Modal Trabajo -->
  <iframe id="showconcuro" class="modal " frameborder="0" width="100%" height="900"></iframe>


</body>
<?php include_once SCRIPT_U; ?> 

<script src="<?php echo URL; ?>/public/js/globalJS.js"></script>
<?php include_once JSPDF ?>
<script type="text/javascript">
 
  $( document ).ready(function(){
             $(".button-collapse").sideNav();
             $("#mconcursos").attr("class","active");
  })



  function concursoPDF(id)
  {
     fajax({'IDCON_' : id}, '<?php echo URL; ?>/management/get_concursobyID', get_concursoPDF);
   
  }

  function get_concursoPDF(response)
  {
    var obj = JSON.parse(response);
    console.log(response);
   var pdf = new jsPDF('p','in','letter')
  , sizes = [12, 16, 20]
  , fonts = [['Times','Roman'],['Helvetica',''], ['Times','Italic']]
  , font, size, lines
  , margin = 0.5 // inches on a 8.5 x 11 inch sheet.
  , verticalOffset = margin
  , loremipsum = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id eros turpis. Vivamus tempor urna vitae sapien mollis molestie. Vestibulum in lectus non enim bibendum laoreet at at libero. Etiam malesuada erat sed sem blandit in varius orci porttitor. Sed at sapien urna. Fusce augue ipsum, molestie et adipiscing at, varius quis enim. Morbi sed magna est, vel vestibulum urna. Sed tempor ipsum vel mi pretium at elementum urna tempor. Nulla faucibus consectetur felis, elementum venenatis mi mollis gravida. Aliquam mi ante, accumsan eu tempus vitae, viverra quis justo.\n\nProin feugiat augue in augue rhoncus eu cursus tellus laoreet. Pellentesque eu sapien at diam porttitor venenatis nec vitae velit. Donec ultrices volutpat lectus eget vehicula. Nam eu erat mi, in pulvinar eros. Mauris viverra porta orci, et vehicula lectus sagittis id. Nullam at magna vitae nunc fringilla posuere. Duis volutpat malesuada ornare. Nulla in eros metus. Vivamus a posuere libero.'

  // Margins:
  pdf.setDrawColor(0, 255, 0)
    .setLineWidth(1/72)
    .line(margin, margin, margin, 11 - margin)
    .line(8.5 - margin, margin, 8.5-margin, 11-margin)

  // the 3 blocks of text
  for (var i in fonts){
    if (fonts.hasOwnProperty(i)) {
      font = fonts[i]
      size = sizes[i]

      lines = pdf.setFont(font[0], font[1])
            .setFontSize(size)
            .splitTextToSize(loremipsum, 7.5)
      // Don't want to preset font, size to calculate the lines?
      // .splitTextToSize(text, maxsize, options)
      // allows you to pass an object with any of the following:
      // {
      //  'fontSize': 12
      //  , 'fontStyle': 'Italic'
      //  , 'fontName': 'Times'
      // }
      // Without these, .splitTextToSize will use current / default
      // font Family, Style, Size.
      console.log(lines);
      pdf.text(0.5, verticalOffset + size / 72, lines)

      verticalOffset += (lines.length + 0.5) * size / 72
    }
  }

  var string = pdf.output('datauristring');

  $('iframe').attr('src', string);
  $('#showconcuro').leanModal();
   $('#showconcuro').openModal();
   $('#showconcuro').height(1000);

  }

 
  $('#showconcuro').leanModal({
      dismissible: false, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { alert('Ready'); }, // Callback for Modal open
      complete: function() { alert('Closed'); } // Callback for Modal close
    }
  );

</script>
<script type="text/javascript">
  //Post Editar
  function ejecuta_boton(id)
  {
    $("#IDCON_").val(id); 
    $("#ejecutar").trigger("click");
  }
</script>
</html>
