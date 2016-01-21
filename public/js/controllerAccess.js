$(function(){

  $("#contentAccess").empty().load(URL+'Acceso/setView/login', function(){
    
  });


  AC.init();
  Object.defineProperty(AC, "init", {
    writable:false,
    enumerable:false,
    configurable:false
  });


});

var AC = (function (){

var ACCESS = {
    sec: 'login',
    con: 1,
    val: ['',''],
    url: URL+'Acceso/controller/',
    idAction: '',
    idRow: '',
    init: function(){
      $(document).on("click",".bindAction",ACCESS.loadSection);
      $(document).on("click",".send", ACCESS.submit);

      $("form").submit(function(event){
        event.preventDefault();
      });

    },
    loadSection: function(){
      var view = $(this).attr('section');

      $("#contentAccess").fadeTo(300, 0.5, function(){
        $(this).empty().load(URL+'Acceso/setView/'+view, function(){
          
          ACCESS.sec = view;

          if($(".g-recaptcha").length){
            grecaptcha.render($(".g-recaptcha")[0], {
              sitekey: '6Ldc7hQTAAAAAHsjSCzinkQVuZykQRPjel_qaWE2',
              callback: function(response) {
                  //console.log(response);
              }
            });
          }

        }).fadeTo(100,1);         
      });

    },
    submit:function(){

      //if(ACCESS.con > 3)
      //  return false;
      
      //ACCESS.tab[0] = '';
      var form =$("form");

      if (!form[0].checkValidity()) {
        form.find(':submit').click();
        return;
      }

      var data = form.serialize();
      
      console.log(data);

      if(ACCESS.sec==='register'){
        if(ACCESS.validate()>0)
          return;

        grecaptcha = $(".g-recaptcha-response").val();

        if(!grecaptcha){
          Materialize.toast('<i class="material-icons red-text">error</i>&nbsp;Compruebe su identidad', 2000, 'rounded');
          //return;
        }

        Materialize.toast("Registrando...", 4000, "rounded");

      }
    

      $.ajax({
          url: ACCESS.url,
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
              switch(ACCESS.sec){
                case 'login':
                  setTimeout(function(){ window.location.href = URL+"Aspirante/perfil"; }, 3000);
                  $("#accountCircle").removeClass("red-text").addClass("green-text");
                  $("#contentLogin").empty().append('<h5 class="center-align">Iniciando...</h5>');
                break;

                case 'register':
                  Materialize.toast("Por favor, revise su correo y active su cuenta", 5000, 'rounded');
                  var email = $("#email").val();
                  
                  $("#contentM").prepend('<div><a class="bindAction" href="javascript:" section="login"><i class="material-icons">arrow_back</i>&nbsp; Iniciar sesión</a></div>');
                  var i = '<p class="center-align"><i class="material-icons medium">email</i></p>';


                  $("#title").html('Verificar dirección de correo electrónico');
                  $("#contentRegister")
                  .empty()
                  .append(i+'<br><p class="center-align">Se ha enviado un mensaje a:&nbsp;<b>'+email+'</b><br>Por favor, comprueba tu correo electrónico y haz clic en el vínculo del mensaje para completar la verificación de la dirección de correo electrónico y activar su cuenta en <i>Trabaja con nosotros CNEL</i></p>');
                break;

                case 'restore-password':
                  var i = '<h6>Se envió un correo a: <br><b>'+$("#email").val()+'</b>.<br><br>Por favor, revise su correo electrónico para completar el proceso de restauración de la contraseña. </h6>';
                  $("#contentRP").empty().append(i);
                break;
              }       

            }

            if(r.STATUS==='FAIL'){
              ACCESS.con++;

              switch(ACCESS.sec){
                case 'login':
                  $("#accountCircle").removeClass("green-text").addClass("red-text");
                break;
              }

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
    },
    validate:function(){
      var p1 = $("#password1").val();
      var p2 = $("#password2").val();

      var c = 0;

      if((!p1 || p1.length === 0)){
        c++;
        Materialize.toast('<i class="material-icons red-text">error</i>&nbsp;Ingrese una contraseña válida', 2000, 'rounded');
      }

      if(p1!==p2){
        c++;
        $("#password1, #password2").addClass("invalid");
        Materialize.toast('<i class="material-icons red-text">error</i>&nbsp;Las contraseñas que ingresaste no coinciden', 3000, 'rounded');        
      }

      return c;

    }



    
};

  return {
    init: ACCESS.init
  };


  return {
    nameX: nameObject
  };












})();





























