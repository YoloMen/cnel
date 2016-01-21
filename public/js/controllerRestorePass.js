$(function(){

  $(".send").on("click", function(){
    var form =$("form");

    if(validate()>0)
      return;

    if (!form[0].checkValidity()) {
      form.find(':submit').click();
      return;
    }

    var data = form.serialize();
    
    $.ajax({
        url: URL+'Acceso/a/',
        type:'POST',
        data: data,
        beforeSend:function(){
          var load = '<div class="progress grey lighten-4" style="margin-bottom: 0px;margin-top: 0px; height:3px;" id="jProgress">'+
                     '<div class="indeterminate blue"></div></div>';

          $("main").prepend(load);
        },
        success: function(response){
          console.log(response);
          var r= JSON.parse(response);

          if(r.STATUS === 'SUCCESS'){

            $("#contentAccess").slideUp(1000, function(){
              var a = '<a href="'+URL+'">AQUÍ</a>'
              var i = '<p class="center-align"><i class="material-icons green-text medium">done</i> <br>Su contraseña se ha cambiado correctamente<br><br>Por favor, haz click '+a+' para iniciar sesión</p>';

              $(this).empty().append(i).slideDown();
            });

          }

          Materialize.toast(r.MSG, 4500, 'rounded');
          

        },
        error:function(request, typeMessage, errorMessage){
          Materialize.toast(errorMessage, 2000);
        },
        complete:function(){
          $("#jProgress").slideUp(1500, function(){
            $(this).remove();
          });
        }
      });

  });


  $("form").submit(function(event){
    event.preventDefault();
  });


});



function validate(){
  var p1 = $("#pass1").val();
    var p2 = $("#pass2").val();

    var c = 0;

    if((!p1 || p1.length === 0)){
      c++;
      Materialize.toast('<i class="material-icons red-text">error</i>&nbsp;Ingrese una contraseña válida', 2000, 'rounded');
    }

    if(p1!==p2){
      c++;
      $("#pass1, #pass2").addClass("invalid");
      Materialize.toast('<i class="material-icons red-text">error</i>&nbsp;Las contraseñas no coinciden', 3000, 'rounded');        
    }

  return c;

}
