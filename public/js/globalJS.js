//Ajax global

 function fajax(parametros, seturl,funcion){
            
            
             $.ajax({
                    data: parametros ,
                    url:   seturl,
                    type:  'POST',
                    success: funcion
                    ,
                    error:function (xhr, ajaxOptions, thrownError,response){
                            Materialize.toast("error : "+thrownError, 2000);
                    }
            } );
           
         
    }


