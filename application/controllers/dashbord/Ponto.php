<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ponto extends CI_Controller {

	public function index() {
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('ponto_model');

		if(empty($this->session->userdata('email'))){
			redirect(base_url());
		}

		$data['primeiroNome'] = primeiroNome($this->session->userdata('nome'));
		$data['nome'] = $this->session->userdata('nome');


		$pontoDiario = $this->ponto_model->getPontoPorIdUsuario($this->session->userdata('idUsuario'), date('Y-m-d'));

		if ($pontoDiario) {
			if(count($pontoDiario) == '4') {
				$data['diaConcluido'] = True;
			}

			$data['ultimoPonto'] = $this->ultimoRegistro($pontoDiario);
		} else {
			$pontoDiaAnterior = $this->ponto_model->getPontoPorIdUsuario($this->session->userdata('idUsuario'), date('Y-m-d', strtotime("- 1 day")));
			$data['ultimoPonto'] = $this->ultimoRegistro($pontoDiaAnterior);
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('dashbord/registro');
		$this->load->view('templates/footer');
	}

	public function historico() {
		$this->load->model('ponto_model');
		$this->load->library('session');
		$this->load->helper('url');

		if(empty($this->session->userdata('email'))){
			redirect(base_url());
		}

		$data['primeiroNome'] = primeiroNome($this->session->userdata('nome'));
		$data['nome'] = $this->session->userdata('nome');

		$data['pontos'] = $this->ponto_model->getHistoricoPonto($this->session->userdata('idUsuario'));
		$data['html'] = $this->load->view('dashbord/template/historicoPonto', $data, true);
		
		$this->load->view('templates/header', $data);
		$this->load->view('dashbord/historico');
		$this->load->view('templates/footer');
	}

	public function buscarPontoPorData() {
		$this->load->model('ponto_model');
		$this->load->library('session');

		$dataInicial = $this->input->post('dataInicial');
		$dataFinal = $this->input->post('dataFinal');

		if (!$dataInicial && $dataFinal) {
			$dataInicial = date('Y-m-d');
		} else if($dataInicial && !$dataFinal) {
			$dataFinal = date('Y-m-d', strtotime("+ 30 days"));
		}
	
		$data['pontos'] = $this->ponto_model->getHistoricoPonto($this->session->userdata('idUsuario'), $dataInicial, $dataFinal);
		$html = $this->load->view('dashbord/template/historicoPonto', $data, true);

		echo json_encode(array('tipo' => 'success', 'html' => $html));
	}

	public function detalharPonto() {
		$this->load->model('ponto_model');
		$this->load->library('session');

		$data = $this->input->post('data');
		$dados['pontos'] = $this->ponto_model->getHorariosPontoPorData($this->session->userdata('idUsuario'), $data);
		$html = $this->load->view('dashbord/template/detalharPonto', $dados, true);
		$tituloModal =  date('D d  M', strtotime($data));

		echo json_encode(array('tipo' => 'success', 'html' => $html, 'tituloModal' => $tituloModal));
	}

	public function registrarPonto() {
		$this->load->library('session');
		$this->load->model('ponto_model');

		$pontoDiario = $this->ponto_model->getPontoPorIdUsuario($this->session->userdata('idUsuario'), date('Y-m-d'));
		$dados['fk_idUsuario'] = $this->session->userdata('idUsuario');
		$dados['horario'] = date('H:i:s', strtotime('- 3 hours'));
		$dados['data'] = date('Y-m-d');

		if(!$pontoDiario) {
			$dados['fk_idTipoPonto'] = filtrarCodigoTipoPonto('Inicio expediente');
		} else {
			if(count($pontoDiario) == 1) {
				$dados['fk_idTipoPonto'] = filtrarCodigoTipoPonto('Saida Almoço');
			} else if(count($pontoDiario) == 2) {
				$dados['fk_idTipoPonto'] = filtrarCodigoTipoPonto('retorno almoço');
			} else if(count($pontoDiario) == 2) {
				$dados['fk_idTipoPonto'] = filtrarCodigoTipoPonto('Final expediente');
			}
		}

		$this->ponto_model->set_ponto($dados);
		echo json_encode(array('tipo'=>'success', 'mensagem' => 'Ponto registrado'));
	}

	private function ultimoRegistro($ponto) {
		if ($ponto) {
			$ultimoPonto = end($ponto);
			$data['dataPonto'] = date('d/m', strtotime($ultimoPonto['data']));
			$data['horarioPonto'] = $ultimoPonto['horario'];
		} else {
			$data['dataPonto'] = "00/00";
			$data['horarioPonto'] = "00:00:00";
		}

		return $data;
	}


}
?>