<?php
class App_model extends CI_model
{

    public function getAllDokter()
    {
        $this->db->where('role', 'dokter');
        return $this->db->get('akun')->result_array();
    }

    public function getProved($id)
    {
        $this->db->where('id_akun', $id);
        $this->db->where('status', 'Approved');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('app')->result_array();
    }

    public function getProvedD($dokter)
    {
        $this->db->where('dokter', $dokter);
        $this->db->where('status', 'Approved');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('app')->result_array();
    }

    public function HistoryApp($dokter)
    {
        $this->db->where('dokter', $dokter);
        $this->db->where_not_in('status', 'Approved');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('app')->result_array();
    }

    public function scheduleU($id)
    {
        $this->db->where('id_akun', $id);
        $this->db->where('status', 'Approved');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('app')->result_array();
    }

    public function HistoryU($id)
    {
        $this->db->where('id_akun', $id);
        $this->db->where_not_in('status', 'Approved');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('app')->result_array();
    }

    public function getAppUser($id)
    {
        $pasien = $this->input->get('nama_pasien');
        $dokter = $this->input->get('dokter');
        $tanggal = $this->input->get('tanggal');

        $this->db->where('id_akun', $id);
        $this->db->where('status =');

        if (($dokter == "") && ($pasien == "") && ($tanggal == "")) {
            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($dokter == "") &&  ($pasien == "")) {
            $this->db->where('tanggal', $tanggal);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($dokter == "") &&  ($tanggal == "")) {
            $this->db->like('nama_pasien', $pasien);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($pasien == "") &&  ($tanggal == "")) {
            $this->db->like('dokter', $dokter);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($tanggal == "")) {
            $this->db->like('dokter', $dokter);
            $this->db->like('nama_pasien', $pasien);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($id == "")) {
            $this->db->like('nama_pasien', $pasien);
            $this->db->where('tanggal', $tanggal);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($pasien == "")) {
            $this->db->like('dokter', $dokter);
            $this->db->where('tanggal', $tanggal);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($dokter != "") && ($pasien != "") && ($tanggal != "")) {
            $this->db->where('dokter', $dokter);
            $this->db->like('nama_pasien', $pasien);
            $this->db->where('tanggal', $tanggal);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };
    }

    public function tambahData()
    {
        $data = [
            "id_akun" => $this->input->post('id_akun', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "dokter" => $this->input->post('dokter', true),
            "tanggal" => $this->input->post('tanggal', true),
            "jam" => $this->input->post('jam', true)
        ];

        return $this->db->insert('app', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_app', $id);
        return $this->db->delete('app');
    }

    public function ubahData()
    {
        $id = $this->input->post('id_app', true);
        $data = [
            "id_app" => $this->input->post('id_app', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "dokter" => $this->input->post('dokter', true),
            "tanggal" => $this->input->post('tanggal', true),
        ];
        $this->db->where('id_app', $id);
        return $this->db->update('app', $data);
    }

    public function approveApp($id)
    {
        $this->db->set('status', 'Approved');
        $this->db->where('id_app', $id);
        return $this->db->update('app');
    }

    public function doneApp($id)
    {
        $this->db->set('status', 'Done');
        $this->db->where('id_app', $id);
        return $this->db->update('app');
    }

    public function declineApp($id)
    {
        $arr = [
            'status' => 'Decline',
            'alasan' => $this->input->post('reason', true),
        ];
        $this->db->set($arr);
        $this->db->where('id_app', $id);
        return $this->db->update('app');
    }

    public function find($dokter)
    {
        $id = $this->input->get('id_app');
        $pasien = $this->input->get('nama_pasien');
        $tanggal = $this->input->get('tanggal');

        $this->db->where('dokter', $dokter);
        $this->db->where('status =');

        if (($id == "") && ($pasien == "") && ($tanggal == "")) {
            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($id == "") &&  ($pasien == "")) {
            $this->db->where('tanggal', $tanggal);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($id == "") &&  ($tanggal == "")) {
            $this->db->like('nama_pasien', $pasien);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($pasien == "") &&  ($tanggal == "")) {
            $this->db->like('id_app', $id);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($tanggal == "")) {
            $this->db->like('id_app', $id);
            $this->db->like('nama_pasien', $pasien);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($id == "")) {
            $this->db->like('nama_pasien', $pasien);
            $this->db->where('tanggal', $tanggal);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($pasien == "")) {
            $this->db->like('id_app', $id);
            $this->db->where('tanggal', $tanggal);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        if (($id != "") && ($pasien != "") && ($tanggal != "")) {
            $this->db->where('id_app', $id);
            $this->db->like('nama_pasien', $pasien);
            $this->db->where('tanggal', $tanggal);

            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };
    }
}
