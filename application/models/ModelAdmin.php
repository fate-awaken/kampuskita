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

	public function searchDataMahasiswa($nama)
	{
		if(!$nama) {
			return null;
		}

		$this->db->like('nama', $nama);
		$query = $this->db->get('mahasiswa');
		return $query->result();
	}
	
	function deleteDataMahasiswa($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getMahasiswa($limit, $start)
	{
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

	public function deleteDataDosen($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getDosen($limit, $start)
	{
			$query = $this->db->get('dosen', $limit, $start);
			return $query->result();
	}

	public function countAllDosen() {
		return $this->db->get('dosen')->num_rows();
	}
}
