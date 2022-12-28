<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAdmin');
		$this->load->model('ModelUser');
	}

	public function loadPageMahasiswa()
	{
		if ($this->session->userdata('email')) {

			$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		}
		$data['title'] = "Dashboard Mahasiswa - KampusKita";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar-user-mahasiswa');
		$this->load->view('user/view-user-mahasiswa.php', $data);
		$this->load->view('templates/footer');
	}

	public function loadProfileMahasiswa()
	{
		if ($this->session->userdata('email')) {

			$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		}
		$data['title'] = "Profile Mahasiswa";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar-user-mahasiswa');
		$this->load->view('user/view-profile-mahasiswa.php');
		$this->load->view('templates/footer');
	}

	public function changePasswordMahasiswa()
	{
		if ($this->session->userdata('email')) {

			$data['mahasiswa'] = $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
		}

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Profile";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar-user-mahasiswa');
			$this->load->view('user/view-profile-mahasiswa.php', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['mahasiswa']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah!</div>');
				redirect('user/loadProfileMahasiswa');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak sama!</div>');
					redirect('user/loadProfileMahasiswa');
				} else {
					// password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$where = $this->session->userdata('email');

					$this->ModelUser->ubahPasswordAkunMahasiswa($password_hash, $where);
					$this->ModelUser->ubahPasswordDataMahasiswa($password_hash, $where);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
					redirect('user/loadProfileMahasiswa');
				}
			}
		}
	}

	public function loadKelasMahasiswaPage()
	{
		$data['title'] = "Daftar Kelas - KampusKita";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar-user-mahasiswa');
		$this->load->view('user/view-kelas-mahasiswa.php');
		$this->load->view('templates/footer');
	}
	
	public function loadPageDosen()
	{
		if ($this->session->userdata('email')) {
			
			$data['dosen'] = $this->db->get_where('dosen', ['email' => $this->session->userdata('email')])->row_array();
		}
		$data['title'] = "Dashboard Dosen - KampusKita";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar-user-dosen');
		$this->load->view('user/view-user-dosen.php', $data);
		$this->load->view('templates/footer');
	}

	public function loadProfileDosen()
	{
		if ($this->session->userdata('email')) {

			$data['dosen'] = $this->db->get_where('dosen', ['email' => $this->session->userdata('email')])->row_array();
		}
		$data['title'] = "Profile Dosen";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar-user-dosen');
		$this->load->view('user/view-profile-dosen.php');
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


	public function changePasswordDosen()
	{
		if ($this->session->userdata('email')) {

			$data['dosen'] = $this->db->get_where('dosen', ['email' => $this->session->userdata('email')])->row_array();
		}

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Profile";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar-user-dosen');
			$this->load->view('user/view-profile-dosen.php', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');

			if (!password_verify($current_password, $data['dosen']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah!</div>');
				redirect('user/loadProfileDosen');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak sama!</div>');
					redirect('user/loadProfileDosen');
				} else {
					// password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$where = $this->session->userdata('email');

					$this->ModelUser->ubahPasswordAkunDosen($password_hash, $where);
					$this->ModelUser->ubahPasswordDataDosen($password_hash, $where);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
					redirect('user/loadProfileDosen');
				}
			}
		}
	}
}
