<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacao extends CI_Controller {

	public function login() {
		$this->load->helper('url');
		$this->load->library('encryption');
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->load->model('usuario_model');

		$this->form_validation->set_rules('email','email', 'required|valid_email|max_length[45]');
		$this->form_validation->set_rules('senha', 'senha', 'required|max_length[45]');

		if (!$this->form_validation->run()) {
			die(json_encode(array('tipo' => 'alert', 'campos' => $this->form_validation->error_array())));
		}

		$usuario = $this->usuario_model->getUsuarioPorEmail($this->input->post('email'));
		
		if ($usuario) {
			if($this->encryption->decrypt($usuario['senha']) != $this->input->post('senha')) {
				die(json_encode(array('tipo' => 'alert', 'campos' => array('senha' => 'Senha invalida'))));
			}

			$this->session->set_userdata('email', $usuario["email"]);
			$this->session->set_userdata('nome', $usuario["nome"]);
			$this->session->set_userdata('idUsuario', $usuario["idusuario"]);

			die(json_encode(array('tipo' => 'success', 'mensagem' => 'login realizado com sucesso.', 'url' => base_url('registrar'))));
		}

		echo json_encode(array('tipo' => 'alert', 'campos' => array('mensagem' => 'Usuario ou senha invalido!')));
	}

	public function logout() {
		$this->load->helper('url');
		$this->load->library('session');
		$this->session->sess_destroy();

		redirect(base_url());
	}
}
?>