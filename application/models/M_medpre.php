<?php
class M_medpre extends CI_model
{
    public function getAllData()
    {
        return $this->db->get('medpre')->result_array();
    }
    public function getAllPasien()
    {
        $this->db->where('role', 'pasien');
        return $this->db->get('akun')->result_array();
    }

    public function getMedPreUser($nama_obat)
    {
        $this->db->where('nama_obat', $nama_obat);
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('medpre')->result_array();
    }
    public function getObat()
    {
        return $this->db->get('obat')->result_array();
    }
    public function tambahData()
    {
        $data = [
            "id_medpre" => $this->input->post('id_medpre', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "nama_obat" => $this->input->post('nama_obat', true),
            "tanggal" => $this->input->post('tanggal', true),
            "dosis" => $this->input->post('dosis', true)
        ];
        return $this->db->insert('medpre', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_medpre', $id);
        return $this->db->delete('medpre');
    }

    public function ubahData()
    {
        $id = $this->input->post('id_medpre', true);
        $data = [
            "id_medpre" => $this->input->post('id_medpre', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "nama_obat" => $this->input->post('nama_obat', true),
            "tanggal" => $this->input->post('tanggal', true),
            "dosis" => $this->input->post('dosis', true)
        ];
        $this->db->where('id_medpre', $id);
        return $this->db->update('medpre', $data);
    }
}
