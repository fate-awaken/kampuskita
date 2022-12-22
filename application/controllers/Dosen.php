<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAdmin');
	}

	public function index()
	{
		$queryAllDosen = $this->ModelAdmin->getDataDosen();
		$data = array('dosen' => $queryAllDosen);
		$title['title'] = "KampusKita Home";

		$config['base_url'] = 'http://localhost/kampuskita/dosen/index';

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
		$this->db->or_like('nip', $data['keyword']);
		$this->db->from('dosen');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 7;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['dosen'] = $this->ModelAdmin->getDosen($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('view-dosen.php', $data);
		$this->load->view('templates/footer');
	}

	public function tambahdsn()
	{
		$queryAllDosen = $this->ModelAdmin->getDataDosen();
		$data = array('dosen' => $queryAllDosen);
		$title['title'] = 'Data Dosen';
		$dataPageActive['dataPageActive'] = "active";

		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $title);
			$this->load->view('templates/sidebar', $dataPageActive);
			$this->load->view('view-dosen', $data);
			$this->load->view('templates/footer');
		} else {
			$nip = $this->input->post('nip');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');

			$ArrInsert = array(
				'nip' => $nip,
				'nama' => $nama,
				'email' => $email,

			);

			$this->ModelAdmin->insertDataDosen($ArrInsert);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil ditambahkan!</div>');

			redirect('dosen');
		}
	}

	public function editdsn()
	{
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');

		$data = [
			'nip' => $nip,
			'nama' => $nama,
			'email' => $email,
		];

		$where = [
			'id' => $id
		];

		$this->ModelAdmin->editDataDosen($where, $data, 'dosen');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil diubah!</div>');

		redirect('dosen');
	}

	public function deletedsn($id)
	{
		$where = array('id' => $id);
		$this->ModelAdmin->deleteDataDosen($where, 'dosen');
		redirect('dosen');
	}
}
