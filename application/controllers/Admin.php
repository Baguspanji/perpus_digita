<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Book_M', 'book');
        $this->load->model('Kategori_M', 'kategori');
        $this->load->model('Siswa_M', 'siswa');
        $this->load->model('Absensi_M', 'absensi');
        $this->load->model('Global_M', 'global');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'count' => [
                $this->db->count_all('tbl_buku'),
                $this->db->count_all('tbl_tamu'),
                $this->db->count_all('tbl_siswa'),
            ],
        );

        $this->template_b->view('backend/dashboard/index', $data);
    }

    public function buku()
    {
        $books = $this->book->get_data();

        $data = array(
            'title' => 'Daftar Buku',
            'books' => $books,
        );

        $this->template_b->view('backend/book/index', $data);
    }

    public function post_buku()
    {
        $post = $this->input->post();
        $kategoris = $this->kategori->get_data();
        $uri = $this->uri->segment(3);

        if ($post) {
            $config = array(
                array(
                    'field' => 'nama_buku',
                    'label' => 'Nama Buku',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'kategori',
                    'label' => 'Kategori',
                    'rules' => 'required',
                    "errors" => [
                        'required' => 'Kategori harus dipilih.',
                    ],
                ),
                array(
                    'field' => 'pengarang',
                    'label' => 'Pengarang',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'tahun_terbit',
                    'label' => 'Tahun Terbit',
                    'rules' => 'required',
                ),
                // array(
                //     'field' => 'foto',
                //     'label' => 'Foto',
                //     'rules' => 'required',
                // ),
                // array(
                //     'field' => 'file',
                //     'label' => 'File',
                //     'rules' => 'required',
                // ),
            );

            $this->form_validation->set_rules($config);

            if ($uri != null) {
                if ($this->form_validation->run() == false) {

                    $data = array(
                        'title' => 'Edit Buku',
                        'kategoris' => $kategoris,
                        'post' => $post,
                        'id' => $uri
                    );

                    return $this->template_b->view('backend/book/form', $data);
                } else {
                    $post_book = $this->book->put_data($post, $uri);
                }
            } else {
                if ($this->form_validation->run() == false) {

                    $data = array(
                        'title' => 'Tambah Buku',
                        'kategoris' => $kategoris,
                        'post' => $post
                    );

                    return $this->template_b->view('backend/book/form', $data);
                } else {
                    $post_book = $this->book->post_data($post);
                }
            }
            if ($post_book != null) {
                $this->session->set_flashdata('notifikasi', '<script>notifikasi( "Data Berhasil disimpan!", "success", "fa fa-check") </script>');
            } else {
                $this->session->set_flashdata('notifikasi', '<script>notifikasi( "Data Gagal disimpan!", "danger", "fa fa-check") </script>');
            }
            redirect('admin/buku');
        } else {
            if ($uri != null) {
                $data = array(
                    'title' => 'Edit Buku',
                    'kategoris' => $kategoris,
                    'post' => $this->book->get_id($uri),
                    'id' => $uri
                );
            } else {
                $data = array(
                    'title' => 'Tambah Buku',
                    'kategoris' => $kategoris,
                );
            }

            $this->template_b->view('backend/book/form', $data);
        }
    }

    public function kategori()
    {
        $post = $this->input->post();
        $kategori = $this->kategori->get_data();
        $uri = $this->uri->segment(3);

        if ($post) {
            $config = array(
                array(
                    'field' => 'kategori',
                    'label' => 'Kategori',
                    'rules' => 'required',
                ),
            );
            $this->form_validation->set_rules($config);

            if ($uri != null) {
                if ($this->form_validation->run() == false) {
                    $data = array(
                        'title' => 'Daftar Kategori',
                        'kategori' => $kategori,
                        'post' => $post,
                        'update' => $uri
                    );
                    return $this->template_b->view('backend/kategori/index', $data);
                } else {
                    $data = array(
                        'kategori' => $post['kategori'],
                    );
                    $post_kategori = $this->kategori->put_data($data, $uri);
                }
            } else {
                if ($this->form_validation->run() == false) {
                    $data = array(
                        'title' => 'Daftar Kategori',
                        'kategori' => $kategori,
                        'post' => $post,
                    );
                    return $this->template_b->view('backend/kategori/index', $data);
                } else {
                    $data = array(
                        'kategori' => $post['kategori'],
                    );
                    $post_kategori = $this->kategori->post_data($data);
                }
            }
            if ($post_kategori != null) {
                $this->session->set_flashdata('notifikasi', '<script>notifikasi( "Data Berhasil disimpan!", "success", "fa fa-check") </script>');
            } else {
                $this->session->set_flashdata('notifikasi', '<script>notifikasi( "Data Gagal disimpan!", "danger", "fa fa-check") </script>');
            }
            redirect('admin/kategori');
        } else {

            $data = array(
                'title' => 'Daftar Kategori',
                'kategori' => $kategori,
            );

            $this->template_b->view('backend/kategori/index', $data);
        }
    }

    public function tamu()
    {
        $tamus = $this->global->get_data('tbl_tamu');

        $data = array(
            'title' => 'Daftar Tamu',
            'tamus' => $tamus,
        );

        $this->template_b->view('backend/tamu/index', $data);
    }
    
    public function absensi()
    {
        $absensis = $this->absensi->get_data();

        $data = array(
            'title' => 'Daftar Absensi',
            'absensis' => $absensis,
        );

        $this->template_b->view('backend/absensi/index', $data);
    }

    public function siswa()
    {
        $siswas = $this->siswa->get_data();

        $data = array(
            'title' => 'Daftar Siswa',
            'siswas' => $siswas,
        );

        $this->template_b->view('backend/siswa/index', $data);
    }

    public function post_siswa()
    {
        $post = $this->input->post();
        $uri = $this->uri->segment(3);

        if ($post) {
            $config = array(
                array(
                    'field' => 'nama_siswa',
                    'label' => 'Nama Siswa',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'alamat',
                    'label' => 'Alamat',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'kelas',
                    'label' => 'Kelas',
                    'rules' => 'required',
                ),
                // array(
                //     'field' => 'foto',
                //     'label' => 'Foto',
                //     'rules' => 'required',
                // ),
                array(
                    'field' => 'tempat_lahir',
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'tanggal_lahir',
                    'label' => 'Tanggal Lahir',
                    'rules' => 'required',
                ),
            );

            if (!$uri) {
                array_push($config, array(
                    'field' => 'nis',
                    'label' => 'Nomor Induk Siswa',
                    'rules' => 'required|is_unique[tbl_siswa.nis]',
                    "errors" => [
                        'is_unique' => '%s sudah terdaftar.',
                    ],
                ),);
            }

            $this->form_validation->set_rules($config);
            if ($uri != null) {
                if ($this->form_validation->run() == false) {

                    $data = array(
                        'title' => 'Tambah Siswa',
                        'post' => $post,
                        'id' => $uri
                    );

                    return $this->template_b->view('backend/siswa/form', $data);
                } else {
                    $post_siswa = $this->siswa->put_data($post, $uri);
                }
            } else {
                if ($this->form_validation->run() == false) {

                    $data = array(
                        'title' => 'Tambah Siswa',
                        'post' => $post
                    );

                    return $this->template_b->view('backend/siswa/form', $data);
                } else {
                    $password = explode('-', $post['tanggal_lahir']);
                    $post['password'] = $this->global->makeHash($password[2] . $password[1] . $password[0]);
                    $post_siswa = $this->siswa->post_data($post);
                }
            }

            if ($post_siswa != null) {
                $this->session->set_flashdata('notifikasi', '<script>notifikasi( "Data Berhasil disimpan!", "success", "fa fa-check") </script>');
            } else {
                $this->session->set_flashdata('notifikasi', '<script>notifikasi( "Data Gagal disimpan!", "danger", "fa fa-check") </script>');
            }
            redirect('admin/siswa');
        } else {
            if ($uri != null) {
                $data = array(
                    'title' => 'Edit Siswa',
                    'post' => $this->siswa->get_id($uri),
                    'id' => $uri
                );
            } else {
                $data = array(
                    'title' => 'Tambah Siswa',
                );
            }

            $this->template_b->view('backend/siswa/form', $data);
        }
    }
}
