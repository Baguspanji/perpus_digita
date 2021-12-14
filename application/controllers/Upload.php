<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{
    public function index()
    {
        $post = $this->input->post();

        if ($post['rule'] == 'images' || $post['rule'] == 'siswa' || $post['rule'] == 'pdf') {
            $file['upload_path']          = './assets/' . $post['rule'];
            if ($post['rule'] == 'images' || $post['rule'] == 'siswa') {
                $file['allowed_types']    = 'gif|jpg|png|jpeg';
            } else {
                $file['allowed_types']    = 'pdf';
            }

            $this->load->library('upload', $file);

            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();
                $data = [
                    'message' => $post['rule'] . ' tidak valid',
                    'error' => $error
                ];

                echo json_encode($data);
            } else {
                $data = [
                    'message' => 'success',
                    'file' => $this->upload->data()['file_name']
                ];

                echo json_encode($data);
            }
        }
    }
}
