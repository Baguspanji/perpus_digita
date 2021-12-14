<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_M extends CI_Model
{

    public function get_data()
    {
        return $this->db->from('tbl_siswa')
            ->get()->result();
    }

    public function get_id($id)
    {
        return $this->db->from('tbl_siswa')
            ->where('id', $id)->get()->row_array();
    }

    public function post_data($data)
    {
        $this->db->insert('tbl_siswa', $data);
        return $this->db->insert_id();
    }

    public function put_data($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_siswa', $data);
        return true;
    }

    public function get_where($where)
    {
        return $this->db->get_where('tbl_siswa',$where);
    }
}

/* End of file Auth.php */
/* Location: ./application/models/Auth.php */