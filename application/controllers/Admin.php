<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_basic');
    }

    public function index()
    {
      if ($this->session->userdata('admin') == true)
          redirect('Admin_System');
        $this->load->view('backend/admin/login');
    }

    public function do_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
          'username' => $username,
      );

        $data_admin = $this->M_basic->cek_login("tbl_admin", $where)->row();

        if ($data_admin) {
            if ($this->encrypt->decode($data_admin->password) == $password) {
                // $data_admin = $this->M_basic->get_data_siswa("tbl_siswa", $where);

                $data_admin = array(
            'id'=>$data_admin->id,
            'username'=>$data_admin->username,
            'nama' => $data_admin->nama,
        );


                $this->session->set_userdata('admin', $data_admin);

                redirect(base_url("Admin_System"));
            } else {
                echo "login gagal, password anda salah";
            }
        } else {
            echo "Login gagal, username tidak terdaftar";
        }
    }

    public function do_logout()
    {
        $this->session->unset_userdata('admin');
        redirect('Admin');
    }
}
