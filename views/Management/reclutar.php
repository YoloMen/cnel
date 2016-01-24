<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once HEAD_U; ?>
    </head>
    <body>

    <?php include_once MENU_F; ?>
    <?php $concurso = $this->data['Concurso'];?>

    <div class="col l12 m12 s12 center-align ">
     <p class="blue-text text-darken-2">Poceso de Reclutamiento del Concruso <?= $concurso[0][5]; ?> Fecha de culminación <?= $concurso[0][11]; ?> </p>
    </div>

    <div class="row ">
        <div class="col  s12  m12 l12 z-depth-1">

        <div class="col l4 m12 s12 center-align ">
                     <!-- Opciones de filtro -->
        <ul class="collapsible" data-collapsible="expandable">
            <li class="blue-text text-darken-2"><i>Buscar resultados por:</i></li>

            <li>
                <div class="collapsible-header left-align"><i class="material-icons">games</i>
                    <input type="checkbox" class="filled-in" id="if"  />
                    <label for="if" style="margin-top: 12px;">Instrucción Formal</label>
                </div>
                <div class="collapsible-body">
                    <div class="row">
                    <div class="col l12">   
                    <?php 
                    foreach ($this->data['Instruccion'] as $key => $value) {
                            echo '
                            <div class="col l6 m12 s12 left-align  ">   
                            <input type="checkbox" class="filled-in" id="if'.$value[0].'" value="'.$value[0].'"  />
                            <label for="if'.$value[0].'" style="margin-top: 12px;">'.$value[1].'</label>
                            </div>';
                        }

                     ?>
                    </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="collapsible-header left-align"><i class="material-icons">games</i>
                    <input type="checkbox" class="filled-in" id="area"  />
                    <label for="area" style="margin-top: 12px;">Areas de Estudio</label>
                </div>
                <div class="collapsible-body">
                    <div class="row">
                    <div class="col l12">   
                    <?php 
                    foreach ($this->data['AreaEstudio'] as $key => $value) {
                            echo '
                            <div class="col l6 m12 s12 left-align  ">   
                            <input type="checkbox" class="filled-in" id="ae'.$value[0].'" value="'.$value[0].'"  />
                            <label for="ae'.$value[0].'" style="margin-top: 12px;">'.$value[1].'</label>
                            </div>';
                        }

                     ?>
                    </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="collapsible-header left-align"><i class="material-icons">games</i>
                    <input type="checkbox" class="filled-in" id="Experiencia"  />
                    <label for="Experiencia" style="margin-top: 12px;">Experiencia Laboral</label>
                </div>
                <div class="collapsible-body">
                    <div class="row">
                    <div class="col l12">   
                    <?php 
                    foreach ($this->data['Experiencia'] as $key => $value) {
                            echo '
                            <div class="col l6 m12 s12 left-align  ">   
                            <input type="checkbox" class="filled-in" id="el'.$value[0].'" value="'.$value[0].'"  />
                            <label for="el'.$value[0].'" style="margin-top: 12px;">'.$value[1].'</label>
                            </div>';
                        }

                     ?>
                    </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="collapsible-header left-align"><i class="material-icons">games</i>
                    <input type="checkbox" class="filled-in" id="discapacidad"  />
                    <label for="discapacidad" style="margin-top: 12px;">Discapacidad</label>
                </div>
                <div class="collapsible-body">
                    <div class="row">
                    <div class="col l12">   
                    <?php 
                    foreach ($this->data['Discapacidad'] as $key => $value) {
                            echo '
                            <div class="col l6 m12 s12 left-align  ">   
                            <input type="checkbox" class="filled-in" id="di'.$value[0].'" value="'.$value[0].'"  />
                            <label for="di'.$value[0].'" style="margin-top: 12px;">'.$value[1].'</label>
                            </div>';
                        }

                     ?>
                    </div>
                    </div>
                </div>
            </li>
        </ul>
                        <!-- Fin de Opciones de filtro -->
        </div>

        <div class="col l8 m12 s12 center-align ">

        <p class="blue-text text-darken-2">Lista de Aspirantes Aceptados</p>
            <div class="col l8 m12 s12 left-align">
            <a class="waves-effect waves-light btn"><i class="material-icons left">person_add</i>Agregar Aspirantes</a>
            </div>             
        <table class="striped highlight ">
                          
 
                            <thead>

                                <tr >
                                    <th data-field="id" id="A_CODE" style="display:none;">#</th>
                                    <th data-field="id">#</th>
                                    <th data-field="id">Cédula</th>
                                    <th data-field="price">Nombre</th>
                                    <th data-field="name">Fecha Nacimiento</th>
                                    <th data-field="name"></th>


                                </tr>
                            </thead>

                            <tbody >
<?php
$hoy = date('yyy-mm-dd');
foreach ($this->data['Aspirantes'] as $key => $value) {

echo' 
<tr class="center-align">
<td id="A_CODE" style="display:none;">' . $value[0] . '</td>
<td><i class="material-icons light-green-text text-accent-3 small ">label</i></td>
<td>' . $value[1] . '</td>
<td>' . $value[2] .' ' . $value[3] .' ' . $value[4] .' '. $value[5] . '</td>
<td>'. $value[6] .'</td>

<td>
<a onclick="ver_concurso(' . $value[0] . ')"> <i class="material-icons small">visibility</i></a>
</tr>';
}
?>   

                            </tbody>
                        </table>


       
        

        </div>
        </div>

    </div>

<!-- Modal -->

        <div id="cargo_trabajo" class="modal">
            <div class="modal-content center-align">
                   
        <table class="striped highlight ">
                          
 
                            <thead>

                                <tr >
                                    <th data-field="id" id="A_CODE" style="display:none;">#</th>
                                    <th data-field="id">#</th>
                                    <th data-field="id">Cédula</th>
                                    <th data-field="price">Nombre</th>
                                    <th data-field="name">Fecha Nacimiento</th>
                                    <th data-field="name"></th>


                                </tr>
                            </thead>

                            <tbody >
<?php
$hoy = date('yyy-mm-dd');
foreach ($this->data['Aspirantes'] as $key => $value) {

echo' 
<tr class="center-align">
<td id="A_CODE" style="display:none;">' . $value[0] . '</td>
<td><i class="material-icons light-green-text text-accent-3 small ">label</i></td>
<td>' . $value[1] . '</td>
<td>' . $value[2] .' ' . $value[3] .' ' . $value[4] .' '. $value[5] . '</td>
<td>'. $value[6] .'</td>

<td>
<a onclick="ver_concurso(' . $value[0] . ')"> <i class="material-icons small">visibility</i></a>
</tr>';
}
?>   

                            </tbody>
                        </table>
            </div>
    
        </div>        


    <?php include_once SCRIPT_U; ?> 

    <?php include_once JSPDF ?>
    <script type="text/javascript">var IDCONC=<?=  $concurso[0][0];?></script>
    <script src="<?= URL . 'public/js/controllerGestionAspirante.js' ?>"></script>
    </body>

</html>

