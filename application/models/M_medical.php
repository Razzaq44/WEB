<?php
class M_medical extends CI_model
{
    public function getAllData($pasien)
    {
        $this->db->where('nama_pasien', $pasien);
        return $this->db->get('medpre')->result_array();
    }
}
