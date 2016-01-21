<ul id="user" class="dropdown-content">
  <li><a href="javascript:">Perfil</a></li>
  <li><a href="javascript:">Descargar PDF</a></li>
  <li><a href="javascript:">Cambiar contraseña</a></li>  
  <li class="divider"></li>
  <li><a href="javascript:">Cerrar sessión</a></li>
</ul>

<div class="navbar-fixed">
  <nav>
      <div class="nav-wrapper white z-depth-1">
        <a href="javascript:" class="brand-logo center"><img src="<?=URL?>public/images/logo.png" style="width:55%;margin-left:5px;" ></a>
        <a href="javascript:" data-activates="mobile-demo" class="button-collapse"><i class="material-icons blue-text text-darken-4">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a class="dropdown-button" href="javascript:" data-activates="user"><i class="material-icons blue-text text-darken-4">more_vert</i></a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <!-- <li><a href="sass.html">...</a></li> -->
          <!--  <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>-->
            <ul class="section table-of-contents">
              <li class="jtabs">
                <a section="informacion-personal">
                  <div class="valign-wrapper" style="height:35px;">
                    <div class="valign"><i class="material-icons">account_box</i>&nbsp;Información personal</div>
                  </div>
                </a>
              </li>
              <li class="jtabs">
                <a section="datos-familiares">
                  <div class="valign-wrapper" style="height:35px;">
                    <div class="valign"><i class="material-icons">supervisor_account</i>&nbsp;Datos familiares</div>
                  </div>             
                </a>
              </li>
              <li class="jtabs">
                <a section="instruccion-formal">
                  <div class="valign-wrapper" style="height:35px;">
                    <div class="valign"><i class="material-icons">school</i>&nbsp;Instrucción formal</div>
                  </div>
                </a>
              </li>
              <li class="jtabs">
                <a section="idiomas">
                  <div class="valign-wrapper" style="height:35px;">
                    <div class="valign"><i class="material-icons">language</i>&nbsp;Idiomas</div>
                  </div>
                </a>
              </li>
              <li class="jtabs">
                <a section="capacitacion">
                  <div class="valign-wrapper" style="height:35px;">
                    <div class="valign"><i class="material-icons">subject</i>&nbsp;Capacitación</div>
                  </div>
                </a>
              </li>
              <li class="jtabs">
                <a section="experiencia-laboral">
                  <div class="valign-wrapper" style="height:35px;">
                    <div class="valign"><i class="material-icons">work</i>&nbsp;Experiencia</div>
                  </div>
                </a>
              </li>
              <li class="jtabs">
                <a section="referencias-personales">
                  <div class="valign-wrapper" style="height:35px;">
                    <div class="valign"><i class="material-icons">contact_phone</i>&nbsp;Referencias personales</div>
                  </div>
                </a>
              </li>

          </ul>
        </ul>
      </div>
  </nav>
</div>


