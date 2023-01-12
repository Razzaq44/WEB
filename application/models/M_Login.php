<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Login extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getUserId($id)
    {
        $this->db->where('id_akun', $id);
        return $this->db->get('akun')->row_array();
    }

    public function getUserRole($id)
    {
        $this->db->select('role');
        $this->db->where('id_akun', $id);
        return $this->db->get('akun')->row_array();
    }

    public function getUser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('akun')->row_array();
    }

    public function register($data)
    {
        return $this->db->insert('akun', $data);
    }
}
