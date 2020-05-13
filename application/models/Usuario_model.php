<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario_model extends CI_Model {

	function __construct(){
		$this->load->database();
	}

	public function set_usuario($dados) {
		$this->db->insert('usuario', $dados);
	}

	public function getUsuarioPorEmail($email) {
		$this->db->where('email', $email);
		return $this->db->get('usuario')->row_array();
	}

}