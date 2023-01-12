<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_Login');
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'user' => $this->M_Login->getUserId($this->session->userdata('id_akun')),
            'avatar' => $this->upload->data()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('dashboard/V_dashboard');
        $this->load->view('template/footer');
    }

    public function login()
    {
        $user = $this->input->post('username', TRUE);
        $pass = $this->input->post('password', TRUE);

        $cek  = $this->M_Login->getUser($user);

        // cek username 
        if ($cek) // jika username ada pada database
        {
            // cek password
            if (password_verify($pass, $cek['password'])) // jika password benar 
            {
                // buat session 'id' berisi id pengguna ($cek->id) 
                $this->session->set_userdata('id_akun', $cek['id_akun']);
                $this->session->set_userdata('dokter', $cek['first_name'] . ' ' . $cek['last_name']);
                $this->session->set_userdata('pasien', $cek['first_name'] . ' ' . $cek['last_name']);
                $this->session->set_userdata('is_login', TRUE);
                // cek dan buat cache username dan password jika belum dibuat
                if (!$user = $this->cache->get('username') and !$pass = $this->cache->get('password')) {
                    // Save into the cache for 2 minutes
                    $this->cache->save('username', $user, 120);
                    $this->cache->save('password', $pass, 120);
                }
                // redirect dashboard
                redirect('dashboard');
                $this->session->set_flashdata('success', 'Berhasil Login!');
            } else { // jika password salah
                // buat session 'failed' berisi pesan Password salah! 
                $this->session->set_flashdata('failed', 'Password salah!');
                // redirect login
                redirect('dashboard');
            }
        } else { // jika username salah
            // buat session 'failed' berisi pesan Username tidak tersedia!
            $this->session->set_flashdata('failed', 'Username tidak tersedia!');
            redirect('dashboard');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('dashboard');
    }

    public function about()
    {
        $data['judul'] = 'About';
        $data['user'] = $this->M_Login->getUserId($this->session->userdata('id_akun'));
        $this->load->view('template/header', $data);
        $this->load->view('etc/about');
        $this->load->view('template/footer');
    }

    public function FAQ()
    {
        $data['judul'] = 'FAQ';
        $data['user'] = $this->M_Login->getUserId($this->session->userdata('id_akun'));
        $this->load->view('template/header', $data);
        $this->load->view('etc/FAQ');
        $this->load->view('template/footer');
    }
}
