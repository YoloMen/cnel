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

                    <div class="col  s12  m12 l12 z-depth-1">
                        <div class="container " style="padding-bottom:100px;">


                            <table class="striped highlight ">
                                <thead>

                                    <tr>
                                        <th data-field="id">Departamento</th>
                                        <th data-field="name">Puesto</th>
                                        <th data-field="price"></th>


                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Dirección Tecnológica</td>
                                        <td>Redes</td>
                                        <td></td>
                                        <td>
                                            <a onclick="$('#modal_crear').openModal();"><i class="material-icons small" >open_in_new</i></a>  
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>Instrucción</td>
                                        <td>Mérito</td>
                                        <td>Requerimiento</td>
                                        <td>
                                            <a onclick="$('#modal_crear').openModal();"><i class="material-icons small" >open_in_new</i></a>  
                                        </td>

                                    </tr>

                                </tbody>
                            </table>

                        </div>


                    </div>

                </div>
            </div>



        </main>   


        <!-- Modal Structure -->
        <div id="modal_crear" class="modal">
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

                                <select name="BEDP_ec" class="browser-default" required style="width:100px">
                                    <option value="">Seleccione opción</option>
                                    <option value="" selected>Mérito</option>
                                    <option value="">Oposición</option>

                                </select>
                            </div>
                            <div class="input-field col l4 m4 s12">

                                <select name="BEDP_ec" class="browser-default" required style="width:100px">
                                    <option value="" selected>Seleccione opción</option>
                                    <option value="" >Entrevista</option>
                                    <option value="">Prueba</option>
                                    <option value="">Requerimiento</option>

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

        <?php include_once SCRIPT_U; ?>	
        <?php include_once SCRIPT_F; ?>
    </body>
</html>

