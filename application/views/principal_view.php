<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="<?=base_url()?>../css/style.css">
    <script src="<?=base_url()?>../js/prefixfree.min.js"></script>  
     
     <script type="text/javascript">
          var base_url = '<?=base_url()?>';
     </script>
  </head>
  <body>

   <div class="form2">
     <h1>Usuario Logueado!!</h1>
         
     <br/>     
     <table id="tlbusuarios" class="table">
       <tr>
         <th>Id</th><th>|</th>
         <th>Nombre</th><th>|</th>
         <th>Apellido</th><th>|</th>
         <th>Correo</th><th>|</th>
         <th>Direccion</th><th>|</th>
         <th>Telefono</th><th>|</th>
         <th>Nick</th><th>|</th>
         <th>Pass</th><th>|</th>
         <th>Perfil</th><th>|</th>
         <th>Modificar</th><th>|</th>
         <th>Eliminar</th>
       </tr>       
     </table>    
    </div> <!--Div Form-->

 <div class="modal-wrapper" id="popup">
    <div class="popup-contenedor">      
       <div id="signup">
            <h1>Actualiza tus datos!!</h1>            
            <input id="frm_id" type="hidden"/>
            <div class="top-row">
              <div class="field-wrap">
                <input type="text" id="frm_nombre" name="nombre" placeholder="Nombre"  required autocomplete="off" />
              </div>

              <div class="field-wrap">
                <input type="text" id="frm_apellido" name="apellido" placeholder="Apellido"  required autocomplete="off" />
              </div>
            </div>

            <div class="field-wrap">
              <input type="hidden" name="grabar" value="si" />
              <input type="text" id="frm_correo" name="correo" placeholder="Correo"  required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <input type="text" id="frm_direccion" name="direccion" placeholder="Direccion"  required autocomplete="off" />
            </div>

           <div class="field-wrap">
              <input type="text" id="frm_telefono" name="telefono" placeholder="Telefono" required autocomplete="off" />
            </div>

            <div class="field-wrap">
               <input type="text" id="frm_nick" name="nick" placeholder="Usuario"  required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <input type="password" id="frm_pass" name="pass" placeholder="Contraseña" required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <select id="frm_perfil">
                <option>empleado</option>
                <option>administrador</option>
              </select>
            </div>

            <a class="button button-block" id="btn_modificarUsuario" value="Actualizar" title="Actualizar"/>Actualizar</a>
            <a class="button button-block" href="#" value="Cancelar" title="Cancelar"/>Cancelar</a>
            </form>

            <font color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline"><?php echo validation_errors(); ?></font>

          </div>
       <a class="popup-cerrar" href="#">X</a>
    </div>
</div>




<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="<?=base_url()?>../js/index.js"></script>
    <script src="<?=base_url()?>../js/usuario.js"></script>    
<script src="<?=base_url()?>../js/prefixfree.min.js"></script>
  </body>
</html>
