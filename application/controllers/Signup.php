<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load M_Login
        $this->load->Model('M_Login');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['judul'] = 'Sign Up';
        $this->load->view('template/header', $data);
        $this->load->view('Signup/V_Signup');
        $this->load->view('template/footer');
    }

    public function register()
    {
        $this->form_validation->set_rules('first_name', 'first_name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim');
        $this->form_validation->set_rules('role', 'role', 'required|trim');

        // cek apakah password dan password2 sama
        $password = $this->input->post('password') == $this->input->post('password2');

        $_FILES['upload_file'] = $_FILES['file'];
        $config['file_name'] = $_FILES['upload_file']['name'];
        $config['upload_path'] = realpath('uploads');
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // jika sama dan form_validation true masukan data dengan memanggil fungsi register pada M_Login
        if ($password && $this->form_validation->run() && $this->upload->do_upload('file')) {
            $uploadData = $this->upload->data();
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'photo_profile' => $uploadData['file_name'],
            );
            $this->M_Login->register($data);
            // buat session data success dengan pesan Berhasil Register Akun
            $this->session->set_flashdata('success', 'Berhasil Register Akun');
            redirect('dashboard');
        } else { // else
            // buat session data 'failed' dengan pesan Gagal Register!
            $this->session->set_flashdata('failed', 'Gagal Register!');
            // redirect register
            redirect('Signup');
        }
    }
}
