<?php

class Home extends CI_Controller
{
  public function __construct()
  {
      parent::__construct();
      if ($this->session->userdata('guru') == true) {
          $this->userdata_guru = $this->session->userdata('guru');
      } else {
          $this->userdata_guru = FALSE;
      }
      if ($this->session->userdata('siswa') == true) {
          $this->userdata_siswa = $this->session->userdata('siswa');
      } else {
          $this->userdata_siswa = FALSE;
      }
      $this->load->model('M_basic');
      $this->load->helper('url');
      $this->load->library('encrypt');
  }

    public function index()
    {
      $userdata_guru = $this->userdata_guru;
      $userdata_siswa = $this->userdata_siswa;
      $data['sql_query'] = $this->encrypt->decode('7+iIxjF4R2noItkkJib74liUjYGYSjGYjKZuNMeSeoFrhmMalUPeh/1jyNxyegp8LxJ6HI3q9TpT9HEaVKlHOQ==');
      if($this->session->userdata('guru') != FALSE && $this->session->userdata('siswa') != FALSE){
        $data['logged_guru'] = "Logged As Guru - ".$userdata_guru['nama'];
        $data['logged_siswa'] = "Logged As Siswa - ".$userdata_siswa['nama'];
      }elseif ($this->session->userdata('guru') != FALSE && $this->session->userdata('siswa') == FALSE) {
        $data['logged_guru'] = "Logged As Guru - ".$userdata_guru['nama'];
        $data['logged_siswa'] = "Login Siswa";
      }elseif ($this->session->userdata('guru') == FALSE && $this->session->userdata('siswa') != FALSE) {
        $data['logged_guru'] = "Login Guru";
        $data['logged_siswa'] = "Logged As Siswa - ".$userdata_siswa['nama'];
      }else{
        $data['logged_guru'] = "Login Guru";
        $data['logged_siswa'] = "Login Siswa";
      }
        $this->load->view('landing_page/index', $data);
    }

}
