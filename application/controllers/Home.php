<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAdmin');
	}

	public function index()
	{
		$title['title'] = "KampusKita - Home";
		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('view-home.php');
		$this->load->view('templates/footer');
	}
}
