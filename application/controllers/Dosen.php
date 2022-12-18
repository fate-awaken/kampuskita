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
		$data = array('queryAllDsn' => $queryAllDosen);
		$title['title'] = "KampusKita Home";

		$config['base_url'] = 'http://localhost/kampuskita/home/getdatadosen';
		$config['total_rows'] = $this->ModelAdmin->countAllDosen();
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
		$data['dosen'] = $this->ModelAdmin->getDosen($config['per_page'], $data['start']);


		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('view-dosen.php', $data);
		$this->load->view('templates/footer');
	}

	public function tambahdsn()
	{
		$queryAllDosen = $this->ModelAdmin->getDataDosen();
		$data = array('queryAllDsn' => $queryAllDosen);
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
		$this->ModelAdmin->deleteDataMahasiswa($where, 'dosen');
		redirect('dosen');
	}
}
