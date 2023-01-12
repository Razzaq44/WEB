<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medical extends CI_Controller
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

        $this->load->model('M_medical');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Cek Resep Obat';
        $data['user'] = $this->M_Login->getUserId($this->session->userdata('id_akun'));
        $data['data'] = $this->M_medical->getAllData($this->session->userdata('pasien'));
        $role = $this->M_Login->getUserRole($this->session->userdata('id_akun'));
        if ($role['role'] == "pasien") {
            $this->load->view('template/header', $data);
            $this->load->view('medical/V_medical');
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('failed', 'anda bukan pasien');
            redirect('Dashboard');
        }
    }
}
