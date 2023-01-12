<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medpre extends CI_Controller
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
        $this->load->model('M_medpre');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Medical Prescription Doctor';
        $data['user'] = $this->M_Login->getUserId($this->session->userdata('id_akun'));
        $data['medpreUser'] = $this->M_medpre->getMedPreUser($this->session->userdata('dokter'));
        $data['obat'] = $this->M_medpre->getObat();
        $data['medpre'] = $this->M_medpre->getAllData();
        $data['pasien'] = $this->M_medpre->getAllPasien();
        $role = $this->M_Login->getUserRole($this->session->userdata('id_akun'));
        if ($role['role'] == "dokter") {
            $this->load->view('template/header', $data);
            $this->load->view('medical/V_medpre');
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('failed', 'anda bukan dokter');
            redirect('Dashboard');
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('nama_obat', 'nama_obat', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('dosis', 'dosis', 'required');

        if ($this->form_validation->run() == TRUE) {
            $cek = $this->M_medpre->tambahData();
            if ($cek) $this->session->set_flashdata('success', 'Obat Berhasil Ditambahkan');
            else $this->session->set_flashdata('failed', 'Gagal Menambahkan Obat');
            redirect('Medpre');
        }
        redirect('Medpre');
    }

    public function hapus($id)
    {
        $cek = $this->M_medpre->hapusData($id);
        if ($cek) $this->session->set_flashdata('success', 'Obat Berhasil Dihapus');
        else $this->session->set_flashdata('failed', 'Gagal Menghapus Obat');
        redirect('Medpre');
    }

    public function ubah()
    {
        $this->form_validation->set_rules('id_medpre', 'id_medpre', 'required');
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('nama_obat', 'nama_obat', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('dosis', 'dosis', 'required');

        if ($this->form_validation->run() == TRUE) {
            $cek = $this->M_medpre->ubahData();
            if ($cek) $this->session->set_flashdata('success', 'Obat Berhasil Diubah');
            else $this->session->set_flashdata('failed', 'Gagal Mengubah Obat');
            redirect('Medpre');
        }
        redirect('Medpre');
    }
}
