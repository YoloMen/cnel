$(function(){

  $(".dropdown-button").dropdown();
  $(".button-collapse").sideNav();
  handleDate();

  /*$("#containerHV").empty().load('http://' + document.location.hostname + '/cnel/views/aspirante/informacion-personal.php', function(){

  });*/
$(document).on("change", "#IPPAIS", function(){
  /*if($(this).val!='1'){
    CN = false;
    $("#ENAC2").trigger('click');
  }else{
    CN = true;
    $("#ENAC1").trigger('click');
  }*/
});


$(document).on("change", 'input:radio[name="IPTLIC"]', function(){
    if ($(this).is(':checked') && ($(this).attr('id') == 'TLIC1')) {
      $(".TILI").show();
      $(".TLIC").removeClass('l6');
      $(".TLIC").addClass('l3');
      TL = true;
    }else{
      $(".TILI").hide();
      $(".TLIC").removeClass('l3');
      $(".TLIC").addClass('l6');
      TL = false;
    }
});


$(document).on("change", 'input:radio[name="IPENAC"]', function(){

  /*if($(this).is(':checked') && ($(this).attr('id') == 'ENAC1')) {
    $('#IPPAIS option[value=1]').attr('selected','selected');
  }else{
    $("#IPPAIS").val($("#IPPAIS option:first").val());
  }*/
});


$(document).on("change", 'input:radio[name="DEDISC"]', function(){
    if ($(this).is(':checked') && ($(this).attr('id') == 'DEDISC2')) {
      $(".cDE").slideUp(200);
      DI = false;
    }else{
      DI = true;
      $(".cDE").slideDown(300);
    }
});


$(document).on("change", 'input:radio[name="DEENCA"]', function(){
    if ($(this).is(':checked') && ($(this).attr('id') == 'DEENCA2')) {
      $(".cENFE").slideUp(200);
      EC = false;
    }else{
      $(".cENFE").slideDown(300);
      EC = true;
    }
});



$(document).on("change", '#DETIDI', function(){
    if ($(this).val() == 'S') {
      $(".cSUST").show();
      $(".cTIDI").removeClass('offset-l3 m6 s6').addClass('m3 s6');
    }else{
      $(".cSUST").hide();
      $(".cTIDI").removeClass('m3 s6').addClass('offset-l3 m6 s6');
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

var CN = false;
var TL = false;
var DI = false;
var EC = false;

var AS = (function (){

var controllerAS = {
    tabCurr: '',
    tabPrev: '',
    url: URL+'Aspirante/controller/',
    idRow: '', 
    init: function(){
      $(document).on("click",".tabs a, .jtabs a",controllerAS.loadSection);
      $(document).on("click",".jSend", controllerAS.submit);
    },
    loadSection: function(){
      var view = $(this).attr('section');
      $("#containerHV").empty().load(URL+'Aspirante/configSection/'+view, function(){

      });
    },
    submit:function(){

      controllerAS.tabP = '';
      var form =$("form");

      if (!form[0].checkValidity()) {
        form.find(':submit').click();
        return;
      }

      var data = form.serialize();

      console.log(data);
      return false;

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
            if (r.status=='success')  {
            }

            controllerAS.action_ = '';
            Materialize.toast(r.message, 2500);
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


    }
    
};

  return {
    init: controllerAS.init
  }

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