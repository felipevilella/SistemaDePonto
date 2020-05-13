<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index() {
		$this->load->helper('url');
		
		$this->load->view('templates/header_inicial');
		$this->load->view('dashbord/login');
		$this->load->view('templates/footer');
	}


}
?>