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
		$this->load->view('templates/sidebar');
		$this->load->view('view-mahasiswa.php', $data);
		$this->load->view('templates/footer');
	}

	public function tambahmhs()
	{
		$queryAllMahasiswa = $this->ModelAdmin->getDataMahasiswa();
		$data = array('queryAllMhs' => $queryAllMahasiswa);
		$title['title'] = 'Data Mahasiswa';
		$this->form_validation->set_rules('nim', 'NIM', 'required');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $title);
			$this->load->view('templates/sidebar');
			$this->load->view('view-mahasiswa', $data);
			$this->load->view('templates/footer');
		} else {
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
	
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil ditambahkan!</div>');
	
			redirect('home');
		}
	}

	public function editmhs()
	{
		$id = $this->input->post('id');
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$jurusan = $this->input->post('jurusan');

		$data = [
			'nim' => $nim,
			'nama' => $nama,
			'email' => $email,
			'jurusan' => $jurusan
		];

		$where = [
			'id' => $id
		];

		$this->ModelAdmin->editDataMahasiswa($where, $data, 'mahasiswa');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil diubah!</div>');

		redirect('home');
	}

	public function deletemhs($id)
	{
			$this->ModelAdmin->deleteDataMahasiswa($id);
			redirect('home');
	}

}
