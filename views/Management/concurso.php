<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once HEAD_U; ?>
    </head>
    <body>
 

            <?php include_once MENU_F; ?>

            <div class="row ">
                <div class="container ">

                    <div class="col  s12  m12 l12 z-depth-1">
                        <div class="container " style="padding-bottom:100px;">


                            <div class="input-field col l2 m4 s6">
                                <input id="last_name" type="text" class="validate">
                                <label for="last_name">Código</label>
                            </div>
                            <div class="input-field col l5 m4 s6">
                                <input id="last_name" type="text" class="validate">
                                <label for="last_name">Nombre</label>

                            </div>
                            <div class="input-field col l2 m4 s6">
                                <input id="last_name" type="number" class="validate">
                                <label for="last_name">N# Vacantes</label>

                            </div>
                            <div class="input-field col l3 m4 s6">
                                <input id="last_name" type="date" class="validate">
                                <label for="last_name" class="active">Fecha Final</label>

                            </div>
                            <div class="input-field col l4 m4 s12">


                                <select id="" class="browser-default" required onchange ="($('option:selected', this).text() == 'Crear - Editar') ? $('#departamento_modal').openModal() : ($('option:selected', this).val() == 'NN') ? $('#logo_departamento').hide() : $('#logo_departamento').show();" >
                                    <option value="NN" selected>Elija Departamento</option>
                                    <option value="" >Centro de computo</option>
                                    <option value="" >RRHH</option>
                                    <option value="" >Financiero</option>
                                    <option value="EE" >Crear - Editar</option>

                                </select>

                            </div>
                            <div class="input-field col l1 m4 s4"  >
                                <a id="logo_departamento" onclick="$('#departamento_modal').openModal();"><i class="material-icons small" >open_in_new</i></a>  
                            </div>
                            <div class="input-field col l4 m4 s4">

                                <select id="" class="browser-default" required onchange ="($('option:selected', this).text() == 'Crear - Editar') ? $('#cargo_trabajo').openModal() : ($('option:selected', this).val() == 'NN') ? $('#logo_oferta').hide() : $('#logo_oferta').show();" >
                                    <option value="NN" selected >Puesto de Trabajo</option>
                                    <option value="" >Gerente</option>
                                    <option value="" >Asistente</option>
                                    <option value="">Secretario</option>
                                    <option value="EE" >Crear - Editar</option>

                                </select>
                            </div>
                            <div class="input-field col l1 m4 s4"  >
                                <a id="logo_oferta" onclick="$('#cargo_trabajo').openModal();"><i class="material-icons small" >open_in_new</i></a>  
                            </div>


                            <div class="input-field col l12 m4 s4">

                                <textarea id="textarea1" class="materialize-textarea"></textarea>
                                <label for="textarea1">Descripción</label>
                            </div>





                        </div>


                    </div>

                </div>
            </div>


        <!-- Modal Deártamento -->
        <div id="departamento_modal" class="modal">
            <div class="modal-content center-align">
                <h5>Configuración Departamento</h5>
            </div>
            <div class="modal-footer">
                <div class="row ">


                    <div class="col  s12  m12 l12 ">
                        <div class="container " style="padding-bottom:100px;">


                            <div class="col l4 m4 s12">
                                <div class="input-field">

                                    <input id="nombfmo" type="text" class="validate">
                                    <label for="nombfmo">Nombre Departamento</label>
                                </div>

                            </div>
                            <div class="input-field col l4 m4 s12">

                                <select name="BEDP_ec" class="browser-default" required >
                                    <option value="" selected="">Departmanteo Padre</option>
                                    <option value="" >Centro de computo</option>
                                    <option value="" >RRHH</option>
                                    <option value="" >Financiero</option>
                                    <option value="" >Ninguno</option>


                                </select>
                            </div>

                            <div class="input-field col l4 m4 s12">

                                <select name="BEDP_ec" class="browser-default" required>
                                    <option value="" selected>Estado</option>
                                    <option value="" >Habilidatdo</option>
                                    <option value="">Deshabilitado</option>


                                </select>
                            </div>

                            <div class="center-align col l12 m12 s12">

                                <a class=" center-align waves-effect waves-light btn blue">Crear</a>
                                <br><br><br>

                            </div>






                        </div>


                    </div>

                </div>

            </div>
        </div>

        <!-- Modal Trabajo -->
        <div id="cargo_trabajo" class="modal">
            <div class="modal-content center-align">
                <h5>Puesto de Trabajo</h5>
            </div>
            <div class="modal-footer">
                <div class="row ">


                    <div class="col  s12  m12 l12 ">
                        <div class="container " style="padding-bottom:100px;">


                            <div class="col l8 m4 s12">
                                <div class="input-field">

                                    <input id="nombfmo" type="text" class="validate">
                                    <label for="nombfmo">Nombre de cargo</label>
                                </div>

                            </div>

                            <div class="input-field col l4 m4 s12">

                                <select name="BEDP_ec" class="browser-default" required >
                                    <option value="" selected="">Departamanteo Padre</option>
                                    <option value="" >Centro de computo</option>
                                    <option value="" >RRHH</option>
                                    <option value="" >Financiero</option>
                                    <option value="" >Ninguno</option>


                                </select>
                            </div>

                            <div class="col l8 m4 s12">
                                <div class="input-field">

                                    <textarea id="textarea1" class="materialize-textarea" length="120"></textarea>
                                    <label for="nombfmo">Descripción</label>
                                </div>

                            </div>

                            <div class="input-field col l4 m4 s12">

                                <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                                <label for="filled-in-box">Habilitado</label>
                            </div>
                            
                            <div class="center-align col l12 m6 s6">
                                <div class="center-align col l6 m12 s12">
                                <a class=" center-align waves-effect waves-light btn blue">Guardar</a>
                             
                            </div> 
                                <div class="center-align col l6 m12 s12">
                                <a class=" center-align waves-effect waves-light btn blue">Cancelar</a>
                             
                            </div>
                              
                                
                                <br><br><br>

                            </div>






                        </div>


                    </div>

                </div>

            </div>
        </div>        


        <?php include_once SCRIPT_U; ?>	
    
    </body>
    <script>
        $(document).ready(function () {

            $('#logo_departamento').hide();
            $('#logo_oferta').hide()
        });

    </script>

</html>

