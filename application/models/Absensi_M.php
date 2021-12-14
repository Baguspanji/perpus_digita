<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_M extends CI_Model
{

    public function post_data($data)
    {
        $this->db->insert('tbl_absensi', $data);
        return $this->db->insert_id();
    }

}

/* End of file Auth.php */
/* Location: ./application/models/Auth.php */