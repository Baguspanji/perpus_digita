<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Book_M', 'book');
        $this->load->model('Siswa_M', 'siswa');
        $this->load->model('Absensi_M', 'absensi');
        $this->load->model('Kategori_M', 'kategori');
    }


    public function index()
    {
        $data = array(
            'title' => 'Selamat Datang',
        );

        $this->template_f->view('frontend/home/index', $data);
    }

    public function buku()
    {
        $kategoris = $this->kategori->get_data();
        $kategori = 0;

        $get = $this->input->get();
        if ($get) {
            if ($get['kategori'] != 0) {
                $kategori = $get['kategori'];
            }
        }

        $data = array(
            'title' => 'Daftar Buku',
            'kategoris' => $kategoris,
            'kategori' => $kategori
        );

        $this->template_f->view('frontend/home/buku', $data);
    }

    public function get_buku()
    {

        $get = $this->input->get();
        if ($get) {
            if ($get['kategori'] != 0) {
                $books = $this->book->get_kategori($get['kategori'], true);
            } else {
                $books = $this->book->get_data(true);
            }
        } else {
            $books = $this->book->get_data(true);
        }

        $data = array('data' => $books);
        echo json_encode($data);
    }

    function buku_tamu()
    {
        if (empty($_POST)) {
            $this->load->view('errors/html/error_403');
        } else {
            $data = array(
                'id_pengunjung'     => 'VIS_' . rand(),
                'nama_pengunjung'    => htmlspecialchars($_POST['FirstName']) . ' ' . htmlspecialchars($_POST['LastName']),
                'alamat'            => htmlspecialchars($_POST['alamat']),
                'waktu'                => date("Y-m-d H.i.s"),
                'tujuan'            => implode(', ', $_POST['tujuan']),
                'jk'                => htmlspecialchars($_POST['selectKelamin']),
                'alamat_ip'            => htmlspecialchars($_POST['alamat_ip']),
            );
            $get = $this->db->insert('tbl_tamu', $data);
            if ($get === false) {
                echo 0;
            } else {
                echo 1;
            }
        }
    }

    function list_buku_tamu()
    {
        $this->db->select('nama_pengunjung, waktu, tujuan');
        $data = $this->db->get('tbl_tamu');
        if ($data->num_rows() > 1) {
            foreach ($data->result() as $data) {
                $nenen = array(
                    'wifi'         => 'Mengakses Internet',
                    'baca'         => 'Baca Buku',
                    'pertemuan' => 'Pertemuan Santai',
                    'koran'        => 'Baca Koran',
                    'lainnya'    => 'Lainnya',
                );

                $array[] = [
                    $data->nama_pengunjung,
                    date('l, j F Y h.i.s', strtotime($data->waktu)),
                    "<span class=\"badge badge-primary\">" . $nenen[$data->tujuan] . "</span>",
                ];
            }

            $result = array(
                'data' => $array,
            );
            echo json_encode($result);
        } else {
            $result = array(
                'data' => [],
            );
            echo json_encode($result);
        }
    }

    public function buku_siswa()
    {
        $post = $_POST;

        $siswa = $this->siswa->get_where(['nis' => $post['nis'], 'status' => 1])->row_array();

        if ($siswa == null) {
            $res = [
                'status' => 'error',
                'message' => 'Nis/Siswa tidak di temukan / Siswa tidak aktif'
            ];
        } else {
            $data = array(
                'nis' => $post['nis'],
                'keperluan' => $post['tujuan'],
            );

            if ($this->absensi->post_data($data)) {
                $res = [
                    'status' => 'success',
                    'message' => 'Berhasil masuk'
                ];
            } else {
                $res = [
                    'status' => 'error',
                    'message' => 'Gagal menyimpan data'
                ];
            }
        }
        echo json_encode($res);
    }
}
