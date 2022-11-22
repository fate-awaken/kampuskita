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
		$queryAllMahasiswa = $this->ModelAdmin->getDataMahasiswa();
		$data = array('queryAllMhs' => $queryAllMahasiswa);
		$title['title'] = "KampusKita Home";
		$this->load->view('templates/header', $title);
		$this->load->view('view-home.php', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$title['title'] = "Tambah Data Mahasiswa";
		$this->load->view('templates/header', $title);
		$this->load->view('view-add');
		$this->load->view('templates/footer');
	}

	public function edit($nim)
	{
		$queryMahasiswaDetail = $this->ModelAdmin->getDataMahasiswaDetail($nim);
		$data = array('queryMhsDetail' => $queryMahasiswaDetail);
		$title['title'] = "Edit Data Mahasiswa";
		$this->load->view('templates/header', $title);
		$this->load->view('view-edit', $data);
		$this->load->view('templates/footer');
	}

	public function tambahmhs()
	{
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$jurusan = $this->input->post('jurusan');

		$ArrInsert = array(
			'nim' => $nim,
			'nama' => $nama,
			'email' => $email,
			'jurusan' => $jurusan

		);

		$this->ModelAdmin->insertDataMahasiswa($ArrInsert);
		redirect('home');
	}

	public function editmhs()
	{
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$jurusan = $this->input->post('jurusan');

		$ArrUpdate = array(
			'nama' => $nama,
			'email' => $email,
			'jurusan' => $jurusan
		);

		$this->ModelAdmin->updateDataMahasiswa($nim, $ArrUpdate);
		redirect('home');
	}

	public function deletemhs($nim)
	{
		$this->ModelAdmin->deleteDataMahasiswa($nim);
		redirect('home');
	}
}
