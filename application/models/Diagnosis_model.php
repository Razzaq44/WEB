<?php
class Diagnosis_model extends CI_model
{

    public function getAllDokter()
    {
        $this->db->where('role', 'dokter');
        return $this->db->get('akun')->result_array();
    }

    public function getAllPasien()
    {
        $this->db->where('role', 'pasien');
        return $this->db->get('akun')->result_array();
    }

    public function tambahData()
    {
        $data = [
            "id_diagnosis" => $this->input->post('id_diagnosis', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "dokter" => $this->input->post('dokter', true),
            "tanggal" => $this->input->post('tanggal', true),
            "data_diagnosis" => $this->input->post('data_diagnosis', true)
        ];
        return $this->db->insert('diagnosis', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_diagnosis', $id);
        return $this->db->delete('diagnosis');
    }

    public function ubahData()
    {
        $id = $this->input->post('id_diagnosis', true);
        $data = [
            "id_diagnosis" => $this->input->post('id_diagnosis', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "dokter" => $this->input->post('dokter', true),
            "tanggal" => $this->input->post('tanggal', true),
            "data_diagnosis" => $this->input->post('data_diagnosis', true)
        ];
        $this->db->where('id_diagnosis', $id);
        return $this->db->update('diagnosis', $data);
    }

    public function getAllData()
    {
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('diagnosis')->result_array();
    }
}
