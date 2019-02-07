<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_basic');
    }
    public function index()
    {
        if ($this->session->userdata('guru') == true) {
            redirect('Guru_System');
        }
        $this->load->view('backend_guru/guru/login');
    }

    public function do_login()
    {
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');
        $where = array(

          'nip' => $nip,
      );

        $data_guru = $this->M_basic->cek_login("tbl_guru", $where)->row();

        if ($data_guru) {
            if ($this->encrypt->decode($data_guru->password) == $password) {
                // $data_guru = $this->M_basic->get_data_siswa("tbl_siswa", $where);

                $data_guru = array(
            'id_guru'=>$data_guru->id_guru,
            'nip'=>$data_guru->nip,
            'nama' => $data_guru->nama,
        );


                $this->session->set_userdata('guru', $data_guru);

                redirect(base_url("Guru_System"));
            } else {
                echo "login gagal, password anda salah";
            }
        } else {
            echo "Login gagal, username tidak terdaftar";
        }
    }


    public function do_logout()
    {
        $this->session->unset_userdata('guru');
        redirect('Guru');
    }
}
