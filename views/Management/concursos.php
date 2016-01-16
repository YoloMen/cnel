<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once HEAD_F; ?>
        <?php include_once CALENDAR; ?>
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
                    <button class="btn waves-effect waves-light" type="submit" name="action" onclick="location.href='<?php echo URL; ?>management/creaconcurso_1';">Crear
                        <i class="material-icons right">send</i>
                    </button>
                    <button class="btn waves-effect waves-light" type="submit" name="action" onclick="location.href='<?php echo URL; ?>management/calendario';">Calendario
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
            
            <div class="row ">
                <div class="container ">

                    <div class="col  s12  m12 l12 z-depth-1">
                        <div class="container " style="padding-bottom:100px;">

                            <br>
                            <br>

<?php
//var_dump($DATA);
foreach ($this->DATA['Concursos'] as $key => $value) {

    echo '<div class="card small col l4"><div class="card "><div class="card-image waves-effect waves-block waves-light"><img class="activator" src="images/office.jpg"></div><div class="card-content"><span class="card-title activator grey-text text-darken-4">' . $value[1] . '<i class="material-icons right">more_vert</i></span><p><a href="#">This is a link</a></p></div><div class="card-reveal"><span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span><p>kkkk</p></div></div></div></div>';
    
}
?>
 


                    </div>

                </div>
            </div>




        </main>   


    </body>


</head>
<body>



</body>
</html>
