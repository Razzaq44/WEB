<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MedicalRecords extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load M_Login
        $this->load->model('M_Login');

        // Load driver ('cache', array('adapter' => 'apc', 'backup' => 'file'))
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        if (!empty($this->session->userdata('is_login') == FALSE)) {
            // buat session 'failed' berisi pesan peringatan bahwa harus login terlebih dahulu
            $this->session->set_flashdata('failed', 'Anda Belum login, silahkan login terlebih dahulu');
            redirect('dashboard');
        }
        $this->load->model('MedRec_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Medical Records';
        $data['user'] = $this->M_Login->getUserId($this->session->userdata('id_akun'));
        $data['medrecUser'] = $this->MedRec_model->getMedRecUser($this->session->userdata('dokter'));
        $data['pasien'] = $this->MedRec_model->getAllPasien();
        $role = $this->M_Login->getUserRole($this->session->userdata('id_akun'));
        if ($role['role'] == "dokter") {
            $this->load->view('template/header', $data);
            $this->load->view('medicalrecord/V_medicalrecords');
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('failed', 'Anda bukan Dokter');
            redirect('Dashboard');
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('dokter', 'dokter', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('data_medrec', 'data_medrec', 'required');

        if ($this->form_validation->run() == TRUE) {
            $cek = $this->MedRec_model->tambahData();
            if ($cek) $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
            else $this->session->set_flashdata('failed', 'Gagal Menambahkan Data');
            redirect('MedicalRecords');
        }
        redirect('MedicalRecords');
    }

    public function hapus($id)
    {
        $cek = $this->MedRec_model->hapusData($id);
        if ($cek) $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        else $this->session->set_flashdata('failed', 'Gagal Menghapus Data');
        redirect('MedicalRecords');
    }

    public function ubah()
    {
        $this->form_validation->set_rules('id_medrec', 'id_medrec', 'required');
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('dokter', 'dokter', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('data_medrec', 'data_medrec', 'required');

        if ($this->form_validation->run() == TRUE) {
            $cek = $this->MedRec_model->ubahData();
            if ($cek) $this->session->set_flashdata('success', 'Data Berhasil Diubah');
            else $this->session->set_flashdata('failed', 'Gagal Mengubah Data');
            redirect('MedicalRecords');
        }
        redirect('MedicalRecords');
    }
}
