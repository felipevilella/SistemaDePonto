<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ponto_model extends CI_Model {

	function __construct(){
		$this->load->database();
	}

	public function set_ponto($dados) {
		$this->db->insert('ponto', $dados);
	}

	public function getPontoPorIdUsuario($idUsuario, $data) {
		$this->db->where('fk_idUsuario', $idUsuario);
		$this->db->where('data', $data);
		$this->db->query("SET sql_mode = '' ");
		$this->db->order_by('id_Ponto', 'asc');
		return $this->db->get('ponto')->result_array();
	}

	public function getHistoricoPonto($idUsuario, $dataInicial = false, $dataFinal = false) {
		$this->db->select('data');
		$this->db->where('fk_idUsuario', $idUsuario);

		if ($dataInicial && $dataFinal) {
			$this->db->where("data between'$dataInicial' and  '$dataFinal'");
		}

		$this->db->order_by('id_Ponto', 'asc');
		$this->db->query("SET sql_mode = '' ");
		$this->db->distinct('data');
		return $this->db->get('ponto')->result_array();
	}

	
	public function getHorariosPontoPorData($idUsuario, $data) {
		$this->db->join('tipo_ponto', 'idTipoPonto = fk_idTipoPonto');
		$this->db->where('fk_idUsuario', $idUsuario);
		$this->db->where('data', $data);
		$this->db->query("SET sql_mode = '' ");
		$this->db->order_by('id_Ponto', 'asc');
		return $this->db->get('ponto')->result_array();
	}

}