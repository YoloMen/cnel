<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once HEAD_U; ?>
    </head>
    <body>

        <?php include_once MENU_F; ?>


        <br>
        <br>
        <div class="row ">
            <div class="container ">

                <div class="col  s12  m12 l12 z-depth-1">
                    <div class="container " style="padding-bottom:100px;">
                        <div class="col l12 m12 s12 center-align ">
                            <h5 class="blue-text text-darken-2">Poceso de Reclutamiento</h5>
                        </div>





                    </div>
                </div>
            </div>
        </div>

        <form action="<?php echo URL; ?>management/creaconcurso" method="POST"> 
            <input type="hidden" name="IDCON_" id="IDCON_" value=""> 
            <input type="submit" id="ejecutar" style="display: none;"> 
        </form>

        <form action="<?php echo URL; ?>management/reclutamiento" method="POST"> 
            <input type="hidden" name="IDCON_" id="IDCON_" value=""> 
            <input type="submit" id="reclutar" style="display: none;"> 
        </form>

        <?php include_once SCRIPT_U; ?> 

        <?php include_once JSPDF ?>
        <script src="<?= URL . 'public/js/controllerGestionAspirante.js' ?>"></script>
    </body>

</html>

