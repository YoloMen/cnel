

<form id="cabeceraConcurso">
                    <div class="col  s12  m12 l12 z-depth-1">

                        <div class="container " style="padding-bottom:100px;">


                            <div class="input-field col l4 m4 s12">
                                <input id="CODI" name="CODI" type="text" class="validate" require>
                                <label for="CODI">Código</label>
                            </div>
                            <div class="input-field col l6 m4 s12">
                                <input id="NOMB" name="NOMB" type="text" class="validate" require> 
                                <label for="NOMB">Nombre</label>

                            </div>
                            <div class="input-field col l2 m4 s7">
                                <input id="NVAC" name="NVAC" type="number" value="1"  class="validate " require>
                                <label for="NVAC" class="active">N# Vacantes</label>

                            </div>

                            <div class="col l6 m6 s12">


                                <div class="input-field col l11 m11 s11">


                                    <select id="PUESTO" name="PUESTO" class="browser-default" required onchange ="SelectController($('option:selected', this));" require>
                                        <option value="NULL" selected>Elija Departamento</option>
                                        
                                        <?php
                                        //echo var_dump($this->data['departamentos']);
                                         foreach ($this->data['departamentos'] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.$value[1].'</option>';
                                              // echo '<option value="'.$value[$key][0].'">'.$value[$key][1].'</option>';
                                          } 
                                           
                                          
                                        ?>
                                      
                                        <option value="NULL" >Crear - Editar</option>
                                    </select>

                                </div>
                                <div class="input-field col l1 m1 s1"  >
                                    <a id="logo_departamento" href="#"><i class="material-icons small" >open_in_new</i></a>  
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
                                    <a id="logo_oferta" onclick=""><i class="material-icons small" >open_in_new</i></a>  
                                </div>
                            </div>

                            <div class="col l6 m6 s12">
                                <div class="input-field col l6 m6 s6">
                                    <input id="VALM"  name="VALM" type="number" value="50" class="validate">
                                    <label for="VALM" class="active">% Mérito</label>

                                </div>
                                <div class="input-field col l6 m6 s6">
                                    <input id="VALO" name="VALO" type="number" value="50" class="validate">
                                    <label for="VALO" class="active">% Oposición</label>

                                </div>
                            </div>

                            <div class="input-field col l6 m6 s12">

                                <textarea id="DESC" class="materialize-textarea"></textarea>
                                <label for="DESC">Descripción</label>
                            </div>

                        </div>


                    </div>
                     </form>

                     <script type="text/javascript">

                     </script>