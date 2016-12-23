<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}

  var $detalles;

  function validate_user( $user, $pass ) {

      $this->db->from('usuario');
      $this->db->where('nick_usuario',$user );
      $this->db->where( 'pass_usuario', $pass);
      $login = $this->db->get()->result();

      if ( is_array($login) && count($login) == 1 ) {

          $this->detalles = $login[0];

          $this->set_session();
          return true;
      }

      return false;
  }

  function set_session() {

     $this->session->set_userdata( array(
              'perfil'=> $this->detalles->perfil_usuario,
              'isLoggedIn'=>true
          )
      );


  }

}
