<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once HEAD_U; ?>
    </head>
    <body>
        <?php include_once MENU_F; ?>
        <?php isset($this->DATA['Concurso']) ? $concurso = $this->DATA['Concurso'] : $concurso = ""; ?>
        <div class="row ">
            <div class="container">
                <div class="row z-depth-1 hide-on-med-and-down fixed">
                    <div class="col l12 m12 s12 ">
                        <ul class="tabs" style="width: 100%;">
                            <li class="tab"><a section="cabecera_concurso" onclick="seccionS('CC');" class="active">
                                    <i class="material-icons">work</i><br>Crear Concurso</a></li>
                            <li class="tab"><a section="parametros" onclick="seccionS('PC');" class="">
                                    <i class="material-icons">recent_actors</i><br>Parámetros</a></li>
                            <li class="tab"><a section="instruccion-formal" onclick="seccionS('FC');" class="">
                                    <i class="material-icons">school</i><br>Perfiles</a></li>

                            <div class="indicator" style="right: 669px; left: 669px;"></div></ul>
                    </div>

                </div>

                <div id="formContainer">
                    <form id="cabeceraConcurso" style="display: hide;">
                        <div class="col  s12  m12 l12 z-depth-1">

                            <div class="container " style="padding-bottom:100px;">

                                <div class="col l12 m12 s12 center-align ">
                                    <h5 class="blue-text text-darken-2">Bases del concurso</h5>
                                </div>

                                <div class="input-field col l4 m4 s12">
                                    <input id="CODI" name="CODI" type="text" class="validate" <?php if ($concurso != "") echo'value="' . $concurso[0][5] . '"'; ?>  require>
                                    <label for="CODI" <?php if ($concurso != "") echo'class="active"'; ?> >Código </label>
                                </div>
                                <div class="input-field col l6 m4 s12">
                                    <input id="NOMB" name="NOMB" type="text" class="validate" <?php if ($concurso != "") echo'value="' . $concurso[0][1] . '"'; ?> require> 
                                    <label for="NOMB" <?php if ($concurso != "") echo'class="active"'; ?> >Nombre</label>

                                </div>
                                <div class="input-field col l2 m4 s7">
                                    <input id="NVAC" name="NVAC" type="number" value="1"  class="validate " <?php if ($concurso != "") echo'value="' . $concurso[0][5] . '"'; ?> require>
                                    <label for="NVAC" class="active" >N# Vacantes</label>

                                </div>

                                <div class="col l6 m6 s12">


                                    <div class="input-field col l11 m11 s11">


                                        <select id="PUESTO" name="PUESTO" class="browser-default" required onchange ="SelectController($('option:selected', this));" require>
                                            <option value="NULL" selected>Elija Departamento</option>

                                            <?php
                                            //echo var_dump($this->data['departamentos']);
                                            foreach ($this->data['departamentos'] as $key => $value) {
                                                echo '<option value="' . $value[0] . '">' . $value[1] . '</option>';
                                             }
                                            ?>

                                            <option value="NULL" >Crear - Editar</option>
                                        </select>

                                    </div>
                                    <div class="input-field col l1 m1 s1"  >
                                        <a id="logo_departamento" ><i class="material-icons small" >open_in_new</i></a>  
                                    </div>
                                    <div class="input-field col l11 m11 s11">

                                        <select id="CARGO" name="CARGO" class="browser-default" required onchange ="SelectController2($('option:selected', this));" require>
                                            <option value="NULL" selected >Puesto de Trabajo</option>
                                            <div id="CARGOcontainer">
                                            </div>
                                            <option value="NULL" >Crear - Editar</option>

                                        </select>
                                    </div>
                                    <div class="input-field col l1 m1 s1"  >
                                        <a id="logo_oferta" ><i class="material-icons small" >open_in_new</i></a>  
                                    </div>
                                </div>

                                <div class="col l6 m6 s12">
                                    <div class="input-field col l6 m6 s6">
                                        <input id="VALM"  name="VALM" type="number" <?php if ($concurso != "") echo'value="' . $concurso[0][3] . '"';
                                            else echo'value="50"'; ?>  class="validate">
                                        <label for="VALM" class="active">% Mérito</label>

                                    </div>
                                    <div class="input-field col l6 m6 s6">
                                        <input id="VALO" name="VALO" type="number" <?php if ($concurso != "") echo'value="' . $concurso[0][4] . '"';
                                            else echo'value="50"'; ?>  class="validate">
                                        <label for="VALO" class="active">% Oposición</label>

                                    </div>
                                    <div class="input-field col l6 m6 s12">
                                        <input id="CFINI" name="CFINI"  type="date" class="datepicker" <?php if ($concurso != "") echo'value="' . $concurso[0][10] . '"'; ?> >
                                        <label class="active" for="CFINI">Fecha Inicial</label>
                                    </div>
                                    <div class="input-field col l6 m6 s12">
                                        <input id="CFFIN" name="CFFIN" type="date" class="datepicker" <?php if ($concurso != "") echo'value="' . $concurso[0][11] . '"'; ?> >
                                        <label class="active" for="CFFIN">Fecha Final</label>
                                    </div>
                                </div>

                                <div class="input-field col l12 m6 s12">

                                    <textarea id="DESC" name="DESC"  class="materialize-textarea"><?php if ($concurso != "") echo $concurso[0][2]; ?> </textarea>
                                    <label for="DESC">Descripción</label>
                                </div>

                            </div>


                        </div>
                    </form>
                    <form id="parametrosConcurso" >
                        <div class="col  s12  m12 l12 z-depth-1">
                            <div class="container " style="padding-bottom:100px;">

                                <div class="col l12 m12 s12 center-align ">
                                    <h5 class="blue-text text-darken-2">Fases del concurso</h5>
                                </div>

                                <div class="input-field col l4 m4 s12">


                                    <select id="TDES" name="TDES"  class="browser-default" required >
                                        <option value="NULL" selected>Tipo Parámetro</option>
                                        <option value="E" >Entrevista</option>
                                        <option value="P">Prueba</option>
                                        <option value="R">Requerimiento</option>


                                    </select>

                                </div>

                                <div class="input-field col l4 m1 s12">

                                    <select id="CFASE" name="CFASE" class="browser-default" required onchange ="SelectController3($('option:selected', this));" >
                                        <option value="NULL" selected >Fase</option>


                                        <option value="NULL" >Crear - Editar</option>

                                    </select>
                                </div>

                                <div class="input-field col l4 m1 s1"  >
                                    <a id="logo_param" onclick=""><i class="material-icons small" >open_in_new</i></a>  
                                </div>

                                <div class="input-field col l12 m12 s12">
                                    <div class="input-field col l4 m4 s12">
                                        <input id="BFINI" name="BFINI"  type="date" class="datepicker">
                                        <label class="active" for="BFINI">Fecha Inicial</label>
                                    </div>
                                    <div class="input-field col l4 m4 s12">
                                        <input id="BFFIN" name="BFFIN" type="date" class="datepicker">
                                        <label class="active" for="BFFIN">Fecha Final</label>
                                    </div>

                                    <div class="input-field col l3 m4 s12">
                                        <input id="BVALO" name="BVALO" type="number" class="validate">
                                        <label for="last_name">Valor</label>
                                    </div>

                                    <div  class="input-field col l1 m1 s1"  >
                                        <a id="G_fase" class="center-align" ><i class="material-icons small" >playlist_add</i></a>  
                                    </div>
                                </div>
                            </div>


                        </div>




                        <div class="col  s12  m12 l12 z-depth-1">
                            <div class="container " style="padding-bottom:100px;">


                                <table class="striped highlight ">
                                    <thead>

                                        <tr>
                                            <th data-field="id">Fase</th>

                                            <th data-field="price">Fecha Inicio</th>
                                            <th data-field="name">Fecha Fin</th>
                                            <th data-field="name">Mérito</th>
                                            <th data-field="name">Oposición</th>
                                            <th data-field="name"></th>


                                        </tr>
                                    </thead>

                                    <tbody id="detalle_fases">
                                        <?php
                                        if ($concurso != "") {
                                            foreach ($this->DATA['fasesConcurso'] as $key => $value) {
                                                echo '
<tr class="center-align"><td>' . $value[7] . '</td>
<td>' . $value[4] . '</td><td>' . $value[5] . '</td>
<td>' . $value[3] . '</td><td></td>
<td><a onclick="eliminar_fase_concurso(' . $value[2] . ')"><i class="material-icons small" >delete</i></a></td>
</tr>';
                                            }
                                        }
                                        ?>  

                                    </tbody>
                                </table>

                            </div>


                        </div>
                    </form>

                </div>  
            </div>
        </div>


        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red" id="save_all">
                <i class="large material-icons">save</i>
            </a>
        </div>

        <!-- Modal Fases -->
        <div id="parametros" class="modal">
            <div class="modal-content center-align">
                <h5>Fases concurso</h5>

            </div>
            <div class="modal-footer">
                <div class="row ">


                    <div class="col  s12  m12 l12 ">
                        <div class="container " style="padding-bottom:100px;">
                            <form id="form_fases">

                                <div class="col l4 m4 s12">
                                    <div class="input-field">

                                        <input name="IFNOMB" id="IFNOMB" type="text" Did="" class="validate">
                                        <label for="IFNOMB">Nombre</label>
                                    </div>

                                </div>
                                <div class="input-field col l4 m4 s12">

                                    <select name="IFTFAS" id="IFTFAS" class="browser-default" required >
                                        <option value="">Seleccione opción</option>
                                        <option value="M" selected>Mérito</option>
                                        <option value="O">Oposición</option>

                                    </select>
                                </div>
                                <div class="input-field col l4 m4 s12">

                                    <select name="IFTDES"  id="IFTDES" class="browser-default" required >
                                        <option value="" selected>Seleccione opción</option>
                                        <option value="E" >Entrevista</option>
                                        <option value="P">Prueba</option>
                                        <option value="R">Requerimiento</option>

                                    </select>
                                </div>

                                <div class="center-align col l12 m6 s6">
                                    <div class="center-align col l6 m12 s12">
                                        <a class=" center-align waves-effect waves-light btn blue" id="guardar_F">Guardar</a>

                                    </div> 
                                    <div class="center-align col l6 m12 s12">
                                        <a class=" center-align waves-effect waves-light btn blue" onclick="$('#parametros').closeModal();">Cancelar</a>

                                    </div>


                                    <br><br><br>

                                </div>



                            </form>


                        </div>


                    </div>

                </div>

            </div>
        </div>


        <!-- Modal Departamento -->
        <div id="departamento_modal" class="modal">
            <div class="modal-content center-align">
                <h5>Configuración Departamento</h5>
            </div>
            <div class="modal-content center-align">
                <div class="row ">

                    <div class="col  s12  m12 l12 ">
                        <form id="frmDepartamento">
                            <div class="col  s12  m12 l12 z-depth-1">

                                <div class="container " style="padding-bottom:100px;">






                                    <div class="col l4 m4 s12">
                                        <div class="input-field">

                                            <input id="DNOMB" Did="" name="DNOMB" type="text" class="validate">
                                            <label id= "lDNOMB" for="nombfmo">Nombre Departamento</label>
                                        </div>

                                    </div>
                                    <div class="input-field col l4 m4 s12">

                                        <select name="DPADR" id="DPADR" class="browser-default" required >
                                            <option value="NULL" >Departmanteo Padre</option>

                                            <?php
//echo var_dump($this->data['departamentos']);
                                            foreach ($this->data['departamentos'] as $key => $value) {
                                                echo '<option value="' . $value[0] . '">' . $value[1] . '</option>';
                                                // echo '<option value="'.$value[$key][0].'">'.$value[$key][1].'</option>';
                                            }
                                            ?>

                                            <option value="NULL" >Ninguno</option>


                                        </select>
                                    </div>

                                    <div class="input-field col l4 m4 s12">

                                        <input type="checkbox" class="filled-in" id="DESTA" name="DESTA" checked="checked" />
                                        <label for="DESTA">Habilitado</label>
                                    </div>

                                    <div class="center-align col l12 m6 s6">
                                        <div class="center-align col l6 m12 s12">
                                            <a class=" center-align waves-effect waves-light btn blue" id="guardar_D" >Guardar</a>

                                        </div> 
                                        <div class="center-align col l6 m12 s12">
                                            <a class=" center-align waves-effect waves-light btn blue" onclick=" $('#departamento_modal').closeModal()">Cancelar</a>

                                        </div>


                                        <br><br><br>

                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>

        <!-- Modal Trabajo -->
        <div id="cargo_trabajo" class="modal">
            <div class="modal-content center-align">
                <h5>Puesto de Trabajo</h5>
            </div>
            <div class="modal-content center-align">
                <div class="row ">


                    <div class="col  s12  m12 l12 ">
                        <form id="frmCargo">
                         


                                      <div class="input-field col s12 l4" class="ui-widget">
                                        <i class="mdi-action-search prefix"></i>
                                        <input id="CNOMB" Did="" name="CNOMB"  required >
                                        </div>  
                        
                          
                               <div class="input-field col s12 l4" class="ui-widget">

                                    <select name="CPADR" id="CPADR" class="browser-default" required class="ui-widget">


                                        <?php
//echo var_dump($this->data['departamentos']);
                                        foreach ($this->data['departamentos'] as $key => $value) {
                                            echo '<option value="' . $value[0] . '">' . $value[1] . '</option>';
                                            // echo '<option value="'.$value[$key][0].'">'.$value[$key][1].'</option>';
                                        }
                                        ?>



                                    </select>
                                </div>

                                <div class="input-field col l4 m4 s12">

                                    <input type="checkbox" class="filled-in" id="DESTA" name="DESTA" checked="checked" />
                                    <label for="CESTA">Habilitado</label>
                                </div>

                                <div class="center-align col l12 m6 s6">
                                    <div class="center-align col l6 m12 s12">
                                        <a class=" center-align waves-effect waves-light btn blue" id="guardar_C" >Guardar</a>

                                    </div> 
                                    <div class="center-align col l6 m12 s12">
                                        <a class=" center-align waves-effect waves-light btn blue" onclick=" $('#cargo_trabajo').closeModal()">Cancelar</a>

                                    </div>


                                    <br><br><br>

                                </div>


                           
                        </form> 


                    </div>

                </div>

            </div>
        </div>        






    </body>
<?php include_once SCRIPT_U; ?> 

    <script src="<?php echo URL; ?>/public/js/globalJS.js"></script>
    <script src="<?php echo URL; ?>/public/js/lunr.min.js"></script>
    <script>var URL = '<?= URL ?>';</script>
    <script>
        var opdepartamento = '<?php if ($concurso != "") echo $concurso[0][6]; else echo ""; ?>';
        var opdepartamentopadr = '<?php if ($concurso != "") echo $concurso[0][13]; else echo ""; ?>';
        var CONCID_ = '<?php if ($concurso != "") echo $concurso[0][0]; else echo ""; ?>'
    </script>


    <script type="text/javascript">

//_________________CONSURSOENCABEZADO____________________________
//CREA CONCURSO
        $("#save_all").click(function () {
            var cabecera_concurso = $('#cabeceraConcurso :input').serialize();
            console.log(cabecera_concurso);
            fajax(cabecera_concurso, '<?php echo URL; ?>/management/insert_concurso', crea_cabconcurso);

        });

        function crea_cabconcurso(response) {
            var obj = JSON.parse(response);
            CONCID_ = obj['Concurso_'];
            console.log(obj);
            Materialize.toast(obj['Mensaje'],2000);
        }


//_________________FASE CONCURSO____________________________
//Tabla Fases_concurso
        function CALL_actualiza_tabla_fases() {

            param = {'CONID': CONCID_};
            fajax(param, '<?php echo URL; ?>/management/getall_fase_concurso', actualiza_tabla_fases);
        }

        function actualiza_tabla_fases(response) {
            var obj = JSON.parse(response);

            $("#detalle_fases").empty();
            $.each(obj, function (key, value) {


                if (value[8] == 'M')
                    registro = '<tr class="center-align"><td>' + value[7] + '</td><td>' + value[4] + '</td><td>' + value[5] + '</td><td>' + value[3] + '</td><td></td><td><a onclick="eliminar_fase_concurso(' + value[2] + ')"><i class="material-icons small" >delete</i></a></td></tr>';
                else
                    registro = '<tr><td>' + value[7] + '</td><td>' + value[4] + '</td><td>' + value[5] + '</td><td></td><td>' + value[3] + '</td><td><a onclick="eliminar_fase_concurso(' + value[2] + ')"><i class="material-icons small" >delete</i></a></td></tr>';
                $("#detalle_fases").append(registro);

            });



            console.log(obj);
        }

//ELIMINAR FASE CONCURSO
        function eliminar_fase_concurso(ID) {
            param = {'CONID': CONCID_, "FASE": ID};
            Materialize.toast('Elimado con Éxito', 2000);
            fajax(param, '<?php echo URL; ?>/management/delete_faseConcurso', CALL_actualiza_tabla_fases);
        }

//CREA FASE
        function guardar_fase(response) {
            $('#departamento_modal').closeModal();
            var obj = JSON.parse(response);
            Materialize.toast(obj['Mensaje'], 2000);

        }

        function insert_base_concurso(response) {

            var obj = JSON.parse(response);
            console.log(response);
            Materialize.toast(obj['Mensaje'], 2000);
            CALL_actualiza_tabla_fases();
        }


//Actualiza todos fases
        function actualiza_allfases(response) {
            var obj = JSON.parse(response);

            $("#CFASE").empty();
            $("#CFASE").append('<option value="NULL" selected>Elija Fase</option>');

            $("#CFASE").append('fila');
            console.log(obj);
            $.each(obj, function (key, value) {

                var fila = '<option value= "' + value[0] + '">' + value[1] + '</option>';

                $("#CFASE").append(fila);

            });
            $("#CFASE").append('<option value="NULL" >Crear - Editar</option>');


        }

//Actualiza fases
        $("#TDES").change(function () {

            if ($('#TDES').val() != "NULL")
            {

                fajax($('#TDES').serialize(), '<?php echo URL; ?>/management/getall_fase', actualiza_allfases);
            }
        });



        $("#logo_param").click(function () {
            if ($('#CFASE').val() != "NULL")
            {
                var carg = $('#CFASE').serialize();

                fajax(carg, '<?php echo URL; ?>/management/busca_departamento', buscar_cargo);

                $('#logo_param').openModal();
            }
        });


///Event handler click agregar detalle fase
        $("#G_fase").click(function () {
            if (CONCID_ != null && CONCID_ != '')
            {
                var faseC = $('#parametrosConcurso :input').serialize();
                faseC += '&CONID=' + CONCID_;

                fajax(faseC, '<?php echo URL; ?>/management/insert_base_concurso', insert_base_concurso);

            }
            else
                Materialize.toast('Concurso no definido', 2000);


        });


//event heandler click guardar fase
        $("#guardar_F").click(function () {
            var frmser = $('#form_fases :input').serialize();

            if ($('#IFNOMB').attr('Did') == "") //Actualiza
            {

                console.log(frmser);
                fajax(frmser, '<?php echo URL; ?>/management/crea_fase', guardar_fase);

            }
            else
            {
                frmdep += "&DID=" + $('#DNOMB').attr('Did'); //AGREGAMOS EL ID PARA SU EDICION

                fajax(frmser, '<?php echo URL; ?>/management/actualiza_departamento', actualiza_departamento);

            }



        });

////////////////////////////////////////
        function SelectController3(valueSe) {
            if (valueSe.text() == 'Crear - Editar')
            {
                limpiaForm($('#form_fases'));
                if ($('#TDES').val() != 'NULL')
                    $('#IFTDES').val($('#TDES').val());
                $('#parametros').openModal();
                $('#logo_param').show();
            }
            else if (valueSe.val() == 'NULL')
                $('#logo_param').hide();
            else
            {


                $('#logo_param').show();
            }
        }

//____________________________________________________________
//Cargar contenido

        function seccionS(param) {
            $('#cabeceraConcurso').hide();
            $('#parametrosConcurso').hide();
            $('#perfilesConcurso').hide();

            switch (param)
            {


                case 'CC':
                {
                    $('#cabeceraConcurso').show();
                    break;

                }
                case 'PC':

                    $('#parametrosConcurso').show();
                    break;
                case 'FC':

                    $('#perfilesConcurso').show();
                    break;

            }
        }
//-_____________________________________________________///

        $(document).ready(function () {
            seccionS('CC');

            $('#logo_departamento').hide();
            $('#logo_oferta').hide();
            if (opdepartamento != "" && opdepartamentopadr != "")
            {
                $('#PUESTO').val(opdepartamentopadr);
                $("#PUESTO").trigger("change");



            }



        });

///cargo
        function SelectController2(valueSe) {
            if (valueSe.text() == 'Crear - Editar')
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




        function SelectController(valueSe) {
            if (valueSe.text() == 'Crear - Editar')
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

        function buscar_departamento(response) {



            var obj = JSON.parse(response);
            //console.log(response);
            Materialize.toast(obj['Mensaje'], 2000);
            $('#DNOMB').attr('class', 'active');
            $('#lDNOMB').attr('class', 'active');


            $('#DNOMB').attr('Did', obj['Departamento'][0]);
            $('#DNOMB').val(obj['Departamento'][1]);

            if (obj['Departamento'][2] == null)
                $('#DPADR').val('NULL');
            else
                $('#DPADR').val(obj['Departamento'][2]);


            if (obj['Departamento'][3] == "H")
            {
                //console.log($('#DESTA'));
                $('#DESTA').prop('checked', true);
            }
            else
                $('#DESTA').prop('checked', false);


        }


//CREA DEPARTAMENTO 
        function guardar_departamento(response) {
            $('#departamento_modal').closeModal();
            var obj = JSON.parse(response);
            Materialize.toast(obj['Mensaje'], 2000);
            fajax("", '<?php echo URL; ?>/management/get_allDepartamentosjson', actualiza_alldepartamentos);
        }

//CREA CARGO 
        function guardar_cargo(response) {
            $('#cargo_trabajo').closeModal();
            var obj = JSON.parse(response);
            Materialize.toast(obj['Mensaje'], 2000);

            if ($('#PUESTO').val() != "NULL")
                fajax($('#PUESTO').serialize(), '<?php echo URL; ?>/management/get_allCargos', cargar_puestos_trabajo);

        }

//busca cargo
        function buscar_cargo(response) {
            //$('#departamento_modal').closeModal();
            var obj = JSON.parse(response);

            console.log(obj);
            Materialize.toast(obj['Mensaje'], 2000);
            $('#CNOMB').attr('class', 'active');
            $('#lCNOMB').attr('class', 'active');


            $('#CNOMB').attr('Did', obj['Departamento'][0]);
            $('#CNOMB').val(obj['Departamento'][1]);

            if (obj['Departamento'][2] == null)
                $('#CPADR').val('NULL');
            else
                $('#CPADR').val(obj['Departamento'][2]);


            if (obj['Departamento'][3] == "H")
            {
                //console.log($('#DESTA'));
                $('#CESTA').prop('checked', true);
            }
            else
                $('#CESTA').prop('checked', false);


        }

//Actualiza Departamento
        function actualiza_departamento(response) {
            $('#departamento_modal').closeModal();
            var obj = JSON.parse(response);
            fajax($('#frmDepartamento :input').serialize(), '<?php echo URL; ?>/management/get_allDepartamentosjson', actualiza_alldepartamentos);
            Materialize.toast(obj['Mensaje'], 2000);

        }

//Actualiza Cargo
        function actualiza_cargo(response) {
            $('#departamento_modal').closeModal();
            var obj = JSON.parse(response);
            if ($('#PUESTO').val() != "NULL")
                fajax($('#PUESTO').serialize(), '<?php echo URL; ?>/management/get_allCargos', cargar_puestos_trabajo);
            Materialize.toast(obj['Mensaje'], 2000);

        }

//Actualiza todos los Departamentos 
        function actualiza_alldepartamentos(response) {
            var obj = JSON.parse(response);
            $("#PUESTO").empty();
            $("#PUESTO").append('<option value="NULL" selected>Elija Departamento</option>');

            $("#PUESTO").append('fila');
            $.each(obj['departamentos'], function (key, value) {

                var fila = '<option value= "' + value[0] + '">' + value[1] + '</option>';

                $("#PUESTO").append(fila);

            });
            $("#PUESTO").append('<option value="NULL" >Crear - Editar</option>');

            $("#CPADR").html($("#PUESTO").html());
        }

//Actualiza todos los Puestos de trabajo
        function cargar_puestos_trabajo(response) {

            var obj = JSON.parse(response);
            $("#CARGO").empty();
            $("#CARGO").append('<option value="NULL" selected>Elija Departamento</option>');


            $.each(obj['puestos'], function (key, value) {

                var fila = '<option value= "' + value[0] + '">' + value[1] + '</option>';

                $("#CARGO").append(fila);

            });

            $("#CARGO").append('<option value="NULL" >Crear - Editar</option>');
            if (opdepartamento != "")
                $("#CARGO").val(opdepartamento);
        }



//Actualiza los cargos
        $("#PUESTO").change(function () {
            $('#CPADR').val($('#PUESTO').val());
            if ($('#PUESTO').val() != "NULL")
            {
                fajax($('#PUESTO').serialize(), '<?php echo URL; ?>/management/get_allCargos', cargar_puestos_trabajo);


            }


        });


//event heandler click guardar departamento
        $("#guardar_D").click(function () {
            var frmdep = $('#frmDepartamento :input').serialize();
            frmdep += "&TIPO=D";
            if ($('#DNOMB').attr('Did') == "") //Actualiza
            {
                console.log(frmdep);
                fajax(frmdep, '<?php echo URL; ?>/management/crea_departamento', guardar_departamento);

            }
            else
            {
                frmdep += "&DID=" + $('#DNOMB').attr('Did'); //AGREGAMOS EL ID PARA SU EDICION
                console.log(frmdep);
                fajax(frmdep, '<?php echo URL; ?>/management/actualiza_departamento', actualiza_departamento);

            }



        });

//event heandler click guardar cargo
        $("#guardar_C").click(function () {
            var frmdep = $('#frmCargo :input').serialize();
            frmdep += "&TIPO=P";
            frmdep = frmdep.replace('CNOMB', 'DNOMB').replace('CESTA', 'DESTA').replace('CPADR', 'DPADR');
            if ($('#CNOMB').attr('Did') == "") //Actualiza
            {

                console.log(frmdep);
                fajax(frmdep, '<?php echo URL; ?>/management/crea_departamento', guardar_cargo);
            } else
            {
                frmdep += "&DID=" + $('#CNOMB').attr('Did'); //AGREGAMOS EL ID PARA SU EDICION
                console.log(frmdep);
                fajax(frmdep, '<?php echo URL; ?>/management/actualiza_departamento', actualiza_cargo);

            }



        });


        $("#logo_oferta").click(function () {
            if ($('#CARGO').val() != "NULL")
            {
                var carg = $('#CARGO').serialize();
                carg = carg.replace('CARGO', 'PUESTO');
                console.log(carg);
                fajax(carg, '<?php echo URL; ?>/management/busca_departamento', buscar_cargo);

                $('#cargo_trabajo').openModal();
            }
        });


        $("#logo_departamento").click(function () {
            if ($('#PUESTO').val() != "NULL")
                fajax($('#PUESTO').serialize(), '<?php echo URL; ?>/management/busca_departamento', buscar_departamento);

            $('#departamento_modal').openModal();

        });

        function limpiaForm(miForm) {
// recorremos todos los campos que tiene el formulario
            $('#DNOMB').attr('Did', "");
            $('#CNOMB').attr('Did', "");
            $(':input', miForm).each(function () {
                var type = this.type;
                var tag = this.tagName.toLowerCase();
//limpiamos los valores de los campos…
                if (type == 'text' || type == 'password' || tag == 'textarea')
                    this.value = "";
// excepto de los checkboxes y radios, le quitamos el checked
// pero su valor no debe ser cambiado
                else if (type == 'checkbox' || type == 'radio')
                    this.checked = true;
// los selects le ponesmos el indice a -
                else if (tag == 'select')
                    this.selectedIndex = 0;
            });
        }


    </script>

</html>

