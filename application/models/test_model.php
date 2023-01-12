<?php
class test_model extends CI_model
{

    public function tambahData()
    {
        $data = [
            "id_test" => $this->input->post('id_test', true),
            "id_akun" => $this->input->post('id_akun', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "hasil" => $this->input->post('hasil', true)
        ];
        return $this->db->insert('test', $data);
    }


    public function hapusData($id)
    {
        $this->db->where('id_test', $id);
        return $this->db->delete('test');
    }

    // Mendapatkan data berdasarkan id_akun
    public function getAllData($id)
    {
        $this->db->where('id_akun', $id);
        return $this->db->get('test')->result_array();
    }
}
