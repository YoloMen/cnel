  var optintreuccion = {
    
  };

  function ver_concurso(id)
  {
    $("#IDCON_").val(id); 
    $("#ejecutar").trigger("click");
  }
    function reclutamiento(id)
  {
    $("#IDCON_2").val(id); 
    $("#reclutar").trigger("click");
  }


function get_aspirantes(){

$('#aspirantesModal').openModal();

parametros ={
  'InstruccionFormal' : F_instruccion_formal()
  , 'AreaEstudio' :  F_area_estudio()
  , 'Discapacidad'  : F_discapacidad()
  , 'Experiencia' : F_experiencia()
};
 var estudio0=F_instruccion_formal();
//  console.log(estudio0);
  fajax(parametros, URL+"/management/get_aspirantes_reclutar", get_aspirantes_response);
}

function get_aspirantes_response(response){
var obj = JSON.parse(response);
console.log(obj['Aspirantes']);
$("#ResultadoAspirantes").empty();
  $.each(obj['Aspirantes'], function (key, value) {

  var fila = '<tr class="center-align">';
      fila += '<td id="A_CODE" style="display:none;">' + value[0] + '</td>';
      fila += '<td><i class="material-icons light-green-text text-accent-3 small ">label</i></td>';
      fila += '<td>' + value[1] + '</td>';
      fila += '<td>' + value[2] +' ' + value[3] +' ' + value[4] +' '+ value[5] + '</td>';
      fila += '<td>'+ value[6] +'</td>';
      fila += '<td><a onclick="ver_concurso(' +  value[0] + ')"> <i class="material-icons teal-text text-lighten-3  small">visibility</i></a>';
      fila += '<input type="checkbox" id="ch'+ value[0] + '" />';
      fila += '<label for="ch' + value[0] + '"></label></td></tr>';
$("#ResultadoAspirantes").append(fila);

            });

}

//_________________________FILTRO DE BUSQUEDA_______________________________
//retorna los filtros de instruccion formal seleccionados
function F_instruccion_formal(){
  if($('#instruccionF').prop('checked'))
    {
     arrFiltro= $('#InstruccionFormal :input').serializeArray();
    //console.log(arrFiltro);
    return arrFiltro;
    }
    return null;
}

//retorna los filtros de area de estudio seleccionados
function F_area_estudio(){
  if($('#area').prop('checked'))
    {
     arrFiltro= $('#AreaEstudio :input').serializeArray();
    //console.log(arrFiltro);
    return arrFiltro;
    }
    return null;
}
//retorna los filtros de area de trabajo seleccionados
function F_experiencia(){
  if($('#Experiencia').prop('checked'))
    {
     arrFiltro= $('#ExperienciaLaboral :input').serializeArray();
    //console.log(arrFiltro);
    return arrFiltro;
    }
    return null;
}
//retorna los filtros de discapacidad seleccionados
function F_discapacidad(){
  if($('#discapacidad').prop('checked'))
    {
     arrFiltro= $('#DiscapacidadAspirante :input').serializeArray();
     return arrFiltro;
    }
    return null;
}
//______________________________________________________________________________