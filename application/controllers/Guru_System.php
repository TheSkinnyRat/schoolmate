<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_System extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('guru') == false) {
            redirect(base_url("Guru"));
        }
        if ($this->session->userdata('guru') == true) {
            $this->session = $this->session->userdata('guru');
        }
        $this->load->model('M_basic');
        $this->load->helper(array('url','form','download'));
    }
    public function index()
    {
        $data['session_userdata'] = $this->session;
        $data['content'] = $this->load->view('backend_guru/guru/dashboard', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function data_berita()
    {
        $data['session_userdata'] = $this->session;
        $data['data_berita']= $this->M_basic->data_guru_J_pengajar_J_berita('id_guru', $this->session['id_guru']);
        $data['data_komentar'] = $this->M_basic->data_komentar()->result();
        $data['content'] = $this->load->view('backend_guru/guru_system/data_berita', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function tambah_berita()
    {
        $data['session_userdata'] = $this->session;
        $data['data_berita'] = $this->M_basic->data_pengajar_J_guru('id_guru', $this->session['id_guru']);
        // $this['data_posting'] = $this->M_basic->data_posting_J_pengajar($nip);
        $data['content'] = $this->load->view('backend_guru/guru_system/tambah_berita', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function tambah_berita_add()
    {
        $id_pengajar = $this->input->post('id_pengajar');
        $judul_post = $this->input->post('judul_post');
        $isi_post = $this->input->post('isi_post');
        $tgl_post = $this->input->post('tgl_post');


        $data = array(
            'id_pengajar'=>$id_pengajar,
            'judul_post'=>$judul_post,
            'isi_post'=>$isi_post,
            'tgl_post'=>$tgl_post,


        );
        $this->M_basic->input_data_user($data, 'tbl_berita');
        redirect('Guru_System/data_berita');
    }

    public function edit_berita($id_berita)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_berita' => $id_berita);
        $data['data_edit_berita'] = $this->M_basic->edit_data($where, 'tbl_berita')->row();
        $data['data_berita'] = $this->M_basic->data_pengajar_J_guru('id_guru', $this->session['id_guru']);

        $data['status'] = $this->M_basic->data_status_posting()->result();
        $data['content'] = $this->load->view('backend_guru/guru_system/edit_berita', $data, true);
        $this->load->view('backend/index', $data);
    }

    public function edit_berita_add($id_berita)
    {
        $id_berita = $this->input->post('id_berita');
        $id_pengajar = $this->input->post('id_pengajar');
        $judul_post = $this->input->post('judul_post');
        $isi_post = $this->input->post('isi_post');


        $data = array(
            'id_berita'=>$id_berita,
            'id_pengajar'=>$id_pengajar,
            'judul_post'=>$judul_post,
            'isi_post'=>$isi_post,
        );

        $where = array(
            'id_berita'=>$id_berita,
        );

        $this->M_basic->update_data($where, $data, 'tbl_berita');
        redirect('Guru_System/data_berita');
    }

    public function hapus_berita($id_berita)
    {
        $where = array('id_berita' => $id_berita);
        $this->M_basic->hapus_data($where, 'tbl_berita');
        redirect('Guru_System/data_berita');
    }

    public function data_tugas()
    {
        $data['session_userdata'] = $this->session;
        $data['data_tugas']= $this->M_basic->data_guru_J_pengajar_J_tugas_J_status('id_guru', $this->session['id_guru']);
        $data['data_komentar'] = $this->M_basic->data_komentar()->result();
        $data['content'] = $this->load->view('backend_guru/guru_system/data_tugas', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function download_tugas($id_tugas)
    {
        $where = array('id_tugas' => $id_tugas);
        $data_download= $this->M_basic->edit_data($where, 'tbl_tugas')->row();
        force_download('Tugas/'.$data_download->isi_tugas, null);
    }


    public function tambah_tugas()
    {
        $data['session_userdata'] = $this->session;
        $jum_kelas = $this->M_basic->count_kelas('tbl_pengajar.nip', $this->session['nip']);
        $data['count_id_kelas'] = count($jum_kelas);
        $data['data_tugas'] = $this->M_basic->data_pengajar_J_guru('id_guru', $this->session['id_guru']);
        $data['status_tugas'] = $this->M_basic->data_status_tugas()->result();
        // $this['data_posting'] = $this->M_basic->data_posting_J_pengajar($nip);
        $data['content'] = $this->load->view('backend_guru/guru_system/tambah_tugas', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function tambah_tugas_add()
    {
        $id_pengajar = $this->input->post('id_pengajar');
        $judul_tugas = $this->input->post('judul_tugas');
        $waktu_mulai = $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $status = $this->input->post('status');

        $config['upload_path']          = './Tugas/';
        $config['allowed_types']        = 'docx|pdf';
        $config['max_size']             = 100000;
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('isi_tugas')) {
            $error = $this->upload->display_errors(); ?><script>alert('<?php echo $error; ?>');window.location='tambah_tugas';</script><?php
        } else {
            $data_file = array('upload_data' => $this->upload->data());
            $file_name = $data_file['upload_data']['file_name'];
            $direktori = $data_file['upload_data']['full_path'];
            $data = array(
                'id_pengajar'=>$id_pengajar,
                'judul_tugas'=>$judul_tugas,
                'isi_tugas'=>$file_name,
                'direktori'=>$direktori,
                'waktu_mulai'=>$waktu_mulai,
                'waktu_selesai'=>$waktu_selesai,
                'status'=>$status,

            );
            $this->M_basic->input_data_user($data, 'tbl_tugas'); ?><script>alert('Berhasil mengirim tugas ?>');window.location='data_tugas';</script><?php
        }
    }

    public function edit_tugas($id_tugas)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_tugas' => $id_tugas);
        $data['data_tugas'] = $this->M_basic->edit_data($where, 'tbl_tugas')->row();
        $data['status_tugas'] = $this->M_basic->data_status_tugas()->result();
        $data['content'] = $this->load->view('backend_guru/guru_system/edit_tugas', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function edit_tugas_add()
    {
        $id_tugas = $this->input->post('id_tugas');
        $id_pengajar = $this->input->post('id_pengajar');
        $judul_tugas = $this->input->post('judul_tugas');
        $waktu_mulai = $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $status = $this->input->post('status');

        $config['upload_path']          = './Tugas/';
        $config['allowed_types']        = 'docx|pdf';
        $config['max_size']             = 1000000;
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('isi_tugas');
        $data_file = array('upload_data' => $this->upload->data());
        $file_name = $data_file['upload_data']['file_name'];
        $direktori = $data_file['upload_data']['full_path'];

        if ($upload=="") {
            $data = array(
            'id_tugas'=>$id_tugas,
            'id_pengajar'=>$id_pengajar,
            'judul_tugas'=>$judul_tugas,
            'waktu_mulai'=>$waktu_mulai,
            'waktu_selesai'=>$waktu_selesai,
            'status'=>$status,

        );
            $where = array(
            'id_tugas'=>$id_tugas,
        );

            $this->M_basic->update_data($where, $data, 'tbl_tugas');
            redirect('Guru_System/data_tugas');
        } else {
            $data = array(
                'id_tugas'=>$id_tugas,
                'id_pengajar'=>$id_pengajar,
                'judul_tugas'=>$judul_tugas,
                'isi_tugas'=>$file_name,
                'direktori'=>$direktori,
                'waktu_mulai'=>$waktu_mulai,
                'waktu_selesai'=>$waktu_selesai,
                'status'=>$status,

            );
            $where = array(
                'id_tugas'=>$id_tugas,
            );

            $this->M_basic->update_data($where, $data, 'tbl_tugas');
            redirect('Guru_System/data_tugas');
        }
    }

    public function hapus_tugas($id_tugas)
    {
        $where = array('id_tugas' => $id_tugas);
        $this->M_basic->hapus_data($where, 'tbl_tugas');
        redirect('Guru_System/data_tugas');
    }

    public function data_video()
    {
        $data['session_userdata'] = $this->session;
        $data['data_video']= $this->M_basic->data_video_J_pengajar();
        $data['data_komentar'] = $this->M_basic->data_komentar()->result();
        $data['content'] = $this->load->view('backend_guru/guru_system/data_video', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function download_video($id_video)
    {
        $where = array('id_video' => $id_video);
        $data_download= $this->M_basic->edit_data($where, 'tbl_video')->row();
        force_download('Video/'.$data_download->isi_video, null);
    }

    public function tambah_video()
    {
        $data['session_userdata'] = $this->session;
        $jum_kelas = $this->M_basic->count_kelas('tbl_pengajar.nip', $this->session['nip']);
        $data['count_id_kelas'] = count($jum_kelas);
        $data['data_video'] = $this->M_basic->data_pengajar_J_guru('id_guru', $this->session['id_guru']);
        $data['status_tugas'] = $this->M_basic->data_status_tugas()->result();

        // $this['data_posting'] = $this->M_basic->data_posting_J_pengajar($nip);
        $data['content'] = $this->load->view('backend_guru/guru_system/tambah_video', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function tambah_video_add()
    {
        $id_pengajar = $this->input->post('id_pengajar');
        $judul_video = $this->input->post('judul_video');
        $tgl_video = $this->input->post('tgl_video');


        $config['upload_path']          = './Video/';
        $config['allowed_types']        = 'mp4|3gpp|x-flv';
        $config['max_size']             = 50000000;
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('isi_video')) {
            $error = $this->upload->display_errors(); ?><script>alert('<?php echo $error; ?>');window.location='tambah_video';</script><?php
        } else {
            $data_file = array('upload_data' => $this->upload->data());
            $file_name = $data_file['upload_data']['file_name'];
            $direktori = $data_file['upload_data']['full_path'];
            $data = array(
                'id_pengajar'=>$id_pengajar,
                'judul_video'=>$judul_video,
                'isi_video'=>$file_name,
                'direktori'=>$direktori,
                'tgl_video'=>$tgl_video,


            );
            $this->M_basic->input_data_user($data, 'tbl_video'); ?><script>alert('Berhasil mengirim video ?>');window.location='data_video';</script><?php
        }
    }

    public function edit_video($id_video)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_video' => $id_video);
        $data['data_video'] = $this->M_basic->edit_data($where, 'tbl_video')->row();
        $data['status'] = $this->M_basic->data_status_posting()->result();
        $data['content'] = $this->load->view('backend_guru/guru_system/edit_video', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function edit_video_add()
    {
        $id_video = $this->input->post('id_video');
        $id_pengajar = $this->input->post('id_pengajar');
        $judul_video = $this->input->post('judul_video');

        $config['upload_path']          = './Video/';
        $config['allowed_types']        = 'mp4|3gpp|x-flv';
        $config['max_size']             = 50000000;
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('isi_video');
        $data_file = array('upload_data' => $this->upload->data());
        $file_name = $data_file['upload_data']['file_name'];
        $direktori = $data_file['upload_data']['full_path'];


        if ($upload=="") {
            $data = array(
          'id_video'=>$id_video,
          'id_pengajar'=>$id_pengajar,
          'judul_video'=>$judul_video,

      );
            $where = array(
          'id_video'=>$id_video,
      );

            $this->M_basic->update_data($where, $data, 'tbl_video');
            redirect('Guru_System/data_video');
        } else {
            $data = array(
                'id_video'=>$id_video,
                'id_pengajar'=>$id_pengajar,
                'judul_video'=>$judul_video,
                'isi_video'=>$file_name,
                'direktori'=>$direktori,

            );
            $where = array(
                'id_video'=>$id_video,
            );

            $this->M_basic->update_data($where, $data, 'tbl_video');
            redirect('Guru_System/data_video');
        }
    }

    public function hapus_video($id_video)
    {
        $where = array('id_video' => $id_video);
        $this->M_basic->hapus_data($where, 'tbl_video');
        redirect('Guru_System/data_video');
    }

    public function data_kirim_tugas()
    {
        $data['session_userdata'] = $this->session;
        // $jum_kelas = $this->M_basic->count_kelas('id_guru', $this->session['id_guru']);
        // $data['count_id_kelas'] = count($jum_kelas);
        $data['data_kirim_tugas'] = $this->M_basic->data_guru_J_pengajar_J_tugas_J_kirim_tugas_J_siswa_J_kelas('id_guru', $this->session['id_guru']);
        // $this['data_posting'] = $this->M_basic->data_posting_J_pengajar($nip);
        $data['content'] = $this->load->view('backend_guru/guru_system/data_kirim_tugas', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function download_kirim_tugas($id_kirim_tugas)
    {
        $where = array('id_kirim_tugas' => $id_kirim_tugas);
        $data_download= $this->M_basic->edit_data($where, 'tbl_kirim_tugas')->row();
        force_download($data_download->direktori, null);
    }

    public function hapus_kirim_tugas($id_kirim_tugas)
    {
        $where = array('id_kirim_tugas' => $id_kirim_tugas);
        $this->M_basic->hapus_data($where, 'tbl_kirim_tugas');
        redirect('Guru_System/data_kirim_tugas');
    }

    public function komentar_berita($id_berita)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_berita' => $id_berita);
        $data['data_berita'] = $this->M_basic->edit_data($where, 'tbl_berita')->result();
        $data['status'] = $this->M_basic->data_status_posting()->result();
        $this->load->view('guru/komentar_berita', $data);
    }

    public function komentar_berita_add()
    {
        $id_berita = $this->input->post('id_berita');
        $nama = $this->input->post('nama');
        $id_guru = $this->input->post('id_guru');
        $isi_komentar = $this->input->post('isi_komentar');

        $data = array(
          'id_berita'=>$id_berita,
          'nama'=>$nama." <i class='fa fa-check-circle'></i>",
          'id_guru'=>$id_guru,
          'isi_komentar'=>$isi_komentar,

      );
        $this->M_basic->input_data_user($data, 'tbl_komentar');
        redirect('Guru_System/posting_guru');
    }

    public function hapus_komentar_berita($id_komentar)
    {
        $where = array('id_komentar' => $id_komentar);
        $this->M_basic->hapus_data($where, 'tbl_komentar');
        redirect('Guru_System/posting_guru');
    }

    public function komentar_tugas($id_tugas)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_tugas' => $id_tugas);
        $data['data_tugas'] = $this->M_basic->edit_data($where, 'tbl_tugas')->result();
        $data['status'] = $this->M_basic->data_status_posting()->result();
        $this->load->view('guru/komentar_tugas', $data);
    }

    public function komentar_tugas_add()
    {
        $id_tugas = $this->input->post('id_tugas');
        $nama = $this->input->post('nama');
        $id_guru = $this->input->post('id_guru');
        $isi_komentar = $this->input->post('isi_komentar');

        $data = array(
          'id_tugas'=>$id_tugas,
          'nama'=>$nama." <i class='fa fa-check-circle'></i>",
          'id_guru'=>$id_guru,
          'isi_komentar'=>$isi_komentar,

      );
        $this->M_basic->input_data_user($data, 'tbl_komentar');
        redirect('Guru_System/posting_tugas');
    }

    public function hapus_komentar_tugas($id_komentar)
    {
        $where = array('id_komentar' => $id_komentar);
        $this->M_basic->hapus_data($where, 'tbl_komentar');
        redirect('Guru_System/posting_tugas');
    }

    public function komentar_video($id_video)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_video' => $id_video);
        $data['data_video'] = $this->M_basic->edit_data($where, 'tbl_video')->result();
        $data['status'] = $this->M_basic->data_status_posting()->result();
        $this->load->view('guru/komentar_video', $data);
    }

    public function komentar_video_add()
    {
        $id_video = $this->input->post('id_video');
        $nama = $this->input->post('nama');
        $id_guru = $this->input->post('id_guru');
        $isi_komentar = $this->input->post('isi_komentar');

        $data = array(
          'id_video'=>$id_video,
          'nama'=>$nama." <i class='fa fa-check-circle'></i>",
          'id_guru'=>$id_guru,
          'isi_komentar'=>$isi_komentar,

      );
        $this->M_basic->input_data_user($data, 'tbl_komentar');
        redirect('Guru_System/posting_video');
    }

    public function hapus_komentar_video($id_komentar)
    {
        $where = array('id_komentar' => $id_komentar);
        $this->M_basic->hapus_data($where, 'tbl_komentar');
        redirect('Guru_System/posting_video');
    }

    public function video()
    {
        $this->load->view('guru/video');
    }

    public function data_profile()
    {
        $data['session_userdata'] = $this->session;
        $data['data_profile'] = $this->M_basic->data_profile_guru('id_guru', $this->session['id_guru']);
        $data['content'] = $this->load->view('backend_guru/guru_system/data_profile', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function edit_profile($id_guru)
    {
        $data['session_userdata'] = $this->session;
        $where = array('id_guru' => $id_guru);
        $data['data_mapel'] = $this->M_basic->data_mapel()->result();
        $data['data_profile'] = $this->M_basic->edit_data($where, 'tbl_guru')->row();
        $data['content'] = $this->load->view('backend_guru/guru_system/edit_profile', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function edit_profile_add()
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

            $this->M_basic->update_data($where, $data, 'tbl_guru'); ?><script>alert('Berhasil mengupdate data guru');window.location='data_profile';</script><?php
        } else {
            ?><script>alert('Nip yang anda masukan sudah di pakai');window.location='data_profile';</script><?php
        }
    }

    public function posting_admin()
    {
        $data['session_userdata'] = $this->session;
        $data['data_posting_admin'] = $this->M_basic->data_berita_admin();
        $data['content'] = $this->load->view('backend_guru/guru_system/posting_admin', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function posting_guru()
    {
        $data['session_userdata'] = $this->session;
        $data['data_posting_guru']= $this->M_basic->data_guru_J_pengajar_J_berita('id_guru', $this->session['id_guru']);
        $data['data_komentar'] = $this->M_basic->data_komentar()->result();
        $data['content'] = $this->load->view('backend_guru/guru_system/posting_guru', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function posting_tugas()
    {
        $data['session_userdata'] = $this->session;
        $data['data_tugas']= $this->M_basic->data_guru_J_pengajar_J_tugas_J_status('id_guru', $this->session['id_guru']);
        $data['data_komentar'] = $this->M_basic->data_komentar()->result();
        $data['content'] = $this->load->view('backend_guru/guru_system/posting_tugas', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function posting_video()
    {
        $data['session_userdata'] = $this->session;
        $data['data_video']= $this->M_basic->data_video_J_pengajar();
        $data['data_komentar'] = $this->M_basic->data_komentar()->result();
        $data['content'] = $this->load->view('backend_guru/guru_system/posting_video', $data, true);
        $this->load->view('backend_guru/index', $data);
    }

    public function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_basic->search_blog($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $arr_result[] = array(
                    'id_mapel'			=> $row->id_mapel,
                    'id_kelas'	=> $row->id_kelas,
                );
                }
                echo json_encode($arr_result);
            }
        }
    }
}
