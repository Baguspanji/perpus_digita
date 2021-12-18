<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_M extends CI_Model
{

    public function get_data()
    {
        return $this->db->select('tbl_absensi.*, tbl_siswa.nama_siswa as nama')->from('tbl_absensi')
            ->join('tbl_siswa', 'tbl_absensi.nis = tbl_siswa.nis')
            ->get()->result();
    }

    public function post_data($data)
    {
        $this->db->insert('tbl_absensi', $data);
        return $this->db->insert_id();
    }
}

/* End of file Auth.php */
/* Location: ./application/models/Auth.php */