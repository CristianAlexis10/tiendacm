<div class="fondo" id="fondo"></div>
  <div class="modal" id="modal-login-registro">
    <span id="cerrar_modal" class="cerrar"><i class="fa fa-times" aria-hidden="true"></i></span>
        <div class="login" id='login'>
          <form class="formulario" id="formulario-login" action="index.html" method="post">
            <div class="titulo">
              <h2>INICIAR SESIÓN</h2>
            </div>
            <div class="wrap-content-form">
                <p>Ingrese el correo electronico y la contraseña para poder acceder al sistema</p>
                <div class="wrapILogin">
                  <input type="email" name="data-login" id="login-email" class="input" required>
                  <label for="login-email" class="label">Correo</label>
                </div>
                <div class="wrapILogin">
                  <input type="password" name="data-login" id="login-pass" class="input" required>
                  <label for="login-pass" class="label" >Contraseña</label>
                  <!-- <span class="olvi_contra"><a href="#">¿Olvidaste la contraseña?</a></span> -->
                </div>
                <div class="wrapILogin">
                  <button type="submit" class="btnsLogin" id="iniciar_se" >Iniciar sesion</button>
                  <button type="button" class="btnsLogin" id="btn_registro">¡registrate!</button>
                </div>
            </div>
          </form>
        </div>
        <div class="registro" id="registro">
          <form class="formulario" id='frmNew'>
            <div class="titulo">
              <h2>REGISTRATE</h2>
            </div>
            <div class="wrap-content-form-registro">
              <p>Ingrese lo datos correspondientes para poder Registrarse en el sistema</p>
              <div class="wrapILogin">
                <input type="text" class="input dataNewUser" required id="1">
                <label for="1"class="label">Nombre</label>
              </div>
              <div class="wrapILogin">
                <input type="text" class="input dataNewUser" required id="2">
                <label for="2" class="label">Apellidos</label>
              </div>

              <div class="wrapILogin" >
                <input type="text" class="input dataNewUser" required id="newEmail">
                <label for="newEmail" class="label">Correo</label>
              </div>
              <div class="wrapILogin">
                <input type="password" class="input dataNewUser" required id="contrasena">
                <label for="contrasena" class="label">Contraseña</label>
              </div>
              <div class="wrapILogin" id="debajo">
                <input type="password" class="input dataNewUser" required id="5">
                <label for="5" class="label">Confirmar contraseña</label>
              </div>
              <div class="wrapILogin">
                <button type="submit" class="btnsLogin" id="btn_regis">Registrarse!</button>
                <button type="button" id="btn_login" class="btnsLogin">volver</button>
              </div>
            </div>
          </form>
        </div>
      </div>
