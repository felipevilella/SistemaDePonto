<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

	public function index() {
		$this->load->helper('url');
		
		$this->load->view('templates/header_inicial');
		$this->load->view('dashbord/cadastro');
		$this->load->view('templates/footer');
	}

	public function cadastrar() {
		$this->load->model('usuario_model');
		$this->load->library('encryption');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome', 'nome', 'required|max_length[45]|min_length[2]');
		$this->form_validation->set_rules('email','email', 'required|valid_email|max_length[45]');
		$this->form_validation->set_rules('senha', 'senha', 'required|max_length[45]');
		$this->form_validation->set_rules('senhaConfirma', 'senhaConfirma', 'required|max_length[45]');

		if (!$this->form_validation->run()) {
			die(json_encode(array('tipo' => 'alert', 'campos' => $this->form_validation->error_array())));
		}

		$usuario = $this->usuario_model->getUsuarioPorEmail($this->input->post('email'));

		if ($usuario) {
			die(json_encode(array('tipo' => 'alert', 'campos' => array('email' => 'Este email já existe!'))));
		}

		if ($this->input->post('senha') != $this->input->post('senhaConfirma')) {
			die(json_encode(array('tipo' => 'alert', 'campos' => array('senhaConfirma' => 'Senhas divergentes'))));
		}

		$dadosUsuario = array(
			'nome' => $this->input->post('nome'),
			'senha' => $this->encryption->encrypt($this->input->post('senha')),
			'email' => $this->input->post('email')
		);

		$usuario = $this->usuario_model->set_usuario($dadosUsuario);

		echo json_encode(array('tipo' => 'success', 'mensagem' => 'cadastro realizado com sucesso'));
	}
 

}
?>