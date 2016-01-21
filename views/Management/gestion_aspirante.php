<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once HEAD_F; ?>
    </head>
    <body>
        <header>

            <?php include_once MENU_F; ?>
            <?php isset($this->DATA['Concurso'])? $concurso = $this->DATA['Concurso'] : $concurso=""; ?>
        </header>



        <main>
            <div class="center-align blue darken-4 z-depth-1">
                <img src="<?php echo URL; ?>public/images/logo.png" alt="" class="circle responsive-img">
                <h5 class="center-align white-text light">CONCURSO - MÉRITO OPOSICIÓN</h5>
            </div>
            <div class="row ">

                <div class="container">
                    

                    <div id="formContainer">
                        <form id="cabeceraConcurso" style="display: hide;">
                            <div class="col  s12  m12 l12 z-depth-1">

                                <div class="container " style="padding-bottom:100px;">

                                    <div class="col l12 m12 s12 center-align ">
                                        <h5 class="blue-text text-darken-2">Gestión de Aspirantes</h5>
                                    </div>

                                        <div class="input-field col l4 m4 s12">

                                            <select id="PUESTO" name="PUESTO" class="browser-default" required onchange ="SelectController($('option:selected', this));" require>
                                                <option value="NULL" selected>Elija Departamento</option>

                                               

                                                <option value="NULL" >Crear - Editar</option>
                                            </select>

                                        </div>
                                        
                                        <div class="input-field col l4 m4 s12">
                                            <input id="BFINI" name="BFINI"  type="date" class="datepicker">
                                            <label class="active" for="BFINI">Fecha Inicial</label>
                                        </div>

                                        <div class="input-field col l1 m1 s1"  >
                                            <a id="logo_oferta" ><i class="material-icons small" >open_in_new</i></a>  
                                        </div>
                                    </div>

                                   
                                  

                                </div>

</form>
                            </div>
                        
                    
                        
<br><br><br>
                    

                            <div class="col  s12  m12 l12 z-depth-1">
                                <div class="container " style="padding-bottom:100px;">


                                    <table class="striped highlight ">
                                        <thead>

                                            <tr>
                                                <th data-field="id">Codigo </th>

                                                <th data-field="price">Nombre</th>
                                                <th data-field="name">Fecha Fin</th>
                                                <th data-field="name">Mérito</th>
                                                <th data-field="name">Oposición</th>
                                                <th data-field="name"></th>


                                            </tr>
                                        </thead>

                                        <tbody id="detalle_fases">

                                            
                                        </tbody>
                                    </table>

                                </div>


                            </div>
                </div> </div>

        


           
        </main>   
      
  




<?php include_once SCRIPT_U; ?> 
<?php include_once SCRIPT_F; ?>
<?php include_once JSPDF ?>
    </body>
    
</html>

