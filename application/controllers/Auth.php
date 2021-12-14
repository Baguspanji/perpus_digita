<?php

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Check');
	}

	function check_login()
	{
		if (!empty($_POST)) {
			// var_dump($_POST);
			$user 	 = htmlspecialchars($_POST['username']);
			$pass	 = htmlspecialchars($_POST['password']);
			$emailV	 = preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $user);
			// var_dump($emailV);

			if (isset($emailV)) { // For Email Validation
				$array['input'] = $user;
				$data = $this->Check->email($array);

				// var_dump($data->result(), $data->num_rows());

				if ($data->num_rows() > 0) {

					$user = $data->result()[0];
					$pass = md5($pass);

					// var_dump($pass, $user->password);

					if ($pass === $user->password) {
						echo 1;
					} else {
						echo 2;
					}
				} else {
					echo 3;
				}
			} else { // For Username

				$array['input'] = $user;
				$data = $this->Check->user($array);

				// var_dump($data->result(), $data->num_rows());

				if ($data->num_rows() > 0) {

					$user = $data->result()[0];
					$pass = md5($pass);

					// var_dump($pass, $user->password);

					if ($pass === $user->password) {
						$_SESSION['login']['username']   = $user;
						$_SESSION['login']['last_login'] = strtotime(date('l, J F Y H.i.s'));

						echo 1;
					} else {
						echo 2;
					}
				} else {
					echo 3;
				}
			}
		} else {
			$this->load->view('errors/html/error_403');
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
}
