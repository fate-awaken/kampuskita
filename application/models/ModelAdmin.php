<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAdmin extends CI_Model
{

	public function getDataMahasiswa()
	{
		$query = $this->db->get('mahasiswa');
		return $query->result();
	}

	public function insertDataMahasiswa($data)
	{
		$this->db->insert('mahasiswa', $data);
	}

	public function insertAkunMahasiswa($data)
	{
		$this->db->insert('user', $data);
	}

	public function getDataMahasiswaDetail($nim)
	{
		$this->db->where('nim', $nim);
		$query = $this->db->get('mahasiswa');
		return $query->row();
	}

	public function editDataMahasiswa($where, $data)
	{

		$this->db->where($where);
		$this->db->update('mahasiswa', $data);
	}

	public function editAkunMahasiswa($where, $dataAkun)
	{

		$this->db->where($where);
		$this->db->update('user', $dataAkun);
	}

	public function searchDataMahasiswa($keyword)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->like('nim', $keyword);
		$this->db->or_like('nama', $keyword);
		$this->db->or_like('email', $keyword);
		$this->db->or_like('jurusan', $keyword);
		return $this->db->get()->result();
	}

	function deleteDataMahasiswa($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getMahasiswa($limit, $start, $keyword = null)
	{
		$this->db->order_by('id', 'DESC');
		if ($keyword) {
			$this->db->like('nama', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('nim', $keyword);
			$this->db->or_like('jurusan', $keyword);
		}
		$query = $this->db->get('mahasiswa', $limit, $start);
		return $query->result();
	}

	public function countAllMahasiswa()
	{
		return $this->db->get('mahasiswa')->num_rows();
	}

	public function getDataDosen()
	{
		$query = $this->db->get('dosen');
		return $query->result();
	}

	public function insertDataDosen($data)
	{
		$this->db->insert('dosen', $data);
	}

	public function insertAkunDosen($data)
	{
		$this->db->insert('user', $data);
	}

	public function getDataDosenDetail($nip)
	{
		$this->db->where('nip', $nip);
		$query = $this->db->get('dosen');
		return $query->row();
	}

	public function editDataDosen($where, $data)
	{
		$this->db->where($where);
		$this->db->update('dosen', $data);
	}

	public function editAkunDosen($where, $data)
	{
		$this->db->where($where);
		$this->db->update('user', $data);
	}

	public function searchDataDosen($keyword)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->like('nip', $keyword);
		$this->db->or_like('nama', $keyword);
		$this->db->or_like('email', $keyword);
		return $this->db->get()->result();
	}

	public function deleteDataDosen($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getDosen($limit, $start, $keyword = null)
	{
		$this->db->order_by('id', 'DESC');
		if ($keyword) {
			$this->db->like('nama', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('nip', $keyword);
		}
		$query = $this->db->get('dosen', $limit, $start);
		return $query->result();
	}

	public function countAllDosen()
	{
		return $this->db->get('dosen')->num_rows();
	}
}
