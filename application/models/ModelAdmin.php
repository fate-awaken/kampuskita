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
}
