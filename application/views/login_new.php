<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="<?=base_url()?>../css/style.css">
    <script src="<?=base_url()?>../js/prefixfree.min.js"></script>
  </head>
  <body>

    <div class="form">

        <ul class="tab-group">
          <li class="tab active"><a href="#login">Iniciar Sesion</a></li>
          <li class="tab"><a href="#signup">Registrarse</a></li>
        </ul>

        <div class="tab-content">

          <div id="login">
            <h1>Ingresa tus datos!!</h1>

            <form action="http://localhost/cd/index.php/Login_controller/login_user" method="post">

            <div class="field-wrap">
              <input type="text" name="user" placeholder="Usuario"  required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <input type="password" name="pass" placeholder="Contraseña"  required autocomplete="off"/>
            </div>

            <p class="forgot"><a href="#">¿Olvidaste tu Contraseña?</a></p>
            <button class="button button-block"/>Aceptar</button>


            </form>

          </div>

          <div id="signup">
            <h1>Ingresa tus datos!!</h1>

            <form action="http://localhost/cd/index.php/Usuario/nuevo_usuario" method="post">

            <div class="top-row">
              <div class="field-wrap">
                <input type="text" name="nombre" placeholder="Nombre" value="<?php echo set_value('nombre') ?>" required autocomplete="off" />
              </div>

              <div class="field-wrap">
                <input type="text" name="apellido" placeholder="Apellido" value="<?php echo set_value('apellido') ?>" required autocomplete="off" />
              </div>
            </div>

            <div class="field-wrap">
              <input type="hidden" name="grabar" value="si" />
              <input type="text" name="correo" placeholder="Correo" value="<?php echo set_value('correo') ?>" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <input type="text" name="direccion" placeholder="Direccion" value="<?php echo set_value('direccion') ?>" required autocomplete="off" />
            </div>

           <div class="field-wrap">
              <input type="text" name="telefono" placeholder="Telefono" value="<?php echo set_value('telefono') ?>" required autocomplete="off" />
            </div>

            <div class="field-wrap">
               <input type="text" name="nick" placeholder="Usuario" value="<?php echo set_value('nick') ?>" required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <input type="password" name="pass" placeholder="Contraseña" required autocomplete="off" />
            </div>

            <button class="button button-block" type="submit" value="Registrarme" title="Registrarme"/>Registrarse</button>

            </form>

            <font color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline"><?php echo validation_errors(); ?></font>

          </div>



        </div><!-- tab-content -->

  </div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="<?=base_url()?>../js/index.js"></script>
<script src="<?=base_url()?>../js/prefixfree.min.js"></script>
  </body>
</html>
