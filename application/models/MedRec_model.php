<?php
class MedRec_model extends CI_model
{

    public function getAllPasien()
    {
        $this->db->where('role', 'pasien');
        return $this->db->get('akun')->result_array();
    }

    public function getMedRecUser($dokter)
    {
        $this->db->where('dokter', $dokter);
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('medrec')->result_array();
    }

    public function tambahData()
    {
        $data = [
            "id_medrec" => $this->input->post('id_medrec', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "dokter" => $this->input->post('dokter', true),
            "tanggal" => $this->input->post('tanggal', true),
            "data_medrec" => $this->input->post('data_medrec', true)
        ];
        return $this->db->insert('medrec', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_medrec', $id);
        return $this->db->delete('medrec');
    }

    public function ubahData()
    {
        $id = $this->input->post('id_medrec', true);
        $data = [
            "id_medrec" => $this->input->post('id_medrec', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "dokter" => $this->input->post('dokter', true),
            "tanggal" => $this->input->post('tanggal', true),
            "data_medrec" => $this->input->post('data_medrec', true)
        ];
        $this->db->where('id_medrec', $id);
        return $this->db->update('medrec', $data);
    }
}
