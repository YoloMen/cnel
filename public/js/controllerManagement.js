///cargo
function SelectController2(valueSe){
if(valueSe.text() == 'Crear - Editar')
    {
        limpiaForm($('#frmCargo'));
        $('#CPADR').val($('#PUESTO').val());
        $('#cargo_trabajo').openModal();
        $('#logo_oferta').show();
    }
else if (valueSe.val() == 'NULL') 
    $('#logo_oferta').hide(); 
else
    {

        

        $('#logo_oferta').show();
    }
}




function SelectController(valueSe){
if(valueSe.text() == 'Crear - Editar')
    {
        limpiaForm($('#frmDepartamento'));
        $('#departamento_modal').openModal();
        $('#logo_departamento').show();
    }
else if (valueSe.val() == 'NULL') 
    $('#logo_departamento').hide(); 
else
    {

        
        $('#logo_departamento').show();
    }
}

function buscar_departamento(response){

  

var obj = JSON.parse(response);
    //console.log(response);
  Materialize.toast(obj['Mensaje'],2000);
  $('#DNOMB').attr('class', 'active');
  $('#lDNOMB').attr('class', 'active');
 

  $('#DNOMB').attr('Did', obj['Departamento'][0]);
  $('#DNOMB').val(obj['Departamento'][1]);

  if(obj['Departamento'][2]==null)
    $('#DPADR').val('NULL');
    else

  $('#DPADR').val(obj['Departamento'][2]);

  
    if(obj['Departamento'][3]=="H")
    {
       //console.log($('#DESTA'));
         $('#DESTA').prop('checked',true);
    }
        else
         $('#DESTA').prop('checked',false);


}


//


//CREA DEPARTAMENTO 
function guardar_departamento(response){
 $('#departamento_modal').closeModal();
 var obj = JSON.parse(response);
 Materialize.toast(obj['Mensaje'],2000);
 fajax("", '<?php echo URL; ?>/management/get_allDepartamentosjson',actualiza_alldepartamentos);
}

//CREA CARGO 
function guardar_cargo(response){
 $('#cargo_trabajo').closeModal();
 var obj = JSON.parse(response);
 Materialize.toast(obj['Mensaje'],2000);

 if($('#PUESTO').val()!="NULL")
  fajax($('#PUESTO').serialize(), '<?php echo URL; ?>/management/get_allCargos',cargar_puestos_trabajo);

}

//busca cargo
function buscar_cargo(response){
 //$('#departamento_modal').closeModal();
 var obj = JSON.parse(response);

 console.log(obj);
 Materialize.toast(obj['Mensaje'],2000);
  $('#CNOMB').attr('class', 'active');
  $('#lCNOMB').attr('class', 'active');
 

  $('#CNOMB').attr('Did', obj['Departamento'][0]);
  $('#CNOMB').val(obj['Departamento'][1]);

  if(obj['Departamento'][2]==null)
    $('#CPADR').val('NULL');
    else

  $('#CPADR').val(obj['Departamento'][2]);

  
    if(obj['Departamento'][3]=="H")
    {
       //console.log($('#DESTA'));
         $('#CESTA').prop('checked',true);
    }
        else
         $('#CESTA').prop('checked',false);


}

//Actualiza Departamento
function actualiza_departamento(response){
 $('#departamento_modal').closeModal();
 var obj = JSON.parse(response);
  fajax($('#frmDepartamento :input').serialize(), '<?php echo URL; ?>/management/get_allDepartamentosjson',actualiza_alldepartamentos);
 Materialize.toast(obj['Mensaje'],2000);

}

//Actualiza Cargo
function actualiza_cargo(response){
 $('#departamento_modal').closeModal();
 var obj = JSON.parse(response);
 if($('#PUESTO').val()!="NULL")
    fajax($('#PUESTO').serialize(), '<?php echo URL; ?>/management/get_allCargos',cargar_puestos_trabajo);
 Materialize.toast(obj['Mensaje'],2000);

}

//Actualiza todos los Departamentos 
function actualiza_alldepartamentos(response){
  var obj = JSON.parse(response);
  $("#PUESTO").empty();
   $("#PUESTO").append('<option value="NULL" selected>Elija Departamento</option>');
 
$("#PUESTO").append('fila');
  $.each( obj['departamentos'], function( key, value ) {

    var fila='<option value= "'+value[0]+'">'+value[1]+'</option>';
      
    $("#PUESTO").append(fila);
   
  });
    $("#PUESTO").append('<option value="NULL" >Crear - Editar</option>');

    $("#CPADR").html($("#PUESTO").html());
}

//Actualiza todos los Puestos de trabajo
function cargar_puestos_trabajo(response){

   var obj = JSON.parse(response);
  $("#CARGO").empty();
   $("#CARGO").append('<option value="NULL" selected>Elija Departamento</option>');
 

  $.each( obj['puestos'], function( key, value ) {

    var fila='<option value= "'+value[0]+'">'+value[1]+'</option>';
      
    $("#CARGO").append(fila);
   
  });

    $("#CARGO").append('<option value="NULL" >Crear - Editar</option>');
}



//Actualiza los cargos
$( "#PUESTO" ).change(function() {
$('#CPADR').val($('#PUESTO').val());
 if($('#PUESTO').val()!="NULL")
   {fajax($('#PUESTO').serialize(), '<?php echo URL; ?>/management/get_allCargos',cargar_puestos_trabajo);
    

    }


});


//event heandler click guardar departamento
$( "#guardar_D" ).click(function() {
var frmdep= $('#frmDepartamento :input').serialize();
     frmdep+="&TIPO=D";
    if($('#DNOMB').attr('Did')== "") //Actualiza
    {
     console.log(frmdep);
    fajax(frmdep, '<?php echo URL; ?>/management/crea_departamento',guardar_departamento);

     }
    else 
    {
    frmdep+="&DID="+$('#DNOMB').attr('Did'); //AGREGAMOS EL ID PARA SU EDICION
    console.log(frmdep);
    fajax(frmdep, '<?php echo URL; ?>/management/actualiza_departamento',actualiza_departamento);

    }
       
     

});

//event heandler click guardar cargo
$( "#guardar_C" ).click(function() {
var frmdep= $('#frmCargo :input').serialize();
frmdep+="&TIPO=P";
frmdep=frmdep.replace('CNOMB','DNOMB').replace('CESTA','DESTA').replace('CPADR','DPADR');
    if($('#CNOMB').attr('Did')== "") //Actualiza
   {
      
console.log(frmdep);
    fajax(frmdep, '<?php echo URL; ?>/management/crea_departamento',guardar_cargo);
     }else
    {
    frmdep+="&DID="+$('#CNOMB').attr('Did'); //AGREGAMOS EL ID PARA SU EDICION
    console.log(frmdep);
    fajax(frmdep, '<?php echo URL; ?>/management/actualiza_departamento',actualiza_cargo);

    }
       
     

});


$( "#logo_oferta" ).click(function() {
    if($('#CARGO').val()!="NULL")
      {var carg =$('#CARGO').serialize();
    carg=carg.replace('CARGO','PUESTO');
    console.log(carg);
    fajax(carg, '<?php echo URL; ?>/management/busca_departamento',buscar_cargo);
    
    $('#cargo_trabajo').openModal();
}
});


$( "#logo_departamento" ).click(function() {
    if($('#PUESTO').val()!="NULL")
    fajax($('#PUESTO').serialize(), '<?php echo URL; ?>/management/busca_departamento',buscar_departamento);
    
    $('#departamento_modal').openModal();

});