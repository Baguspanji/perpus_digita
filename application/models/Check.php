<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Model {

	public function email( $data = [] ) {
		$this->db->where( 'email', $data['input'] );
		$result = $this->db->get( 'tbl_user' );
		return $result;
	}
	public function user( $data = [] ) {
		$this->db->where( 'username', $data['input'] );
		$result = $this->db->get( 'tbl_user' );
		return $result;
	}

}

/* End of file Auth.php */
/* Location: ./application/models/Auth.php */