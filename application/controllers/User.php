<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAdmin');
	}

	public function loadPageMahasiswa()
	{
		$data['title'] = "Dashboard Mahasiswa - KampusKita";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar-user-mahasiswa');
		$this->load->view('user/view-user-mahasiswa.php');
		$this->load->view('templates/footer');
	}

	public function loadKelasMahasiswaPage()
	{
		$data['title'] = "Daftar Kelas - KampusKita";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar-user-mahasiswa');
		$this->load->view('user/view-kelas-mahasiswa.php');
		$this->load->view('templates/footer');
	}

	public function viewProfileMahasiswa()
	{
		$data['title'] = "Profile - KampusKita";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar-user-mahasiswa');
		$this->load->view('user/view-profile-mahasiswa.php');
		$this->load->view('templates/footer');
	}
	
	public function loadPageDosen()
	{
		$data['title'] = "Dashboard Dosen - KampusKita";
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar-user-dosen');
		$this->load->view('user/view-user-dosen.php');
		$this->load->view('templates/footer');
	}
	
	public function loadKelasDosenPage()
	{
		$data['title'] = "Daftar Kelas - KampusKita";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar-user-dosen');
		$this->load->view('user/view-kelas-dosen.php');
		$this->load->view('templates/footer');
	}
	
	public function loadNilaiDosenPage()
	{
		$data['title'] = "Daftar Nilai - KampusKita";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar-user-dosen');
		$this->load->view('user/view-nilai-dosen.php');
		$this->load->view('templates/footer');
	}

	public function viewProfileDosen()
	{
		$data['title'] = "Profile - KampusKita";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar-user-dosen');
		$this->load->view('user/view-profile-dosen.php');
		$this->load->view('templates/footer');
	}
}
