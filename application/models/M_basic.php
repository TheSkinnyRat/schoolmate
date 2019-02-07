<?php

class M_basic extends CI_MODEL
{
    public function get_data_admin($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_data_siswa($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_data_guru($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function data_siswa()
    {
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_siswa.id_kelas');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_siswa_J_kelas($column, $where)
    {
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_siswa.id_kelas');
        $this->db->where($column, $where);
        $query = $this->db->get();
        return $query->row();
    }

    public function data_pengajar_J_guru($column, $where)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengajar');
        $this->db->join('tbl_guru', 'tbl_guru.nip=tbl_pengajar.nip');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_pengajar.id_kelas');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $this->db->where($column, $where);
        $query = $this->db->get();
        return $query->result();
    }

    public function data_guru_J_pengajar_J_berita($column, $where)
    {
        $this->db->select('*');
        $this->db->from('tbl_guru');
        $this->db->join('tbl_pengajar', 'tbl_pengajar.nip=tbl_guru.nip');
        $this->db->join('tbl_berita', 'tbl_berita.id_pengajar=tbl_pengajar.id_pengajar');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_pengajar.id_kelas');
        $this->db->where($column, $where);
        $query = $this->db->get();
        return $query->result();
    }

    public function data_guru_J_pengajar_J_tugas_J_status($column, $where)
    {
        $this->db->select('*');
        $this->db->from('tbl_guru');
        $this->db->join('tbl_pengajar', 'tbl_pengajar.nip=tbl_guru.nip');
        $this->db->join('tbl_tugas', 'tbl_tugas.id_pengajar=tbl_pengajar.id_pengajar');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_pengajar.id_kelas');
        $this->db->join('tbl_status_tugas', 'tbl_status_tugas.status=tbl_tugas.status');
        $this->db->where($column, $where);
        $query = $this->db->get();
        return $query->result();
    }

    public function data_guru_J_pengajar_J_tugas_J_status2()
    {
        $this->db->select('*');
        $this->db->from('tbl_guru');
        $this->db->join('tbl_pengajar', 'tbl_pengajar.nip=tbl_guru.nip');
        $this->db->join('tbl_tugas', 'tbl_tugas.id_pengajar=tbl_pengajar.id_pengajar');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_pengajar.id_kelas');
        $this->db->join('tbl_status_tugas', 'tbl_status_tugas.status=tbl_tugas.status');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_guru_J_pengajar_J_video($column, $where)
    {
        $this->db->select('*');
        $this->db->from('tbl_guru');
        $this->db->join('tbl_pengajar', 'tbl_pengajar.nip=tbl_guru.nip');
        $this->db->join('tbl_video', 'tbl_video.id_pengajar=tbl_pengajar.id_pengajar');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_pengajar.id_kelas');
        $this->db->where($column, $where);
        $query = $this->db->get();
        return $query->result();
    }

    public function data_berita_J_pengajar_J_siswa($column, $where)
    {
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_pengajar', 'tbl_pengajar.id_kelas=tbl_siswa.id_kelas');
        $this->db->join('tbl_berita', 'tbl_berita.id_pengajar=tbl_pengajar.id_pengajar');
        $this->db->join('tbl_guru', 'tbl_guru.nip=tbl_pengajar.nip');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_pengajar.id_kelas');
        $this->db->where($column, $where);
        $this->db->order_by('tbl_berita.tgl_post', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_tugas_J_pengajar_J_siswa_J_status($column, $where)
    {
        $this->db->select('*, tbl_tugas.id_tugas as id_tugas');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_pengajar', 'tbl_pengajar.id_kelas=tbl_siswa.id_kelas');
        $this->db->join('tbl_tugas', 'tbl_tugas.id_pengajar=tbl_pengajar.id_pengajar');
        $this->db->join('tbl_guru', 'tbl_guru.nip=tbl_pengajar.nip');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_pengajar.id_kelas');
        $this->db->join('tbl_status_tugas', 'tbl_status_tugas.status=tbl_tugas.status');
        $this->db->join('tbl_kirim_tugas', 'tbl_kirim_tugas.id_tugas=tbl_tugas.id_tugas', 'left');

        $this->db->where($column, $where);
        $this->db->order_by('tbl_tugas.waktu_mulai', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_video_J_pengajar()
    {
        $this->db->select('*');
        $this->db->from('tbl_pengajar');
        $this->db->join('tbl_video', 'tbl_video.id_pengajar=tbl_pengajar.id_pengajar');
        $this->db->join('tbl_guru', 'tbl_guru.nip=tbl_pengajar.nip');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $query = $this->db->get();
        return $query->result();
    }


    public function data_berita_user()
    {
        $this->db->select('*');
        $this->db->from('tbl_guru');
        $this->db->join('tbl_pengajar', 'tbl_pengajar.nip=tbl_guru.nip');
        $this->db->join('tbl_berita', 'tbl_berita.id_pengajar=tbl_pengajar.id_pengajar');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_pengajar.id_kelas');
        $query = $this->db->get();
        return $query->result();
    }


    public function data_berita_admin()
    {
        $this->db->select('*');
        $this->db->from('tbl_posting_admin');
        $this->db->join('tbl_admin', 'tbl_admin.id=tbl_posting_admin.id');
        $this->db->join('tbl_status_posting', 'tbl_status_posting.status=tbl_posting_admin.status');
        $this->db->order_by('tbl_posting_admin.tgl_post', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }



    public function count_kelas($column, $where)
    {
        $this->db->select('tbl_pengajar.id_kelas');
        $this->db->from('tbl_pengajar');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_pengajar.id_kelas');
        $this->db->where($column, $where);
        $query = $this->db->get();
        $this->db->order_by('tbl_mapel.nama_mapel', 'ASC');
        return $query->result();
    }


    public function data_posting_J_pengajar($nip)
    {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->join('tbl_pengajar', 'tbl_pengajar.id_pengajar=tbl_berita.id_pengajar');
        $this->db->where($nip);
        $query = $this->db->get();
        return $query->result();
    }

    public function data_pengajar()
    {
        $this->db->select('*');
        $this->db->from('tbl_pengajar');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_pengajar.id_kelas');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_guru_J_pengajar_J_tugas_J_kirim_tugas_J_siswa_J_kelas($column, $where)
    {
        $this->db->select('*');
        $this->db->from('tbl_guru');
        $this->db->join('tbl_pengajar', 'tbl_pengajar.nip=tbl_guru.nip');
        $this->db->join('tbl_tugas', 'tbl_tugas.id_pengajar=tbl_pengajar.id_pengajar');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $this->db->join('tbl_kirim_tugas', 'tbl_kirim_tugas.id_tugas=tbl_tugas.id_tugas');
        $this->db->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_kirim_tugas.id_siswa');
        $this->db->where($column, $where);
        $query = $this->db->get();
        return $query->result();
    }

    public function data_komentar_J_siswa_J_guru()
    {
        $this->db->select('*');
        $this->db->from('tbl_komentar');
        $this->db->join('tbl_siswa', 'tbl_siswa.id_siswa=tbl_komentar.id_siswa');
        $this->db->join('tbl_guru', 'tbl_guru.id_guru=tbl_komentar.id_guru');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_komentar_J_guru()
    {
        $this->db->select('*');
        $this->db->from('tbl_komentar');
        $this->db->join('tbl_guru', 'tbl_guru.id_guru=tbl_komentar.id_guru');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_mapel()
    {
        return $this->db->get('tbl_mapel');
    }

    public function data_kelas()
    {
        return $this->db->get('tbl_kelas');
    }

    public function data_guru()
    {
        return $this->db->get('tbl_guru');
    }

    public function data_berita()
    {
        return $this->db->get('tbl_berita');
    }

    public function data_status_posting()
    {
        return $this->db->get('tbl_status_posting');
    }

    public function data_status_tugas()
    {
        return $this->db->get('tbl_status_tugas');
    }

    public function data_komentar()
    {
        return $this->db->get('tbl_komentar');
    }

    public function data_profile_guru($column, $where)
    {
        $this->db->select('*');
        $this->db->from('tbl_guru');
        $this->db->where($column, $where);
        $query = $this->db->get();
        return $query->result();
    }

    public function data_profile_siswa($column, $where)
    {
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->where($column, $where);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_username($table, $column, $username)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column, $username);
        $query = $this->db->get();
        return $query;
    }

    public function input_data_user($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }


    public function edit_data_pengajar($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengajar');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel=tbl_pengajar.id_mapel');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas=tbl_pengajar.id_kelas');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function search_blog($title)
    {
        $this->db->like('id_kelas', $title, 'both');
        $this->db->order_by('id_kelas', 'ASC');
        return $this->db->get('tbl_pengajar')->result();
    }

    public function get_pengajar($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
}
