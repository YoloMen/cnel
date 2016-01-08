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
                </div>
            </div>

            <div class="row ">
                <div class="container ">

                    <div class="col  s12  m12 l12 z-depth-1">
                        <div class="container " style="padding-bottom:100px;">

                            <br>
                            <br>
                            <div id='calendar'></div>


                        </div>


                    </div>

                </div>
            </div>




        </main>   





    </body>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#logo_departamento').hide();
            $('#logo_oferta').hide()
        });

    </script>

</html>


<script>

    $(document).ready(function () {

        $('#calendar').fullCalendar({
            theme: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2015-02-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'All Day Event',
                    start: '2015-02-01',
                     end: '2015-02-12T12:30:00'
                },
                {
                    title: 'Conference',
                    start: '2015-02-11',
                    end: '2015-02-13'
                },
                {
                    title: 'Meeting',
                    start: '2015-02-12T10:30:00',
                    end: '2015-02-12T12:30:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2015-02-28'
                }
            ]
        });

    });

</script>
<style>

    body {
      
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>
</head>
<body>



</body>
</html>
