<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAdmin extends CI_Model {

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

    public function updateDataMahasiswa($nim, $data)
    {
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa', $data);
    }

    public function deleteDataMahasiswa($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->delete('mahasiswa');
    }

		public function getDataDosen() {
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

    public function updateDataDosen($nip, $data)
    {
        $this->db->where('nip', $nip);
        $this->db->update('dosen', $data);
    }

    public function deleteDataDosen($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->delete('dosen');
    }
}
