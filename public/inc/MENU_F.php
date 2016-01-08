
<div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="mdi-navigation-menu"></i></a></div>
<ul id="nav-mobile" class="side-nav fixed" style="width: 240">
               
        
      <li class="logo blue darken-4 " >
              <a id="logo-container" href="#" class="brand-logo">
                          <img src="<?php echo URL;?>public/images/logo.png" />
                          <p id="logoTitle"></p>                     
                           
              </a>
                </li>
                    <li><a id="btn_r" href="<?php echo URL;?>management/calendario"> <i class="material-icons">web</i>&nbsp;Calendario</a></li>
                <li><a id="btn_c" href="<?php echo URL;?>management/concursos"> <i class="material-icons">event_note</i>&nbsp;Concursos</a></li>

                <li class="no-padding">
                  <ul class="collapsible collapsible-accordion">
                    <li class="">
                      <a class="collapsible-header"><i class="tiny material-icons" id="navMP">settings</i>Configuración<i class="tiny material-icons" id="navMP">arrow_drop_down</i></a>
                      <div class="collapsible-body" style="display: none;">
                        <ul>
                          <li><a href="<?php echo URL;?>management/departamentos"><i class="material-icons">exit_to_app</i>&nbsp;Departamentos</a></li>
                          <li><a href="<?php echo URL;?>management/fases"><i class="material-icons">exit_to_app</i>&nbsp;Fases concruso</a></li>
                          <li><a href="inc/php/logout.php"><i class="material-icons">exit_to_app</i>&nbsp;Salir</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </li>
                
                <li class="no-padding">
                  <ul class="collapsible collapsible-accordion">
                    <li class="">
                      <a class="collapsible-header"><i class="tiny material-icons" id="navMP">person</i>Jordy Piedra<i class="tiny material-icons" id="navMP">arrow_drop_down</i></a>
                      <div class="collapsible-body" style="display: none;">
                        <ul>
                          <li><a href="javascript:" onclick="viewProfile()">Ver Perfil</a></li>
                          <li><div class="divider"></div></li>
                          <li><div class="divider"></div></li>
                          <li><a href="inc/php/logout.php"><i class="material-icons">exit_to_app</i>&nbsp;Salir</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </li>
                
              </ul>