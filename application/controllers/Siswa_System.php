<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_System extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('siswa') == false) {
            redirect(base_url("Siswa"));
        }
        if ($this->session->userdata('siswa') == true) {
            $this->session = $this->session->userdata('siswa');
        }
        $this->load->model('M_basic');
        $this->load->helper(array('url','form','download'));
    }

    public function index()
    {
        $data['session_userdata'] = $this->session;
        $data['content'] = $this->load->view('backend_siswa/siswa/dashboard', $data, true);
        $this->load->view('backend_siswa/index', $data);
    }

    public function data_berita()
    {
        $data['session_userdata'] = $this->session;
        $data['data_berita'] = $this->M_basic->data_berita_J_pengajar_J_siswa('id_siswa', $this->session['id_siswa']);
        $data['data_komentar'] = $this->M_basic->data_komentar()->result();
        $data['content'] = $this->load->view('backend_siswa/siswa_system/data_berita', $data, true);
        $this->load->view('backend_siswa/index', $data);
    }

    public function data_tugas()
    {
        $data['session_userdata'] = $this->session;
        $data['data_tugas']= $this->M_basic->data_tugas_J_pengajar_J_siswa_J_status('tbl_siswa.id_siswa', $this->session['id_siswa']);
        $data['data_komentar'] = $this->M_basic->data_komentar()->result();

        $data['content'] = $this->load->view('backend_siswa/siswa_system/data_tugas', $data, true);
        $this->load->view('backend_siswa/index', $data);
    }

    public function download_tugas($id_tugas)
    {
        $where = array('id_tugas' => $id_tugas);
        $data_download= $this->M_basic->edit_data($where, 'tbl_tugas')->row();
        force_download('Tugas/'.$data_download->isi_tugas, null);
    }

    public function Kumpulkan_tugas($id_tugas)
    {
        $data['session_userdata'] = $this->session;
        $data['data_siswa']=$this->M_basic->data_siswa_J_kelas('id_siswa', $this->session['id_siswa']);
        $where = array('id_tugas' => $id_tugas);
        $data['data_tugas'] = $this->M_basic->edit_data($where, 'tbl_tugas')->row();
        $data['content'] = $this->load->view('backend_siswa/siswa_system/kumpulkan_tugas', $data, true);
        $this->load->view('backend_siswa/index', $data);
    }

    public function Kumpulkan_tugas_add()
    {
        $id_tugas = $this->input->post('id_tugas');
        $id_siswa = $this->input->post('id_siswa');
        // $judul_tugas = $this->input->post('judul_tugas');
        $waktu_upload = $this->input->post('waktu_upload');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $status = $this->input->post('status');
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');

        $config['upload_path']          = './Tugas_Siswa/';
        $config['allowed_types']        = 'docx|pdf';
        $config['max_size']             = 100000;
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;
        $config['file_name']            = $nama." ".$kelas;

        $this->load->library('upload', $config);
        $this->upload->do_upload('isi_tugas');
        $data_file = array('upload_data' => $this->upload->data());
        $file_name = $data_file['upload_data']['file_name'];
        $file_ext  = $data_file['upload_data']['file_ext'];
        $nama_file = $file_name;
        $direktori = $data_file['upload_data']['file_path'];

        if (! $this->upload->do_upload('isi_tugas')) {
            $error = $this->upload->display_errors(); ?><script>alert('<?php echo $error; ?>');window.location='tambah_tugas';</script><?php
        } else {

            // $direktori = $data_file['upload_data']['full_path'];

            if ($waktu_upload > $waktu_selesai && $status=="2") {
                $data = array(
                'id_tugas'=>$id_tugas,
                'id_siswa'=>$id_siswa,
                // 'judul_tugas'=>$judul_tugas,
                'nama_file'=>$nama_file.'(telat mengumpulkan)',
                'direktori'=>$direktori.$nama_file,
                'waktu_upload'=>$waktu_upload,
              );
                $this->M_basic->input_data_user($data, 'tbl_kirim_tugas'); ?><script>alert('Berhasil mengirim tugas ?>');window.location='data_tugas';</script><?php
            } else {
                $data = array(
              'id_tugas'=>$id_tugas,
              'id_siswa'=>$id_siswa,
              // 'judul_tugas'=>$judul_tugas,
              'nama_file'=>$file_name,
              'direktori'=>$direktori.$nama_file,
              'waktu_upload'=>$waktu_upload,
            );
                $this->M_basic->input_data_user($data, 'tbl_kirim_tugas'); ?><script>alert('Berhasil mengirim tugas ?>');window.location='data_tugas';</script><?php
            }
        }
    }

    public function data_video()
    {
        $data['session_userdata'] = $this->session;
        $data['data_video']= $this->M_basic->data_video_J_pengajar();
        $data['data_komentar'] = $this->M_basic->data_komentar()->result();
        $data['content'] = $this->load->view('backend_siswa/siswa_system/data_video', $data, true);
        $this->load->view('backend_siswa/index', $data);
    }

    public function download_video($id_video)
    {
        $where = array('id_video' => $id_video);
        $data_download= $this->M_basic->edit_data($where, 'tbl_video')->row();
        force_download('Video/'.$data_download->isi_video, null);
    }

    public function komentar_berita($id_berita)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_berita' => $id_berita);
        $data['data_berita'] = $this->M_basic->edit_data($where, 'tbl_berita')->result();
        $data['status'] = $this->M_basic->data_status_posting()->result();
        $this->load->view('siswa/komentar_berita', $data);
    }

    public function komentar_berita_add()
    {
        $id_berita = $this->input->post('id_berita');
        $nama = $this->input->post('nama');
        $id_siswa = $this->input->post('id_siswa');
        $isi_komentar = $this->input->post('isi_komentar');

        $data = array(
          'id_berita'=>$id_berita,
          'nama'=>$nama,
          'id_siswa'=>$id_siswa,
          'isi_komentar'=>$isi_komentar,

      );
        $this->M_basic->input_data_user($data, 'tbl_komentar');
        redirect('Siswa_System/data_berita');
    }

    public function hapus_komentar_berita($id_komentar)
    {
        $where = array('id_komentar' => $id_komentar);
        $this->M_basic->hapus_data($where, 'tbl_komentar');
        redirect('Siswa_System/data_berita');
    }

    public function komentar_tugas($id_tugas)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_tugas' => $id_tugas);
        $data['data_tugas'] = $this->M_basic->edit_data($where, 'tbl_tugas')->result();
        $data['status'] = $this->M_basic->data_status_posting()->result();
        $this->load->view('siswa/komentar_tugas', $data);
    }

    public function komentar_tugas_add()
    {
        $id_tugas = $this->input->post('id_tugas');
        $nama = $this->input->post('nama');
        $id_siswa = $this->input->post('id_siswa');
        $isi_komentar = $this->input->post('isi_komentar');

        $data = array(
          'id_tugas'=>$id_tugas,
          'nama'=>$nama,
          'id_siswa'=>$id_siswa,
          'isi_komentar'=>$isi_komentar,

      );
        $this->M_basic->input_data_user($data, 'tbl_komentar');
        redirect('Siswa_System/data_tugas');
    }

    public function hapus_komentar_tugas($id_komentar)
    {
        $where = array('id_komentar' => $id_komentar);
        $this->M_basic->hapus_data($where, 'tbl_komentar');
        redirect('Siswa_System/data_tugas');
    }

    public function komentar_video($id_video)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_video' => $id_video);
        $data['data_video'] = $this->M_basic->edit_data($where, 'tbl_video')->result();
        $data['status'] = $this->M_basic->data_status_posting()->result();
        $this->load->view('siswa/komentar_video', $data);
    }

    public function komentar_video_add()
    {
        $id_video = $this->input->post('id_video');
        $nama = $this->input->post('nama');
        $id_siswa = $this->input->post('id_siswa');
        $isi_komentar = $this->input->post('isi_komentar');

        $data = array(
          'id_video'=>$id_video,
          'nama'=>$nama,
          'id_siswa'=>$id_siswa,
          'isi_komentar'=>$isi_komentar,

      );
        $this->M_basic->input_data_user($data, 'tbl_komentar');
        redirect('Siswa_System/data_video');
    }

    public function hapus_komentar_video($id_komentar)
    {
        $where = array('id_komentar' => $id_komentar);
        $this->M_basic->hapus_data($where, 'tbl_komentar');
        redirect('Siswa_System/data_video');
    }

    public function data_profile()
    {
        $data['session_userdata'] = $this->session;
        $data['data_profile'] = $this->M_basic->data_profile_siswa('id_siswa', $this->session['id_siswa']);
        $data['content'] = $this->load->view('backend_siswa/siswa_system/data_profile', $data, true);
        $this->load->view('backend_siswa/index', $data);
    }

    public function edit_profile($id_siswa)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_siswa' => $id_siswa);
        $data['data_mapel'] = $this->M_basic->data_mapel()->result();
        $data['data_profile'] = $this->M_basic->edit_data($where, 'tbl_siswa')->row();
        $data['content'] = $this->load->view('backend_siswa/siswa_system/edit_profile', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function edit_profile_add()
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
        );

            $where = array(
            'id_siswa' => $id_siswa
        );

            $this->M_basic->update_data($where, $data, 'tbl_siswa'); ?><script>alert('Berhasil mengupdate data Siswa');window.location='data_profile';</script><?php
        } else {
            ?><script>alert('Nis yang anda masukan sudah di pakai');window.location='data_profile';</script><?php
        }
    }

    public function data_posting_admin()
    {
        $data['session_userdata'] = $this->session;
        $data['data_posting_admin'] = $this->M_basic->data_berita_admin();
        $data['content'] = $this->load->view('backend_siswa/siswa_system/data_posting_admin', $data, true);
        $this->load->view('backend_siswa/index', $data);
    }
}
