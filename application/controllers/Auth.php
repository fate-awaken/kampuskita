<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function admin()
	{
		if ($this->session->userdata('username')) {
			redirect('home');
		}
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = "KampusKita Login";
			$this->load->view('templates/header', $data);
			$this->load->view('view-login.php');
			$this->load->view('templates/footer');
		} else {
			$this->adminLogin();
		}
	}

	private function adminLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$admin = $this->db->get_where('admin', ['username' => $username])->row_array();

		if ($admin) {
			if (password_verify($password, $admin['password'])) {
				redirect('home');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
				redirect('auth/admin');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Username!</div>');
			redirect('auth/admin');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registration';
			$this->load->view('templates/header', $data);
			$this->load->view('view-register');
			$this->load->view('templates/footer');
		} else {
			if ($this->input->post('accountType') == 'Admin') {

				$role_id = 1;
				$data = [
					'username' => htmlspecialchars($this->input->post('username')),
					'email' => htmlspecialchars($this->input->post('email')),
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => $role_id,
					'date_created' => time()
				];

				$this->db->insert('admin', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
				redirect('auth/admin');
			} elseif ($this->input->post('accountType') == 'Mahasiswa') {

				$role_id = 2;
				$data = [
					'username' => htmlspecialchars($this->input->post('username')),
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'email' => htmlspecialchars($this->input->post('email')),
					'role_id' => $role_id,
					'date_created' => time()
				];

				$this->db->insert('user', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
				redirect('auth');
			} elseif ($this->input->post('accountType') == 'Dosen') {

				$role_id = 3;
				$data = [
					'username' => htmlspecialchars($this->input->post('username')),
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'email' => htmlspecialchars($this->input->post('email')),
					'role_id' => $role_id,
					'date_created' => time()
				];

				$this->db->insert('user', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
				redirect('auth');
			}
		}
	}


	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Login - KampusKita";
			$this->load->view('templates/header', $data);
			$this->load->view('user/view-login-user.php');
			$this->load->view('templates/footer');
		} else {
			$this->userLogin();
		}
	}

	public function userLogin()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$mahasiswa = $this->db->get_where('mahasiswa', ['email' => $email])->row_array();

		//jika usernya ada
		if ($mahasiswa) {
			//jika user aktif
			if ($mahasiswa['is_active'] == 1) {
				//cek paswordnya
				if (password_verify($password, $mahasiswa['password'])) {
					$data = [
						'email' => $mahasiswa['email'],
						'role_id' => $mahasiswa['role_id']
					];
					$this->session->set_userdata($data);
					if ($mahasiswa['role_id'] == 1) {
						redirect('home');
					} else {
						redirect('user/loadPageMahasiswa');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
			redirect('auth');
		}
	}

	public function logoutUser()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<script>alert("Your have been logged out");</script>');
		redirect('auth');
	}

	public function logoutAdmin()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<script>alert("Your have been logged out");</script>');
		redirect('auth/admin');
	}
}
