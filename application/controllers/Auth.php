<?php

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_M', 'auth');
	}

	function check_login()
	{
		$post = $this->input->post();
		if ($post) {
			$cekdata = $this->auth->login($post['username'], $post['password']);

			if ($cekdata == "admin") {
				$this->session->set_flashdata('notifikasi', '<script>notifikasi("Anda Berhasil Login sebagai Admin", "success", "las la-exclamation")</script>');
				redirect('admin');
			} elseif ($cekdata == "pass false") {
				$this->session->set_flashdata('notifikasi', '<script>notifikasi("Login Gagal, Password Salah", "danger", "las la-exclamation")</script>');
				redirect('auth/login');
			} elseif ($cekdata == "nonaktif") {
				$this->session->set_flashdata('notifikasi', '<script>notifikasi("Login Gagal, akun dinonaktifkan", "danger", "las la-exclamation")</script>');
				redirect('auth/login');
			} else {
				$this->session->set_flashdata('notifikasi', '<script>notifikasi("Login Gagal, Username tidak ditemukan", "danger", "las la-exclamation")</script>');
				redirect('auth/login');
			}
		} else {
			$this->load->view('auth/login');
		}
	}

	public function login()
	{
		if (!empty($_SESSION['login']) === array()) {
			redirect('auth/check');
		} else {
			$this->load->view('backend/auth/login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}
}
