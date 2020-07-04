<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('Backend/KategoriModel', 'backendModel');
        $this->load->library('form_validation');
        // $this->load->library('session');
        // $this->load->model('M_admin');
        // $this->load->library('pagination');
        // $this->load->model('M_count');
        // $this->load->helper('tgl_indo_helper');
    }
    public function tampilKategori()
    {
        $data['kategori'] = $this->backendModel->ambilData();
        // var_dump($data);
        // exit;
        $this->template->templateBackend('backend/kategori/index', $data);
    }
    public function tambahKategori()
    {
        $this->template->templateBackend('backend/kategori/tambah');
    }
    public function addKategori()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->_set_rules();
        if (empty($_FILES['kategori_foto']['name'])) {
            $this->form_validation->set_rules('kategori_foto', 'Foto', 'required', $pesan_error);
        }
        if ($this->form_validation->run() != FALSE) {
            $data = [
                'kategori_nama' => $this->input->post('kategori_nama'),
                'kategori_foto' => ""
            ];
            if ($_FILES['kategori_foto']['size'] != 0) {
                $data['kategori_foto'] = fileUpload($_FILES['kategori_foto'], "img/kategori/");
            }
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            $this->backendModel->tambahData($data);
            redirect('admin/kategori');
            // echo "ok";
        } else {
            $this->template->templateBackend('backend/kategori/tambah');
        }
    }
    public function editKategori($id)
    {
        $data['kategori'] = $this->backendModel->ambilData($id);
        $this->template->templateBackend('backend/kategori/edit', $data);
    }
    public function updateKategori()
    {
        $this->_set_rules();
        $id = $this->input->post('kategori_id');

        if ($this->form_validation->run() != FALSE) {
            $row = $this->backendModel->ambilData($id);
            $data = [
                'kategori_nama' => $this->input->post('kategori_nama'),
                'kategori_foto' => ""
            ];

            if ($_FILES['kategori_foto']['size'] != 0) {
                unlink("img/kategori/" . $row['kategori_foto']);
                $data['kategori_foto'] = fileUpload($_FILES['kategori_foto'], "img/kategori/");
            } else {
                $data['kategori_foto'] = $row['kategori_foto'];
            }
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            $this->backendModel->editData($id, $data);
            redirect('admin/kategori');
        } else {
            $this->editKategori($id);
        }
    }
    public function hapusKategori($id)
    {
        // $id = $this->uri->segment(2);
        $row = $this->backendModel->ambilData($id);
        unlink("img/kategori/" . $row['kategori_foto']);
        $this->backendModel->hapusData($id);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('admin/kategori');
    }


    public function _set_rules()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->form_validation->set_rules('kategori_nama', 'Nama', 'trim|required', $pesan_error);
    }
}
