<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_M extends CI_Model {

	public function get_data()
    {
        return $this->db->from('tbl_kategori')
        ->get()->result();
    }
	
    public function get_id($id)
    {
        return $this->db->from('tbl_kategori')
        ->where('id', $id)->get()->row_array();
    }

    public function post_data($data)
    {
        $this->db->insert('tbl_kategori', $data);
        return $this->db->insert_id();
    }

    public function put_data($data, $id)
    {
        $this->db->where('id', $id);
		$this->db->update('tbl_kategori', $data);
		return true;
    }
}

/* End of file Auth.php */
/* Location: ./application/models/Auth.php */