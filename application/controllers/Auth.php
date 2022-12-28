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
				$data = [
					'email' => $admin['email'],
					'role_id' => $admin['role_id']
				];
				$this->session->set_userdata($data);
				if ($admin['role_id'] == 1) {
					redirect('home');
				}
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
			'is_unique' => 'Email sudah terdaftar'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registration';
			$this->load->view('templates/header', $data);
			$this->load->view('view-register');
			$this->load->view('templates/footer');
		} else {
			$role_id = 1;
			$data = [
				'username' => htmlspecialchars($this->input->post('username')),
				'email' => htmlspecialchars($this->input->post('email')),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => $role_id,
				'date_created' => time()
			];

			$this->db->insert('admin', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil buat akun</div>');
			redirect('auth/admin');
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

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		//jika usernya ada
		if ($user) {
			//jika user aktif
			if ($user['is_active'] == 1) {
				//cek paswordnya
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);

					if ($user['role_id'] == 2) {
						redirect('user/loadPageMahasiswa');
					} else if ($user['role_id'] == 3) {
						redirect('user/loadPageDosen');
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
