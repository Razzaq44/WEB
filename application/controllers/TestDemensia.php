<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TestDemensia extends CI_Controller
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

        $this->load->model('test_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Test Demensia';
        $data['user'] = $this->M_Login->getUserId($this->session->userdata('id_akun'));

        // Memanggil fungsi pada controler untuk mendapatkan data 
        $data['data'] = $this->test_model->getAllData($this->session->userdata('id_akun'));

        $role = $this->M_Login->getUserRole($this->session->userdata('id_akun'));
        if ($role['role'] == "pasien") {
            $this->load->view('template/header', $data);
            $this->load->view('Test/V_test');
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('failed', 'anda bukan pasien');
            redirect('Dashboard');
        }
    }
    public function tambah()
    {
        $this->form_validation->set_rules('id_akun', 'id_akun', 'required');
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('hasil', 'hasil', 'required');

        if ($this->form_validation->run() == TRUE) {
            $cek = $this->test_model->tambahData();
            if ($cek) $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
            else $this->session->set_flashdata('failed', 'Gagal Menambahkan Data');
            redirect('TestDemensia');
        }
        redirect('TestDemensia');
    }
    public function hapus($id)
    {
        $cek = $this->test_model->hapusData($id);
        if ($cek) $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        else $this->session->set_flashdata('failed', 'Gagal Menghapus Data');
        redirect('TestDemensia');
    }
}
