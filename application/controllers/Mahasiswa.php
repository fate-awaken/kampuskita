<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAdmin');
	}
 
	public function index()
	{
		$queryAllMahasiswa = $this->ModelAdmin->getDataMahasiswa();
		$data = array('mahasiswa' => $queryAllMahasiswa);
		$title['title'] = "KampusKita Mahasiswa";

		$config['base_url'] = 'http://localhost/kampuskita/mahasiswa/index';

		//ambil data keyword
		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//pagination
		//config
		$this->db->like('nama', $data['keyword']);
		$this->db->or_like('email', $data['keyword']);
		$this->db->or_like('jurusan', $data['keyword']);
		$this->db->or_like('nim', $data['keyword']);
		$this->db->from('mahasiswa');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 7;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['mahasiswa'] = $this->ModelAdmin->getMahasiswa($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('view-mahasiswa.php', $data);
		$this->load->view('templates/footer');
	}

	public function tambahmhs()
	{
		$queryAllMahasiswa = $this->ModelAdmin->getDataMahasiswa();
		$data = array('mahasiswa' => $queryAllMahasiswa);
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

			redirect('mahasiswa');
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

		redirect('mahasiswa');
	}

	function deleteMhs($id)
	{
		$where = array('id' => $id);
		$this->ModelAdmin->deleteDataMahasiswa($where, 'mahasiswa');
		redirect('mahasiswa');
	}
}
