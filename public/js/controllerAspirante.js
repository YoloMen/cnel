$(function(){
  Materialize.toast('<i class="material-icons white-text">mood</i>&nbsp;Bienvenido', 2500, 'rounded');
  $(".dropdown-button").dropdown();
  $(".button-collapse").sideNav();
  handleDate();

  

  /*$("#containerHV").empty().load('http://' + document.location.hostname + '/cnel/views/aspirante/informacion-personal.php', function(){

  });*/

$(document).on("change", 'input:radio[name="IPTLIC"]', function(){
    if ($(this).is(':checked') && ($(this).attr('id') == 'TLIC1')) {
      $(".TILI").show();
      $(".TLIC").removeClass('l6');
      $(".TLIC").addClass('l3');
      $("#IPTILI").prop('required',true);

    }else{
      $(".TILI").hide();
      $(".TLIC").removeClass('l3');
      $(".TLIC").addClass('l6');

      $("#IPTILI").find("option:eq(0)").prop("selected", true);
      $("#IPTILI").prop('required',false);
    }
});


$(document).on("change", 'input:radio[name="DEDISC"]', function(){
    if ($(this).is(':checked') && ($(this).attr('id') == 'DEDISC2')) {
      $(".cDE").slideUp(200);
      $("#DETIDI").find("option:eq(0)").prop("selected", true);
      $("#DETIDI").prop('required',false);
    }else{
      $(".cDE").slideDown(300);
      $("#DETIDI").prop('required',true);
    }
});


$(document).on("change", 'input:radio[name="DEENCA"]', function(){
    if ($(this).is(':checked') && $(this).val() == 'N') {
      $(".cENFE").slideUp(200);
      $("#DEENFE").find("option:eq(0)").prop("selected", true);
      $("#DEENFE").prop('required',false);
    }else{
      $(".cENFE").slideDown(300);
      $("#DEENFE").prop('required',true);
    }
});



$(document).on("change", '#DETIDI', function(){
    if ($('#DETIDI option:checked').html() === 'SUSTITUTO') {
      $(".cSUST").show();
      $(".cTIDI").removeClass('offset-l3 m6 s6').addClass('m3 s6');
      $("#DESUST").prop('required',true);
    }else{
      $(".cSUST").hide();
      $(".cTIDI").removeClass('m3 s6').addClass('offset-l3 m6 s6');
      $("#DESUST").find("option:eq(0)").prop("selected", true);
      $("#DESUST").prop('required',false);
    }
});


$(document).on("change", '#IPPAIS', function(){
    if ($('#IPPAIS option:selected').html() === 'ECUADOR') {
      $("#IPPROV, #IPLOCN").prop('disabled',false);
    }else{
       $("#IPPROV, #IPLOCN").prop('disabled',true);
       $("#IPPROV").find("option:eq(0)").prop("selected", true);
       $("#IPLOCN").find("option:eq(0)").prop("selected", true);
    }
});





$(document).on("change", '#IFNSTR', function(){
    if(!$('#IFNSTR').val()){
      $("#contIF1").hide();
      $("#contIF2").hide();
      return;
    }

    if ($('#IFNSTR option:selected').html() === 'PRIMARIA') {
      $("#contIF1").slideDown();
      $("#contIF2").hide();
      $("#querycontIF1").empty();

      $("#IFINST, #IFNOMB, #IFTIEM, #IFFGRA, #IFOINS").prop('required',false);
      $("#IFNOMB1, #IFTIEM1").prop('required',true);

    }else if($('#IFNSTR option:selected').html() === 'SECUNDARIA'){
      $("#querycontIF1").empty().append('<a href="http://servicios.educacion.gob.ec/titulacion25-web/faces/paginas/consulta-titulos-refrendados.xhtml" target="_BLANK" style="padding-left: 110px;">Consultar TÍTULO AQUI</a>');
      $("#contIF1").slideDown();
      $("#contIF2").hide();

      $("#IFINST, #IFNOMB, #IFTIEM, #IFFGRA, #IFSENE", "#IFOINS").prop('required',false);
      $("#IFNOMB1, #IFTIEM1").prop('required',true);
    }
    else{
      $("#contIF1").hide();
      $("#contIF2").slideDown();
      $("#IFNOMB1, #IFTIEM1").prop('required',false);
      $("#IFINST, #IFNOMB, #IFTIEM, #IFFGRA").prop('required',true);
    }
});


$(document).on("change", '#IFINST', function(){
    if ($('#IFINST option:selected').html() === 'OTRA') {
      $("#OINS").show();
      $("#IFOINS").prop('required',true);
    }
    else{
      $("#IFOINS").val('');
      $("#OINS").hide();
      $("#IFOINS").prop('required',false);
    }
});


$(document).on("change", "#IPPROV, #DDPROV, #DDCANT", function(){

  if($(this).val()!=''){
    
    var id = 'IPLOCN';
    var s = 'canton';

    if($(this).attr("id") == 'DDPROV'){
      id = 'DDCANT';
    }

    if($(this).attr("id") == 'DDCANT'){
      id = 'DDPARR';
      s = 'parroquia';
    }

  
  
    $.get( URL+"Service/information/"+s+"-"+$(this).val(), function(r) {
      var x = JSON.parse(r);
      var options = '<option value="">Seleccione</option>';
      for (var i = 0; i < x.length; i++) {
        options+='<option value="'+x[i][0]+'">'+x[i][1]+'</option>';
      };
      $("#"+id).empty().append(options);
      $("#"+id).focus();
    });
  }

});




 AS.init();
  Object.defineProperty(AS, "init", {
    writable:false,
    enumerable:false,
    configurable:false
  });


});

var AS = (function (){

var controllerAS = {
    tab: ['jP','jC'],
    val: ['',''],
    url: URL+'Aspirante/controller/',
    idAction: '',
    idRow: '',
    init: function(){
      $(document).on("click",".tabs a, .jtabs a",controllerAS.loadSection);
      $(document).on("click",".send1, .send2", controllerAS.submit);

      
      $(document).on("click", ".edit", controllerAS.edit);
      $(document).on("click", ".delete", controllerAS.confirmation);
      $(document).on('click', '#accept', controllerAS.deleteRow);
      $(document).on('click', '#cancel', controllerAS.cancelDelete);
  
      $(document).on("click", "#cancelEdit", controllerAS.cancelEdit);


      



    },
    loadSection: function(){
      var view = $(this).attr('section');
      controllerAS.tab[1] = view;

      if(controllerAS.tab[1]==controllerAS.tab[0]){
        return
      }else{
        controllerAS.tab[0] = view;
      }

      if (controllerAS.tab[1] == 'informacion-personal' || controllerAS.tab[1] == 'referencias-personales'){
        $(".send1").show();
      }else{
        $(".send1").hide();
      }

      $("#containerHV").empty().load(URL+'Aspirante/configSection/'+view, function(){
        
        $(".triggerI").trigger("change");
      });
    },
    submit:function(){
      //controllerAS.tab[0] = '';
      var form =$("form");

      if (!form[0].checkValidity()) {
        form.find(':submit').click();
        return;
      }
      var data = form.serialize();

      if (controllerAS.tab[1]==='informacion-personal' || controllerAS.tab[1]==='referencias-personales'){
        controllerAS.val[1] = data;
        if(controllerAS.val[0] === controllerAS.val[1]){
          Materialize.toast("No es posible actualizar los datos", 2500, "rounded", function(){
            Materialize.toast("¡No se ha detectado ningún cambio!", 2500, "rounded");  
          });
          return false;
        }else{
          controllerAS.val[0] = data;
        }
      }

      if($("#IFNSTR").length){
        if($('#IFNSTR option:selected').html() === 'PRIMARIA' || $('#IFNSTR option:selected').html() === 'SECUNDARIA'){
          data = {
            IFNSTR: $("#IFNSTR").val(),
            IFNOMB1: $("#IFNOMB1").val(),
            IFTIEM1: $("#IFTIEM1").val(),
            ID: $("#JIFID").val()
          };

          data = $.param(data);
        }
      }
      
      //console.log(data);return false;

      if(controllerAS.idAction){
        data+="&JV=U";
        var id = controllerAS.idRow;
        data+="&jID="+id.attr("data-id");
        data+="&jTOKEN=";
        //data+="&jTOKEN="+token.attr("data-token");
      }


      $.ajax({
          url: controllerAS.url,
          type:'POST',
          data: data,
          beforeSend:function(){
            //$("#BE").prepend(controllerAS.loading());
          },
          success: function(response){
            console.log(response);
            var r= JSON.parse(response);
            if (r.STATUS==='SUCCESS') {
                //var d = r.DATA;

                if(!controllerAS.idAction){
                      //controllerAS.tab[0] = '';
                      $(".tableContent").fadeTo(400, 0.5, function(){
                        $(this).prepend(r.ROW).fadeTo(100,1);
                        //controllerAS.loadContent.call(".tabs").find(".active"));
                      });
                }else{
                  
                  d = r.DATA;
                  switch(controllerAS.tab[1]){
                  
                  case 'datos-familiares':
                      controllerAS.idRow.find("td:eq(0)").html(d.DFAPEL);
                      controllerAS.idRow.find("td:eq(1)").html(d.DFNOMB);
                      controllerAS.idRow.find("td:eq(2)").html(d.DFCEDU);
                      controllerAS.idRow.find("td:eq(3)").html(d.DFFNAC);
                      controllerAS.idRow.find("td:eq(4)").html(d.DFINST);
                      controllerAS.idRow.find("td:eq(5)").html(d.DFFEME);
                  break;

                  case 'instruccion-formal':
                      controllerAS.idRow.find("td:eq(0)").html(d.IFNSTR);
                      controllerAS.idRow.find("td:eq(2)").html(d.IFNOMB);
                      controllerAS.idRow.find("td:eq(3)").html(d.IFSENE);

                      if(d.IFOINS){
                        controllerAS.idRow.find("td:eq(1)").html(d.IFOINS);
                      }else{
                        instToString = $("select#IFINST").find("option[value="+d.IFINST+"]").html();
                        controllerAS.idRow.find("td:eq(1)").html(instToString);
                      }
                  break;

                  case 'idiomas':
                      controllerAS.idRow.find("td:eq(0)").html(d.IDIDIO);
                      controllerAS.idRow.find("td:eq(1)").html(d.IDNESC);
                      controllerAS.idRow.find("td:eq(2)").html(d.IDNHAB);
                  break;

                  case 'capacitacion':
                      controllerAS.idRow.find("td:eq(0)").html(d.CAECAP);
                      controllerAS.idRow.find("td:eq(1)").html(d.CATEVE);
                      controllerAS.idRow.find("td:eq(2)").html(d.CAAEST);
                      controllerAS.idRow.find("td:eq(3)").html(d.CATITU);
                      controllerAS.idRow.find("td:eq(4)").html(d.CATCER);
                      controllerAS.idRow.find("td:eq(5)").html(d.CADHOR);
                      controllerAS.idRow.find("td:eq(6)").html(d.CAFICA);
                      controllerAS.idRow.find("td:eq(7)").html(d.CAFFCA);
                  break;

                  case 'experiencia-laboral':
                      controllerAS.idRow.find("td:eq(0)").html(d.ELNEMP);
                      controllerAS.idRow.find("td:eq(1)").html(d.ELARTR);
                      controllerAS.idRow.find("td:eq(2)").html(d.ELCARG);
                      controllerAS.idRow.find("td:eq(3)").html(d.ELRELA);
                      controllerAS.idRow.find("td:eq(4)").html(d.ELTELE);
                  break;


                  }

                }

              controllerAS.cancelEdit();  
            }

            Materialize.toast(r.MSG, 2500);
            

          },
          error:function(request, typeMessage, errorMessage){
            Materialize.toast(errorMessage, 2000);
          },
          complete:function(){
            //$("div.progress").slideUp(1500, function(){
              //$(this).remove();
            //});
          }
        });
    },

    editRow:function(){
      //var token = controllerAS.idRow.attr("data-token");
      var token = '';
      var id= controllerAS.idRow.attr("data-id");

      $.ajax({
          url: controllerAS.url,
          type:'POST',
          data: {
            ID: controllerAS.tab[1],
            JV:controllerAS.idAction, 
            jID:id, 
            jTOKEN: token
          },
          success: function(response){
            console.log(response);
            var r= JSON.parse(response);
            if (r.STATUS==='SUCCESS') {
              if(controllerAS.idAction==='D'){
                controllerAS.idRow.remove();

                $("#jContainer").fadeTo(400,0.5, function(){
                  $(this).fadeTo(100,1);
                });

                $("#modalCON").find("h4").html('');
                controllerAS.idAction='';
                controllerAS.idRow='';
                controllerAS.cancelEdit();
                Materialize.toast(r.MSG, 4000, 'rounded');
              }else{
                var d = r.DATA;
                switch(controllerAS.tab[1]){
                  
                  case 'datos-familiares':
                    $("select#DFTIFA").find("option[value="+d.DFTIFA+"]").prop("selected",true);
                    $("select#DFINST").find("option[value="+d.DFINST+"]").prop("selected",true);
                    $("select#DFOFIC").find("option[value="+d.DFOFIC+"]").prop("selected",true);
            
                    $("#DFAPEL").val(d.DFAPEL);
                    $("#DFNOMB").val(d.DFNOMB);
                    $("#DFCEDU").val(d.DFCEDU);
                    $("#DFFNAC").val(d.DFFNAC);
                    $("#DFDIRE").val(d.DFDIRE);
                    $("#DFTEL1").val(d.DFTEL1);
                    $("#DFTEL2").val(d.DFTEL2);

                    if(d.DFFEME=='S'){
                      $("#DFFEME1").prop("checked", true);
                    }else{
                      $("#DFFEME2").prop("checked", true);
                    }
                  break;


                  case 'instruccion-formal':

                    $("select#IFNSTR").find("option[value="+d.IFNSTR+"]").prop("selected",true);
                    $("#IFNSTR").trigger("change");

                    if($('#IFNSTR option:selected').html() === 'PRIMARIA' || $('#IFNSTR option:selected').html() === 'SECUNDARIA'){
                      $("#IFNOMB1").val(d.IFNOMB);
                      $("#IFTIEM1").val(d.IFTIEM);
                    }else{

                      $("select#IFINST").find("option[value="+d.IFINST+"]").prop("selected",true);
                      $("select#IFAEST").find("option[value="+d.IFAEST+"]").prop("selected",true);

                      $("#IFNOMB").val(d.IFNOMB);
                      $("#IFTIEM").val(d.IFTIEM);
                      $("#IFSENE").val(d.IFSENE);
                      $("#IFFGRA").val(d.IFFGRA);

                      if($('#IFINST option:selected').html() === 'OTRA'){
                        $("#IFINST").trigger("change");
                        $("#IFOINS").val(d.IFOINS);
                      }
                    }            
                  break;

                  case 'idiomas':
                    $("select#IDIDIO").find("option[value="+d.IDIDIO+"]").prop("selected",true);
                    $("select#IDNESC").find("option[value="+d.IDNESC+"]").prop("selected",true);
                    $("select#IDNHAB").find("option[value="+d.IDNHAB+"]").prop("selected",true);
                  break;

                  case 'capacitacion':
                    $("select#CATEVE").find("option[value="+d.CATEVE+"]").prop("selected",true);
                    $("select#CAAEST").find("option[value="+d.CAAEST+"]").prop("selected",true);
                    $("select#CATCER").find("option[value="+d.CATCER+"]").prop("selected",true);

                    $("#CAECAP").val(d.CAECAP);
                    $("#CATITU").val(d.CATITU);
                    $("#CAFICA").val(d.CAFICA);
                    $("#CAFICA").val(d.CAFICA);
                    $("#CAFFCA").val(d.CAFFCA);
                    $("#CADHOR").val(d.CADHOR);
                  break;

                  case 'experiencia-laboral':
                    $("select#ELARTR").find("option[value="+d.ELARTR+"]").prop("selected",true);

                    $("#ELNEMP").val(d.ELNEMP);
                    $("#ELCARG").val(d.ELCARG);
                    $("#ELTELE").val(d.ELTELE);
                    $("#ELRELA").val(d.ELRELA);

                    if(d.ELSECT=='P'){
                      $("#ELSECT1").prop("checked", true);
                    }else{
                      $("#ELSECT2").prop("checked", true);
                    }

                  break;


                }

                $('.actL').addClass('active');

                if(!$("#cancelEdit").length)
                  $(".contentBtn").prepend('<a class="btn-floating waves-effect waves-light red" id="cancelEdit" style="margin-right:5px"><i class="material-icons">cancel</i></a>');

              }

            }

          },
      });

    },


    edit:function(){
      //$('form label').addClass('active');
      controllerAS.idAction = 'E';
      controllerAS.idRow=$(this).closest("tr");
      controllerAS.editRow();
    },
    cancelEdit:function(){

      controllerAS.idAction='';
      controllerAS.idRow='';

      $('.actL').removeClass('active');
      $('.actI').removeClass('valid').val('');
      $('.actS').find("option:eq(0)").prop("selected", true);
      $('.actR').prop("checked", false);


      if($("#IFNSTR").length){
        $("#IFNSTR").trigger("change");
      }

      if($("#cancelEdit").length){
        $("#cancelEdit").fadeOut(100, function(){
          $(this).remove();
        });
      }    
       
    },
    confirmation:function(){
      controllerAS.idAction = 'E';
      controllerAS.idRow=$(this).closest('tr');

      var name = msg = '';

      switch(controllerAS.tab[1]){
        case 'datos-familiares':
          name = controllerAS.idRow.find("td:eq(0)").html();
          name += " "+controllerAS.idRow.find("td:eq(1)").html();
          msg = "¿Esta seguro en eliminar al familiar <b>" + name + "</b>?";
        break;

        case 'instruccion-formal':
          inst = controllerAS.idRow.find("td:eq(0)").html();
          titu = controllerAS.idRow.find("td:eq(2)").html();
          msg = "¿Esta seguro en eliminar el nivel de instrucción <b>" + inst + "</b> titulo <b>" + titu + "</b>?";
        break;

        case 'idiomas':
          idio = controllerAS.idRow.find("td:eq(0)").html();
          msg = "¿Esta seguro en eliminar el idioma <b>" + idio + "</b>?";
        break;

        case 'capacitacion':
          capa = controllerAS.idRow.find("td:eq(3)").html();
          msg = "¿Esta seguro en eliminar la capacitación <b>" + capa + "</b>?";
        break;

        case 'experiencia-laboral':
          empr = controllerAS.idRow.find("td:eq(0)").html();
          msg = "¿Esta seguro en eliminar la empresa <b>" + empr + "</b>?";
        break;

      }
      
      $("#modalCON").find("h5").html(msg);
      $('#modalCON').openModal();
    },
    deleteRow:function(){
      controllerAS.idAction = 'D';
      controllerAS.editRow();
    },
    cancelDelete:function(){
      controllerAS.idAction = '';
      controllerAS.idRow = '';
      $("#modalCON").find("h5").html('');
    }

    
};

  return {
    init: controllerAS.init
  };


  return {
    nameX: nameObject
  };












})();































//listener on date of birth field
function handleDate() {
    $(document).on('change', '#IPFENA', function () {
      if (isDate($('#IPFENA').val()) && $('#IPFENA').val()!==null) {
        var age = calculateAge(parseDate($('#IPFENA').val()), new Date());

        if (isNaN(age) || age<=0){
           $("#EDAD").text('');
           return;
        }


        $("#EDAD").empty().append('EDAD: <b>'+age+' años</b>');   
      } else {
        $("#EDAD").text('');   
      }      
    });
}

//convert the date string in the format of dd/mm/yyyy into a JS date object
function parseDate(dateStr) {
  var dateParts = dateStr.split("/");
  return new Date(dateParts[2], (dateParts[1] - 1), dateParts[0]);
}

//is valid date format
function calculateAge (dateOfBirth, dateToCalculate) {
    var calculateYear = dateToCalculate.getFullYear();
    var calculateMonth = dateToCalculate.getMonth();
    var calculateDay = dateToCalculate.getDate();

    var birthYear = dateOfBirth.getFullYear();
    var birthMonth = dateOfBirth.getMonth();
    var birthDay = dateOfBirth.getDate();

    var age = calculateYear - birthYear;
    var ageMonth = calculateMonth - birthMonth;
    var ageDay = calculateDay - birthDay;

    if (ageMonth < 0 || (ageMonth == 0 && ageDay < 0)) {
        age = parseInt(age) - 1;
    }
    return age;
}

function isDate(txtDate) {
  var currVal = txtDate;
  if (currVal == '')
    return true;

  //Declare Regex
  var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
  var dtArray = currVal.match(rxDatePattern); // is format OK?

  if (dtArray == null)
    return false;

  //Checks for dd/mm/yyyy format.
  var dtDay = dtArray[1];
  var dtMonth = dtArray[3];
  var dtYear = dtArray[5];

  if (dtMonth < 1 || dtMonth > 12)
    return false;
  else if (dtDay < 1 || dtDay > 31)
    return false;
  else if ((dtMonth == 4 || dtMonth == 6 || dtMonth == 9 || dtMonth == 11) && dtDay == 31)
    return false;
  else if (dtMonth == 2) {
    var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
    if (dtDay > 29 || (dtDay == 29 && !isleap))
      return false;
  }

  return true;
}
