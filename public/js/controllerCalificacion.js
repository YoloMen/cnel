  function ver_concurso(id)
  {
    $("#IDCON_").val(id); 
    $("#ejecutar").trigger("click");
  }
    function calificar(id)
  {
    $("#IDCON__").val(id); 
    $("#calificar_").trigger("click");
  }

  $('document').ready(function(){
  $(".button-collapse").sideNav();
  $("#mcalificaciones").attr("class","active");
    
  });