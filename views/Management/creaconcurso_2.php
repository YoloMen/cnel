<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once HEAD_F; ?>
    </head>
    <body>
        <header>

            <?php include_once MENU_F; ?>

        </header>



        <main>
            <div class="center-align blue darken-4 z-depth-1">
                <img src="<?php echo URL; ?>public/images/logo.png" alt="" class="circle responsive-img">
                <h5 class="center-align white-text light">ADMINISTRADOR PERSONAL - CNEL</h5>
            </div>
            <div class="row ">
                <div class="container ">
                    <button class="btn waves-effect waves-light" type="submit" name="action" onclick="$('#modal_crear').openModal();">Crear
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>




            <div class="row ">
                <div class="container ">
                    

                    <form id="parametrosConcurso" style="display: hide;">
                    <div class="col  s12  m12 l12 z-depth-1">
                        <div class="container " style="padding-bottom:100px;">



                            <div class="input-field col l3 m4 s12">


                                <select id="" class="browser-default" required >
                                    <option value="NN" selected>Tipo Parámetro</option>
                                    <option value="" >Requerimientos</option>
                                    <option value="" >Pruebas</option>
                                    <option value="" >Entrevistas</option>


                                </select>

                            </div>

                            <div class="input-field col l3 m1 s12">

                                <select id="" class="browser-default" required onchange ="($('option:selected', this).text() == 'Crear - Editar') ? $('#parametros').openModal() : ($('option:selected', this).val() == 'NN') ? $('#logo_oferta').hide() : $('#logo_oferta').show();" >
                                    <option value="NN" selected >Parámetros</option>
                                    <option value="" >Instrucción</option>
                                    <option value="" >Experiencia relacionada</option>
                                    <option value="">Secretario</option>
                                    <option value="EE" >Crear - Editar</option>

                                </select>
                            </div>
                            <div class="input-field col l1 m1 s1"  >
                                <a id="logo_oferta" onclick="$('#parametros').openModal();"><i class="material-icons small" >open_in_new</i></a>  
                            </div>

                            <div class="input-field col l3 m4 s12">
                                <input id="last_name" type="number" class="validate">
                                <label for="last_name">Valor</label>
                            </div>

                            <div class="input-field col l2 m1 s1"  >
                                <a id="logo_oferta" onclick="$('#parametros').openModal();"><i class="material-icons small" >playlist_add</i></a>  
                            </div>

                        </div>


                    </div>

                </div>
            </div>


            <div class="row ">
                <div class="container ">

                    <div class="col  s12  m12 l12 z-depth-1">
                        <div class="container " style="padding-bottom:100px;">


                            <table class="striped highlight ">
                                <thead>

                                    <tr>
                                        <th data-field="id">Fase</th>

                                        <th data-field="price">Tipo</th>
                                        <th data-field="name">Merito</th>
                                        <th data-field="name">Oposición</th>
                                        <th data-field="name"></th>


                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Entrevista Técnica</td>
                                        <td>Entrevista</td>
                                        <td></td>
                                        <td>50</td>
                                        <td>
                                            <a><i class="material-icons small" >delete</i></a>  
                                        </td>     
                                    </tr>

                                    <tr>
                                        <td>Instrucción</td>
                                        <td>Requerimiento</td>
                                        <td>50</td>
                                        <td></td>
                                        <td>
                                            <a><i class="material-icons small" >delete</i></a>  
                                        </td>    

                                    </tr>

                                </tbody>
                            </table>

                        </div>


                    </div>

                </div>
            </div>
        </main>   





        <!-- Modal Fases -->
        <div id="parametros" class="modal">
            <div class="modal-content center-align">
                <h5>Fases concurso</h5>

            </div>
            <div class="modal-footer">
                <div class="row ">


                    <div class="col  s12  m12 l12 ">
                        <div class="container " style="padding-bottom:100px;">


                            <div class="col l4 m4 s12">
                                <div class="input-field">

                                    <input id="nombfmo" type="text" class="validate">
                                    <label for="nombfmo">Nombre</label>
                                </div>

                            </div>
                            <div class="input-field col l4 m4 s12">

                                <select name="BEDP_ec" class="browser-default" required >
                                    <option value="">Seleccione opción</option>
                                    <option value="" selected>Mérito</option>
                                    <option value="">Oposición</option>

                                </select>
                            </div>
                            <div class="input-field col l4 m4 s12">

                                <select name="BEDP_ec" class="browser-default" required >
                                    <option value="" selected>Seleccione opción</option>
                                    <option value="" >Entrevista</option>
                                    <option value="">Prueba</option>
                                    <option value="">Requerimiento</option>

                                </select>
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
        <?php include_once SCRIPT_F; ?>
    </body>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#logo_departamento').hide();
            $('#logo_oferta').hide()
        });

    </script>

</html>

