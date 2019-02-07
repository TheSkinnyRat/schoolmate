<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_basic');
        $this->load->library('encrypt');
    }

    public function index()
    {
      if ($this->session->userdata('siswa') == true)
          redirect('Siswa_System');
        $this->load->view('backend_siswa/siswa/login');
    }

    public function do_login()
    {
        $nis = $this->input->post('nis');
        $password = $this->input->post('password');
        $where = array(
        'nis' => $nis,
    );

        $data_siswa = $this->M_basic->cek_login("tbl_siswa", $where)->row();

        if ($data_siswa) {
            if ($this->encrypt->decode($data_siswa->password) == $password) {
                // $data_siswa = $this->M_basic->get_data_siswa("tbl_siswa", $where);

                $data_siswa = array(
          'id_siswa'=>$data_siswa->id_siswa,
          'nis'=>$data_siswa->nis,
          'nama' => $data_siswa->nama,
          'id_kelas'=>$data_siswa->id_kelas,
      );


                $this->session->set_userdata('siswa', $data_siswa);

                redirect(base_url("Siswa_System"));
            } else {
                echo "login gagal, password anda salah";
            }
        } else {
            echo "Login gagal, nis tidak terdaftar";
        }
    }

    public function do_logout()
    {
        $this->session->unset_userdata('siswa');
        redirect('Siswa');
        // $this->session->sess_destroy();
    }
}
