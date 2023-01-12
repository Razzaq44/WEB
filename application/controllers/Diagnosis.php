<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosis extends CI_Controller
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
        $this->load->model('Diagnosis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Diagnosis';
        $data['user'] = $this->M_Login->getUserId($this->session->userdata('id_akun'));
        $data['dokter'] = $this->Diagnosis_model->getAllDokter();
        $data['data'] = $this->Diagnosis_model->getAllData();
        $data['pasien'] = $this->Diagnosis_model->getAllPasien();
        $role = $this->M_Login->getUserRole($this->session->userdata('id_akun'));
        if ($role['role'] == "dokter") {
            $this->load->view('template/header', $data);
            $this->load->view('diagnosis/V_diagnosis');
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
        $this->form_validation->set_rules('data_diagnosis', 'data_diagnosis', 'required');

        if ($this->form_validation->run() == TRUE) {
            $cek = $this->Diagnosis_model->tambahData();
            if ($cek) $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
            else $this->session->set_flashdata('failed', 'Gagal Menambahkan Data');
            redirect('Diagnosis');
        }
        redirect('Diagnosis');
    }

    public function hapus($id)
    {
        $cek = $this->Diagnosis_model->hapusData($id);
        if ($cek) $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        else $this->session->set_flashdata('failed', 'Gagal Menghapus Data');
        redirect('Diagnosis');
    }

    public function ubah()
    {
        $this->form_validation->set_rules('id_diagnosis', 'id_diagnosis', 'required');
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('dokter', 'dokter', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('data_diagnosis', 'data_diagnosis', 'required');

        if ($this->form_validation->run() == TRUE) {
            $cek = $this->Diagnosis_model->ubahData();
            if ($cek) $this->session->set_flashdata('success', 'Data Berhasil Diubah');
            else $this->session->set_flashdata('failed', 'Gagal Mengubah Data');
            redirect('Diagnosis');
        }
        redirect('Diagnosis');
    }
}
