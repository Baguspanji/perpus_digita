<?php

class Login extends CI_Controller
{
        function index()
        {
                if (!empty($_SESSION['login']) === array()) {
                        redirect('auth/check');
                } else {
                        $this->load->view('backend/auth/login');
                }
        }
}
