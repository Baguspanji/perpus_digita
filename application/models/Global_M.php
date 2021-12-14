<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Global_M extends CI_Model
{

    public function get_data($table)
    {
        return $this->db->get($table)->result();
    }

    function makeHash($string)
    {
        $options = array('cost' => 11);
        $hash    = password_hash($string, PASSWORD_BCRYPT, $options);
        return $hash;
    }
}

/* End of file Auth.php */
/* Location: ./application/models/Auth.php */