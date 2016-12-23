<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

  function __construct()
  {
      parent::__construct();
      $this->load->model('login_model');
  }

	public function index()
	{
    if( $this->session->userdata('perfil') == "empleado" ) {
        $this-load-view("principal_view");
    } else {
        $this->load-view('login_new');
    }
	}

  function login_user() {

        $user = $this->input->post('user');
        $pass  = $this->input->post('pass');

        if( $user && $pass && $this->login_model->validate_user($user,$pass)) {
           $this->load->view("principal_view");
        } else {
            echo "Usuario No Valido";
            $this->load->view('login_view');
        }
    }

}
