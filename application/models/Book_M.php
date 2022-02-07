<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book_M extends CI_Model
{

    public function get_data($status = false)
    {
        $this->db->select('tbl_buku.*, tbl_kategori.kategori as kategori')->from('tbl_buku')
            ->join('tbl_kategori', 'tbl_buku.kategori = tbl_kategori.id');
        if ($status == true)
            $this->db->where('tbl_buku.status', 1);
        return $this->db->get()->result();
    }

    public function get_id($id)
    {
        return $this->db->from('tbl_buku')
            ->join('tbl_kategori', 'tbl_buku.kategori = tbl_kategori.id')
            ->where('tbl_buku.id', $id)->get()->row_array();
    }

    public function post_data($data)
    {
        $this->db->insert('tbl_buku', $data);
        return $this->db->insert_id();
    }

    public function put_data($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_buku', $data);
        return true;
    }

    public function get_kategori($id, $status = false)
    {
        $this->db->select('tbl_buku.*, tbl_kategori.kategori as kategori')->from('tbl_buku')
            ->join('tbl_kategori', 'tbl_buku.kategori = tbl_kategori.id')
            ->where('tbl_kategori.id', $id);
        if ($status == true)
            $this->db->where('tbl_buku.status', 1);
        return $this->db->get()->result();
    }
}

/* End of file Auth.php */
/* Location: ./application/models/Auth.php */