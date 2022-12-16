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
		$data = array('queryAllMhs' => $queryAllMahasiswa);
		$title['title'] = "KampusKita Mahasiswa";
		$dataPageActive['dataPageActive'] = "active";

		//pagination
		//config
		$config['base_url'] = 'http://localhost/kampuskita/mahasiswa/index';
		$config['total_rows'] = $this->ModelAdmin->countAllMahasiswa();
		$config['per_page'] = 3;
		// $config['num_links'] = 1;

		//styling
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['firs_tag_open'] = ' <li class="page-item">';
		$config['first_tag_close'] = ' </li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = ' <li class="page-item">';
		$config['last_tag_close'] = ' </li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = ' <li class="page-item">';
		$config['next_tag_close'] = ' </li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = ' <li class="page-item">';
		$config['prev_tag_close'] = ' </li>';

		$config['cur_tag_open'] = ' <li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = ' </a></li>';

		$config['num_tag_open'] = ' <li class="page-item ">';
		$config['num_tag_close'] = ' </li>';

		$config['attributes'] = array('class' => 'page-link');


		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['mahasiswa'] = $this->ModelAdmin->getMahasiswa($config['per_page'], $data['start']);

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar', $dataPageActive);
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

	public function deletemhs($id)
	{
		$this->ModelAdmin->deleteDataMahasiswa($id);
		redirect('mahasiswa');
	}

}
