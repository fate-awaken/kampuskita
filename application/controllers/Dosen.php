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

		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[dosen.nip]', [
			'is_unique' => 'Nama Sudah Terdaftar!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[dosen.email]', [
			'is_unique' => 'Email Sudah Terdaftar!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $title);
			$this->load->view('templates/sidebar');
			$this->load->view('view-dosen-error', $data);
			$this->load->view('templates/footer');
		} else {
			$nip = $this->input->post('nip');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$role_id = $this->input->post('role_id');
			$is_active = $this->input->post('is_active');

			$data = array(
				'nip' => $nip,
				'nama' => $nama,
				'email' => $email,
				'password' => $password,
				'role_id' => $role_id,
				'is_active' => $is_active

			);

			$dataAkun = array(
				'email' => $email,
				'password' => $password,
				'role_id' => $role_id,
				'is_active' => $is_active
			);

			$this->ModelAdmin->insertDataDosen($data);
			$this->ModelAdmin->insertAkunDosen($dataAkun);

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
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$role_id = $this->input->post('role_id');
		$is_active = $this->input->post('is_active');

		$data = [
			'nip' => $nip,
			'nama' => $nama,
			'email' => $email,
			'password' => $password,
			'role_id' => $role_id,
			'is_active' => $is_active

		];

		$dataAkun = [
			'email' => $email,
			'password' => $password,
			'role_id' => $role_id,
			'is_active' => $is_active
		];

		$whereAkun = [
			'email' => $email
		];

		$where = [
			'id' => $id
		];

		$this->ModelAdmin->editDataDosen($where, $data, 'dosen');
		$this->ModelAdmin->editAkunDosen($whereAkun, $dataAkun, 'user');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil diubah!</div>');

		redirect('dosen');
	}

	public function searchdsn()
	{
		$queryAllDosen = $this->ModelAdmin->getDataDosen();
		$data = array('dosen' => $queryAllDosen);
		$title['title'] = "KampusKita Home";

		//pagination
		$config['base_url'] = 'http://localhost/kampuskita/dosen/index/';
		$config['total_rows'] = $this->ModelAdmin->countAllDosen();
		$config['per_page'] = 7;
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
		$keyword = $this->input->post('keyword');
		$data['dosen'] = $this->ModelAdmin->searchDataDosen($keyword);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('view-dosen', $data);
		$this->load->view('templates/footer');
	}

	public function deletedsn($id)
	{
		$where = array('id' => $id);
		$this->ModelAdmin->deleteDataDosen($where, 'dosen');
		redirect('dosen');
	}
}
