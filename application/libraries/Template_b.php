<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template_b
{
    public function view($view, $data = null)
    {
        $data['content'] = $view;

        $this->CI = &get_instance();
        // $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view('backend/layouts/index', $data);
    }
}
