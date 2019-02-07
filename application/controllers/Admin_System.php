<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_System extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('admin') == false) {
            redirect(base_url("Admin"));
        }
        if ($this->session->userdata('admin') == true) {
            $this->session = $this->session->userdata('admin');
        }
        $this->load->model('M_basic');
        $this->load->helper(array('url','form','download'));
        $this->load->library('encrypt');
    }



    public function index()
    {
        $data['session_userdata'] = $this->session;
        $data['content'] = $this->load->view('backend/admin/dashboard', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function data_siswa()
    {
        $data['session_userdata'] = $this->session;
        $data['data_siswa'] = $this->M_basic->data_siswa();
        $data['content'] = $this->load->view('backend/admin_system/data_siswa', $data, true);
        $this->load->view('backend/index', $data);
    }
    public function tambah_siswa()
    {
        $data['session_userdata'] = $this->session;
        $data['data_kelas'] = $this->M_basic->data_kelas()->result();
        $data['content'] = $this->load->view('backend/admin_system/tambah_siswa', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function tambah_siswa_add()
    {
        $nis = $this->input->post('nis');

        $check_nis = $this->M_basic->get_username('tbl_siswa', 'nis', $nis)->row();

        if ($check_nis == null) {
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $email = $this->input->post('email');
            $no_tlp = $this->input->post('no_tlp');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $id_kelas = $this->input->post('id_kelas');

            $data = array(
            'nis'=>$nis,
            'password'=> $this->encrypt->encode($password),
            'nama'=>$nama,
            'tempat_lahir'=>$tempat_lahir,
            'tanggal_lahir'=>$tanggal_lahir,
            'email'=>$email,
            'no_tlp'=>$no_tlp,
            'jenis_kelamin'=>$jenis_kelamin,
            'id_kelas'=>$id_kelas
        );
            $this->M_basic->input_data_user($data, 'tbl_siswa'); ?><script>alert('Berhasil menambahkan siswa baru');window.location='data_siswa';</script><?php
        } else {
            ?><script>alert('Nis yang anda masukan sudah di pakai');window.location='tambah_siswa';</script><?php
        }
    }


    public function hapus_siswa($id_siswa)
    {
        $where = array('id_siswa' => $id_siswa);
        $this->M_basic->hapus_data($where, 'tbl_siswa'); ?><script>alert('Berhasil menghapus data siswa');window.location='../data_siswa';</script><?php
    }

    public function edit_siswa($id_siswa)
    {
        $where = array('id_siswa' => $id_siswa);
        $data['session_userdata'] = $this->session;
        $data['data_kelas'] = $this->M_basic->data_kelas()->result();
        $data['data_siswa'] = $this->M_basic->edit_data($where, 'tbl_siswa')->row();
        $data['content'] = $this->load->view('backend/admin_system/edit_siswa', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function edit_siswa_add()
    {
        $id_siswa = $this->input->post('id_siswa');
        $nis = $this->input->post('nis');

        $check_nis = $this->M_basic->get_username('tbl_siswa', 'nis', $nis)->row();

        if ($check_nis > '1') {
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $email = $this->input->post('email');
            $no_tlp = $this->input->post('no_tlp');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $id_kelas = $this->input->post('id_kelas');


            $data = array(
            'id_siswa'=>$id_siswa,
            'nis'=>$nis,
            'password'=>$this->encrypt->encode($password),
            'nama'=>$nama,
            'tempat_lahir'=>$tempat_lahir,
            'tanggal_lahir'=>$tanggal_lahir,
            'email'=>$email,
            'no_tlp'=>$no_tlp,
            'jenis_kelamin'=>$jenis_kelamin,
            'id_kelas'=>$id_kelas
        );

            $where = array(
            'id_siswa' => $id_siswa,
        );

            $this->M_basic->update_data($where, $data, 'tbl_siswa'); ?><script>alert('Berhasil mengupdate data siswa');window.location='data_siswa';</script><?php
        } else {
            ?><script>alert('Nis yang anda masukan sudah di pakai');window.location='data_siswa';</script><?php
        }
    }

    public function data_guru()
    {
        $data['session_userdata'] = $this->session;
        $data['data_guru'] = $this->M_basic->data_guru()->result();
        $data['content'] = $this->load->view('backend/admin_system/data_guru', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function tambah_guru()
    {
        $data['session_userdata'] = $this->session;
        $data['content'] = $this->load->view('backend/admin_system/tambah_guru', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function tambah_guru_add()
    {
        $nip = $this->input->post('nip');
        $check_nip = $this->M_basic->get_username('tbl_guru', 'nip', $nip)->row();

        if ($check_nip == null) {
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $email = $this->input->post('email');
            $no_tlp = $this->input->post('no_tlp');
            $jenis_kelamin = $this->input->post('jenis_kelamin');

            $data = array(
            'nip'=>$nip,
            'password'=>$this->encrypt->encode($password),
            'nama'=>$nama,
            'tempat_lahir'=>$tempat_lahir,
            'tanggal_lahir'=>$tanggal_lahir,
            'email'=>$email,
            'no_tlp'=>$no_tlp,
            'jenis_kelamin'=>$jenis_kelamin,
        );
            $this->M_basic->input_data_user($data, 'tbl_guru');
            redirect('Admin_System/data_guru');
        } else {
            ?><script>alert('Nip yang anda masukan sudah di pakai');window.location='tambah_guru';</script><?php
        }
    }

    public function hapus_guru($id_guru)
    {
        $where = array('id_guru' => $id_guru);
        $this->M_basic->hapus_data($where, 'tbl_guru'); ?><script>alert('Berhasil menghapus data guru');window.location='../data_guru';</script><?php
    }

    public function edit_guru($id_guru)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_guru' => $id_guru);
        $data['data_mapel'] = $this->M_basic->data_mapel()->result();
        $data['data_guru'] = $this->M_basic->edit_data($where, 'tbl_guru')->row();
        $data['content'] = $this->load->view('backend/admin_system/edit_guru', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function edit_guru_add()
    {
        $id_guru = $this->input->post('id_guru');
        $nip = $this->input->post('nip');

        $check_nip = $this->M_basic->get_username('tbl_guru', 'nip', $nip)->row();

        if ($check_nip > '1') {
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $email = $this->input->post('email');
            $no_tlp = $this->input->post('no_tlp');
            $jenis_kelamin = $this->input->post('jenis_kelamin');

            $data = array(
            'id_guru'=>$id_guru,
            'nip'=>$nip,
            'password'=>$this->encrypt->encode($password),
            'nama'=>$nama,
            'tempat_lahir'=>$tempat_lahir,
            'tanggal_lahir'=>$tanggal_lahir,
            'email'=>$email,
            'no_tlp'=>$no_tlp,
            'jenis_kelamin'=>$jenis_kelamin,
        );

            $where = array(
            'id_guru' => $id_guru
        );

            $this->M_basic->update_data($where, $data, 'tbl_guru'); ?><script>alert('Berhasil mengupdate data guru');window.location='data_guru';</script><?php
        } else {
            ?><script>alert('Nip yang anda masukan sudah di pakai');window.location='data_guru';</script><?php
        }
    }

    public function data_pengajar()
    {
        $data['session_userdata'] = $this->session;
        $data['data_pengajar'] = $this->M_basic->data_pengajar();
        $data['content'] = $this->load->view('backend/admin_system/data_pengajar', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function tambah_pengajar()
    {
        $data['session_userdata'] = $this->session;
        $data['data_guru'] = $this->M_basic->data_guru()->result();
        $data['data_mapel'] = $this->M_basic->data_mapel()->result();
        $data['data_kelas'] = $this->M_basic->data_kelas()->result();
        $data['content'] = $this->load->view('backend/admin_system/tambah_pengajar', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function tambah_pengajar_add()
    {
        $nip = $this->input->post('nip');
        $id_mapel = $this->input->post('id_mapel');
        $id_kelas = $this->input->post('id_kelas');


        $data = array(
            'nip'=>$nip,
            'id_mapel'=>$id_mapel,
            'id_kelas'=>$id_kelas,
        );

        $this->M_basic->input_data_user($data, 'tbl_pengajar'); ?><script>alert('Berhasil menambahkan data pengajar');window.location='data_pengajar';</script><?php
    }

    public function edit_pengajar($id_pengajar)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_pengajar' => $id_pengajar);
        $data['data_pengajar'] = $this->M_basic->edit_data_pengajar($where);
        $data['data_guru'] = $this->M_basic->data_guru()->result();
        $data['data_mapel'] = $this->M_basic->data_mapel()->result();
        $data['data_kelas'] = $this->M_basic->data_kelas()->result();
        $data['content'] = $this->load->view('backend/admin_system/edit_pengajar', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function edit_pengajar_add()
    {
        $id_pengajar = $this->input->post('id_pengajar');
        $nip = $this->input->post('nip');
        $id_mapel = $this->input->post('id_mapel');
        $id_kelas = $this->input->post('id_kelas');
        $where = array(
        'id_mapel' => $id_mapel,
        'id_kelas' => $id_kelas,
      );

        $check_data = $this->M_basic->get_pengajar('tbl_pengajar', $where)->row();
        if ($check_data > '1') {
            $data = array(
            'id_pengajar'=>$id_pengajar,
            'nip'=>$nip,
            'id_mapel'=>$id_mapel,
            'id_kelas'=>$id_kelas,
        );

            $where = array(
            'id_pengajar'=>$id_pengajar,
        );

            $this->M_basic->update_data($where, $data, 'tbl_pengajar'); ?><script>alert('Berhasil mengupdate data pengajar');window.location='data_pengajar';</script><?php
        } else {
            ?><script>alert('Data sudah ada');window.location='data_pengajar';</script><?php
        }
    }

    public function hapus_pengajar($id_pengajar)
    {
        $where = array('id_pengajar' => $id_pengajar);
        $this->M_basic->hapus_data($where, 'tbl_pengajar'); ?><script>alert('Berhasil menghapus data pengajar');window.location='../data_pengajar';</script><?php
    }

    public function data_mapel()
    {
        $data['session_userdata'] = $this->session;
        $data['data_mapel'] = $this->M_basic->data_mapel()->result();
        $data['content'] = $this->load->view('backend/admin_system/data_mapel', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function tambah_mapel()
    {
        $data['session_userdata'] = $this->session;
        $data['content'] = $this->load->view('backend/admin_system/tambah_mapel', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function tambah_mapel_add()
    {
        $nama_mapel = $this->input->post('nama_mapel');
        $check_mapel = $this->M_basic->get_username('tbl_mapel', 'nama_mapel', $nama_mapel)->row();

        if ($check_mapel == null) {
            $data = array(
          'nama_mapel'=>$nama_mapel,
      );

            $this->M_basic->input_data_user($data, 'tbl_mapel'); ?><script>alert('Berhasil menambahkan Mata Pelanajar baru');window.location='data_mapel';</script><?php
        } else {
            ?><script>alert('Nama mapel yang anda masukan sudah di pakai');window.location='tambah_mapel';</script><?php
        }
    }

    public function edit_mapel($id_mapel)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_mapel' => $id_mapel);
        $data['data_mapel'] = $this->M_basic->edit_data($where, 'tbl_mapel')->row();
        $data['content'] = $this->load->view('backend/admin_system/edit_mapel', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function edit_mapel_add()
    {
        $id_mapel = $this->input->post('id_mapel');
        $nama_mapel = $this->input->post('nama_mapel');
        $check_mapel = $this->M_basic->get_username('tbl_mapel', 'nama_mapel', $nama_mapel)->row();

        if ($check_mapel > '1') {
            $data = array(
            'id_mapel'=>$id_mapel,
            'nama_mapel'=>$nama_mapel,

        );

            $where = array(
            'id_mapel'=>$id_mapel,
        );

            $this->M_basic->update_data($where, $data, 'tbl_mapel'); ?><script>alert('Berhasil mengupdate Mata Pelanajar');window.location='data_mapel';</script><?php
        } else {
            ?><script>alert('Nama mapel yang anda masukan sudah di pakai');window.location='data_mapel';</script><?php
        }
    }

    public function hapus_mapel($id_mapel)
    {
        $where = array('id_mapel' => $id_mapel);
        $this->M_basic->hapus_data($where, 'tbl_mapel'); ?><script>alert('Berhasil Menghapus Mata Pelanajar');window.location='../data_mapel';</script><?php
    }

    public function data_kelas()
    {
        $data['session_userdata'] = $this->session;
        $data['data_kelas'] = $this->M_basic->data_kelas()->result();
        $data['content'] = $this->load->view('backend/admin_system/data_kelas', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function tambah_kelas()
    {
        $data['session_userdata'] = $this->session;
        $data['content'] = $this->load->view('backend/admin_system/tambah_kelas', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function tambah_kelas_add()
    {
        $kelas = $this->input->post('kelas');

        $check_kelas = $this->M_basic->get_username('tbl_kelas', 'kelas', $kelas)->row();

        if ($check_kelas == null) {
            $data = array(
          'kelas'=>$kelas,
      );

            $this->M_basic->input_data_user($data, 'tbl_kelas'); ?><script>alert('Berhasil menambahkan kelas baru');window.location='data_kelas';</script><?php
        } else {
            ?><script>alert('Nama kelas yang anda masukan sudah di pakai');window.location='tambah_kelas';</script><?php
        }
    }


    public function edit_kelas($id_kelas)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_kelas' => $id_kelas);
        $data['data_kelas'] = $this->M_basic->edit_data($where, 'tbl_kelas')->row();
        $data['content'] = $this->load->view('backend/admin_system/edit_kelas', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function edit_kelas_add()
    {
        $id_kelas = $this->input->post('id_kelas');
        $kelas = $this->input->post('kelas');
        $check_kelas = $this->M_basic->get_username('tbl_kelas', 'kelas', $kelas)->row();

        if ($check_kelas > '1') {
            $data = array(
            'id_kelas'=>$id_kelas,
            'kelas'=>$kelas,

        );

            $where = array(
            'id_kelas'=>$id_kelas,
        );

            $this->M_basic->update_data($where, $data, 'tbl_kelas'); ?><script>alert('Berhasil mengupdate kelas baru');window.location='data_kelas';</script><?php
        } else {
            ?><script>alert('Nama kelas yang anda masukan sudah di pakai');window.location='data_kelas';</script><?php
        }
    }

    public function hapus_kelas($id_kelas)
    {
        $where = array('id_kelas' => $id_kelas);
        $this->M_basic->hapus_data($where, 'tbl_kelas'); ?><script>alert('Berhasil menghapus kelas');window.location='../data_kelas';</script><?php
    }

    public function data_berita()
    {
        $data['session_userdata'] = $this->session;
        $data['data_berita']= $this->M_basic->data_berita_user();
        $data['content'] = $this->load->view('backend/admin_system/data_berita', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function tambah_berita()
    {
        $data['session_userdata'] = $this->session;
        $this->load->view('admin/tambah_berita', $data);
    }

    public function tambah_berita_add()
    {
        $id_pengajar = $this->input->post('id_pengajar');
        $judul_post = $this->input->post('judul_post');
        $isi_post = $this->input->post('isi_post');
        $tgl_post = $this->input->post('tgl_post');
        $status = $this->input->post('status');

        $data = array(
          'id_pengajar'=>$id_pengajar,
          'judul_post'=>$judul_post,
          'isi_post'=>$isi_post,
          'tgl_post'=>$tgl_post,
          'status'=>$status,
      );

        $this->M_basic->input_data_user($data, 'tbl_berita');
        redirect('Admin_System/data_berita');
    }

    public function edit_berita($id_berita)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_berita' => $id_berita);
        $data['data_berita'] = $this->M_basic->edit_data($where, 'tbl_berita')->row();
        $data['status'] = $this->M_basic->data_status_posting()->result();
        $data['content'] = $this->load->view('backend/admin_system/edit_berita', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function edit_berita_add()
    {
        $id_berita = $this->input->post('id_berita');
        $judul_post = $this->input->post('judul_post');
        $isi_post = $this->input->post('isi_post');
        $status = $this->input->post('status');

        $data = array(
            'id_berita'=>$id_berita,
            'judul_post'=>$judul_post,
            'isi_post'=>$isi_post,
            'status'=>$status,
        );

        $where = array(
            'id_berita'=>$id_berita,
        );

        $this->M_basic->update_data($where, $data, 'tbl_berita');
        redirect('Admin_System/data_berita');
    }

    public function hapus_berita($id_berita)
    {
        $where = array('id_berita' => $id_berita);
        $this->M_basic->hapus_data($where, 'tbl_berita');
        redirect('Admin_System/data_berita');
    }

    public function data_posting_admin()
    {
        $data['session_userdata'] = $this->session;
        $data['data_posting_admin'] = $this->M_basic->data_berita_admin();
        $data['content'] = $this->load->view('backend/admin_system/data_posting_admin', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function tambah_posting_admin()
    {
        $data['session_userdata'] = $this->session;
        $data['content'] = $this->load->view('backend/admin_system/tambah_posting_admin', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function tambah_posting_admin_add()
    {
        $id = $this->input->post('id');
        $judul_post = $this->input->post('judul_post');
        $isi_post = $this->input->post('isi_post');
        $tgl_post = $this->input->post('tgl_post');
        $status = $this->input->post('status');

        $data = array(
          'id'=>$id,
          'judul_post'=>$judul_post,
          'isi_post'=>$isi_post,
          'tgl_post'=>$tgl_post,
          'status'=>$status,
      );

        $this->M_basic->input_data_user($data, 'tbl_posting_admin');
        redirect('Admin_System/data_posting_admin');
    }

    public function edit_posting_admin($id_posting)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_posting' => $id_posting);
        $data['data_posting_admin'] = $this->M_basic->edit_data($where, 'tbl_posting_admin')->row();
        $data['status'] = $this->M_basic->data_status_posting()->result();
        $data['content'] = $this->load->view('backend/admin_system/edit_posting_admin', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function edit_posting_admin_add()
    {
        $id_posting = $this->input->post('id_posting');
        $judul_post = $this->input->post('judul_post');
        $isi_post = $this->input->post('isi_post');
        $status = $this->input->post('status');

        $data = array(
            'id_posting'=>$id_posting,
            'judul_post'=>$judul_post,
            'isi_post'=>$isi_post,
            'status'=>$status,
        );

        $where = array(
            'id_posting'=>$id_posting,
        );

        $this->M_basic->update_data($where, $data, 'tbl_posting_admin');
        redirect('Admin_System/data_posting_admin');
    }

    public function hapus_posting_admin($id_posting)
    {
        $where = array('id_posting' => $id_posting);
        $this->M_basic->hapus_data($where, 'tbl_posting_admin');
        redirect('Admin_System/data_posting_admin');
    }

    public function posting()
    {
        $data['session_userdata'] = $this->session;
        $data['data_posting_admin'] = $this->M_basic->data_berita_admin();
        $data['content'] = $this->load->view('backend/admin_system/posting', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function data_video()
    {
        $data['session_userdata'] = $this->session;
        $data['data_video']= $this->M_basic->data_video_J_pengajar();
        $data['data_komentar'] = $this->M_basic->data_komentar()->result();
        $data['content'] = $this->load->view('backend/admin_system/data_video', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function download_video($id_video)
    {
        $where = array('id_video' => $id_video);
        $data_download= $this->M_basic->edit_data($where, 'tbl_video')->row();
        force_download('Video/'.$data_download->isi_video, null);
    }

    public function data_tugas()
    {
        $data['session_userdata'] = $this->session;
        $data['data_tugas']= $this->M_basic->data_guru_J_pengajar_J_tugas_J_status2();
        $data['data_komentar'] = $this->M_basic->data_komentar()->result();
        $data['content'] = $this->load->view('backend/admin_system/data_tugas', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function download_tugas($id_tugas)
    {
        $where = array('id_tugas' => $id_tugas);
        $data_download= $this->M_basic->edit_data($where, 'tbl_tugas')->row();
        force_download('Tugas/'.$data_download->isi_tugas, null);
    }
}
