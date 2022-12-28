<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAdmin');
		$this->load->model('ModelUser');
	}

	public function index()
	{
		$queryAllMahasiswa = $this->ModelAdmin->getDataMahasiswa();
		$data = array('mahasiswa' => $queryAllMahasiswa);
		$title['title'] = "KampusKita Mahasiswa";

		$config['base_url'] = 'http://localhost/kampuskita/mahasiswa/index';

		//ambil data keyword
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword', $data);
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

		$this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[mahasiswa.nim]', [
			'is_unique' => 'NIM Sudah Terdaftar!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[mahasiswa.email]', [
			'is_unique' => 'Email Sudah Terdaftar!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $title);
			$this->load->view('templates/sidebar');
			$this->load->view('view-mahasiswa-error', $data);
			$this->load->view('templates/footer');
		} else {
			$nim = $this->input->post('nim');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$jurusan = $this->input->post('jurusan');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$role_id = $this->input->post('role_id');
			$is_active = $this->input->post('is_active');

			$data = array(
				'nim' => $nim,
				'nama' => $nama,
				'email' => $email,
				'jurusan' => $jurusan,
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

			$this->ModelAdmin->insertDataMahasiswa($data);
			$this->ModelAdmin->insertAkunMahasiswa($dataAkun);

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
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$role_id = $this->input->post('role_id');
		$is_active = $this->input->post('is_active');

		$data = [
			'nim' => $nim,
			'nama' => $nama,
			'email' => $email,
			'jurusan' => $jurusan,
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

		$this->ModelAdmin->editDataMahasiswa($where, $data, 'mahasiswa');
		$this->ModelAdmin->editAkunMahasiswa($whereAkun, $dataAkun, 'user 	');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah berhasil diubah!</div>');

		redirect('mahasiswa');
	}

	public function searchMhs()
	{
		$queryAllMahasiswa = $this->ModelAdmin->getDataMahasiswa();
		$data = array('mahasiswa' => $queryAllMahasiswa);
		$title['title'] = "KampusKita Mahasiswa";

		//pagination
		//config
		$config['base_url'] = 'http://localhost/kampuskita/mahasiswa/index';
		$config['total_rows'] = $this->ModelAdmin->countAllMahasiswa();
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
		$data['mahasiswa'] = $this->ModelAdmin->getMahasiswa($config['per_page'], $data['start']);
		$keyword = $this->input->post('keyword');
		$data['mahasiswa'] = $this->ModelAdmin->searchDataMahasiswa($keyword);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('view-mahasiswa', $data);
		$this->load->view('templates/footer');
	}

	function deleteMhs($id)
	{
		$where = array('id' => $id);
		$this->ModelAdmin->deleteDataMahasiswa($where, 'mahasiswa');
		redirect('mahasiswa');
	}
}
