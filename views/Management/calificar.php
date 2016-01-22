<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once HEAD_U; ?>
    </head>
    <body>
       <?php include_once MENU_F; ?>
        <div class="col l12 m12 s12 center-align ">
            <p class="blue-text text-darken-2">Poceso de Calificación</p>
        </div>
        <div class="row ">
            <div class="col  s12  m12 l12 z-depth-1">

                <div class="col l4 m12 s12 center-align ">
                    <div class="collection">
                        <p class="blue-text text-darken-2">Fases</p>

                        <?php
                        //var_dump($_POST);
                        foreach ($this->data['fasesConcurso'] as $key => $value) {
                            echo '<a  onclick="aspirantes_falseC(' . $value[2] . ');" class="collection-item active">' . $value[7] . '<i class="material-icons right">send</i></a>';
                        }
                        ?>  

                    </div>

                </div>
                <div class="col l8 m12 s12 center-align ">
                    <p class="blue-text text-darken-2">Poceso de Calificación</p>

                </div>
            </div>

        </div>
        <?php include_once SCRIPT_U; ?> 
        <?php include_once JSPDF ?>
        <script src="<?= URL . 'public/js/controllerCalificacion.js' ?>"></script>
    </body>

</html>

