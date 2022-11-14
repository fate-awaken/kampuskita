<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index() {
		$data['title'] = "KampusKita Home";
		$this->load->view('templates/header', $data);
		$this->load->view('view-home.php');
		$this->load->view('templates/footer');
	}
}
