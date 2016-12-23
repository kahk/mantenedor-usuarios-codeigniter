<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

  function __construct()
  {
  		parent::__construct();
      $this->load->model('usuario_model');
  }

	public function index()
	{
    $data['title'] = 'Formulario de registro';
		$data['head'] = 'Regístrate desde aquí';
		$this->load->view('login_new',$data);
	}


  function nuevo_usuario()
  	{
  		if(isset($_POST['grabar']) and $_POST['grabar'] == 'si')
  		{
  			//SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
  			$this->form_validation->set_rules('nombre','Nombre','required');
  			$this->form_validation->set_rules('apellido','Apellido','required');
  			$this->form_validation->set_rules('correo','Correo','required');
  			$this->form_validation->set_rules('direccion','Direccion','required');
        $this->form_validation->set_rules('telefono','Telefono','required');
  			$this->form_validation->set_rules('nick','Usuario','required');
  			$this->form_validation->set_rules('pass','Password','required');

  			//SI HAY ALGÚNA REGLA DE LAS ANTERIORES QUE NO SE CUMPLE MOSTRAMOS EL MENSAJE
  			//EL COMODÍN %s SUSTITUYE LOS NOMBRES QUE LE HEMOS DADO ANTERIORMENTE, EJEMPLO,
  			//SI EL NOMBRE ESTÁ VACÍO NOS DIRÍA, EL NOMBRE ES REQUERIDO, EL COMODÍN %s
  			//SERÁ SUSTITUIDO POR EL NOMBRE DEL CAMPO
  			$this->form_validation->set_message('required', 'El %s es requerido');
  	        $this->form_validation->set_message('valid_email', 'El %s no es válido');

  			//SI ALGO NO HA IDO BIEN NOS DEVOLVERÁ AL INDEX MOSTRANDO LOS ERRORES
  			if($this->form_validation->run()==FALSE)
  			{
  				$this->index();
  			}else{
  			//EN CASO CONTRARIO PROCESAMOS LOS DATOS
  				$nombre = $this->input->post('nombre');
  				$apellido = $this->input->post('apellido');
  				$correo = $this->input->post('correo');
  				$direccion = $this->input->post('direccion');
          $telefono = $this->input->post('telefono');
  				$nick = $this->input->post('nick');
  				$password = $this->input->post('pass');
                          //ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
  				$insert = $this->usuario_model->new_user($nombre,$apellido,$correo,$direccion,$telefono,$nick,$password);
  				//si el modelo nos responde afirmando que todo ha ido bien, envíamos un correo
  				//al usuario y lo redirigimos al index, en verdad deberíamos redirigirlo al home de
  				//nuestra web para que puediera iniciar sesión

          //cargamos la libreria email de ci
          		$this->load->library("email");

          		//configuracion para gmail
          		$configGmail = array(
          			'protocol' => 'smtp',
          			'smtp_host' => 'ssl://smtp.gmail.com',
          			'smtp_port' => 465,
          			'smtp_user' => 'moyaayalajuanmanuel@gmail.com',
          			'smtp_pass' => 'manuelitogbxd1234',
          			'mailtype' => 'html',
          			'charset' => 'utf-8',
          			'newline' => "\r\n"
          		);

              //cargamos la configuración para enviar con gmail
              		$this->email->initialize($configGmail);

              		$this->email->from('moyaayalajuanmanuel@gmail.com');//EMAIL DE QUIEN ENVIA EL CORREO
              		$this->email->to($correo); //DESTINATARIO
                  $this->email->subject('Bienvenido/a al Sistema');
          				$this->email->message('<h2>' . $nombre . ' gracias por registrarte en el sistema</h2><hr><br><br>
          				Tu nombre de usuario es: ' . $nick . '.<br>Tu password es: ' . $password);
          				$this->email->send();// ENVIAR CORREO

  			}
  		}
  	}

		function mostrar_usuarios(){
			echo json_encode($this->usuario_model->getUsuarios());
		}

		function actualizarUsuario(){
			  $id = $this->input->post('id_usuario');
        $nombre = $this->input->post('nombre_usuario');
				$apellido = $this->input->post('apellido_usuario');
				$correo = $this->input->post('correo_usuario');
				$direccion = $this->input->post('direccion_usuario');
				$telefono = $this->input->post('telefono_usuario');
				$nick = $this->input->post('nick_usuario');
				$pass = $this->input->post('pass_usuario');
				$perfil = $this->input->post('perfil_usuario');

				$datos_actualizar = array(
					"nombre_usuario"=>$nombre,
					"apellido_usuario"=>$apellido,
					"correo_usuario"=>$correo,
					"direccion_usuario"=>$direccion,
					"telefono_usuario"=>$telefono,
					"nick_usuario"=>$nick,
					"pass_usuario"=>$pass,
					"perfil_usuario"=>$perfil
				);

				$this->usuario_model->actualizar_usuario($datos_actualizar, $id);
		}

		function eliminar_usuario(){
		$idU = $this->input->post('idU');
		$this->usuario_model->eliminar_usuario($idU);
		}


}
