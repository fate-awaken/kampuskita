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

	public function viewProfile()
	{

		$title['title'] = "KampusKita Profile";
		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('view-home-profile.php');
		$this->load->view('templates/footer');
	}
}
