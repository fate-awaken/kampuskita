<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
	public function ubahPasswordAkunMahasiswa($password, $where)
	{
		$this->db->set('password', $password);
		$this->db->where('email', $where);
		$this->db->update('user');
	}

	public function ubahPasswordDataMahasiswa($password, $where)
	{
		$this->db->set('password', $password);
		$this->db->where('email', $where);
		$this->db->update('mahasiswa');
	}

	public function ubahPasswordAkunDosen($password, $where)
	{
		$this->db->set('password', $password);
		$this->db->where('email', $where);
		$this->db->update('user');
	}

	public function ubahPasswordDataDosen($password, $where)
	{
		$this->db->set('password', $password);
		$this->db->where('email', $where);
		$this->db->update('dosen');
	}
}
