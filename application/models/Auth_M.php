<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_M extends CI_Model
{

	function login($user, $pass)
	{
		$data = $this->db->get_where('tbl_user', array('username' => $user))->row_array();
		if ($data != null) {
			$hash = $data['password'];
			if ($data['status'] == 0 && $data['role'] != 'admin') {
				return "nonaktif";
			} elseif (password_verify($pass, $hash)) {
				$this->session->set_userdata(
					array(
						'id'       => $data['id'],
						'nama'     => $data['nama'],
						'role'     => $data['role'],
						'username' => $data['username'],
                        )
				);
				return $data['role'];
			} else {
				return "pass false";
			}
		}
	}

    function makeHash($string)
	{
		$options = array('cost' => 11);
		$hash    = password_hash($string, PASSWORD_BCRYPT, $options);
		return $hash;
	}
}