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
		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('view-dosen.php', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$title['title'] = "Tambah Data Mahasiswa";
		$this->load->view('templates/header', $title);
		$this->load->view('view-add-dosen');
		$this->load->view('templates/footer');
	}

	public function edit($nip)
	{
		$queryDosenDetail = $this->ModelAdmin->getDataDosenDetail($nip);
		$data = array('queryDsnDetail' => $queryDosenDetail);
		$title['title'] = "Edit Data Mahasiswa";
		$this->load->view('templates/header', $title);
		$this->load->view('view-edit-dosen', $data);
		$this->load->view('templates/footer');
	}

	public function tambahdsn()
	{
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');

		$ArrInsert = array(
			'nip' => $nip,
			'nama' => $nama,
			'email' => $email,

		);

		$this->ModelAdmin->insertDataDosen($ArrInsert);
		redirect('dosen');
	}

	public function editdsn()
	{
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');

		$ArrUpdate = array(
			'nama' => $nama,
			'email' => $email,
		);

		$this->ModelAdmin->updateDataDosen($nip, $ArrUpdate);
		redirect('dosen');
	}

	public function deletemhs($nip)
	{
		$this->ModelAdmin->deleteDataDosen($nip);
		redirect('dosen');
	}
}
