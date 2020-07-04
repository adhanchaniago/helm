<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MerkController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('Backend/MerkModel', 'backendModel');
        $this->load->library('form_validation');
        // $this->load->library('session');
        // $this->load->model('M_admin');
        // $this->load->library('pagination');
        // $this->load->model('M_count');
        // $this->load->helper('tgl_indo_helper');
    }
    public function tampilMerk()
    {
        $data['merk'] = $this->backendModel->ambilData();
        // var_dump($data);
        // exit;
        $this->template->templateBackend('backend/merk/index', $data);
    }
    public function tambahMerk()
    {
        $this->template->templateBackend('backend/merk/tambah');
    }
    public function addMerk()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->_set_rules();
        if (empty($_FILES['merk_foto']['name'])) {
            $this->form_validation->set_rules('merk_foto', 'Foto', 'required', $pesan_error);
        }
        if ($this->form_validation->run() != FALSE) {
            $data = [
                'merk_nama' => $this->input->post('merk_nama'),
                'merk_foto' => ""
            ];
            if ($_FILES['merk_foto']['size'] != 0) {
                $data['merk_foto'] = fileUpload($_FILES['merk_foto'], "img/merk/");
            }
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            $this->backendModel->tambahData($data);
            redirect('admin/merk');
            // echo "ok";
        } else {
            $this->template->templateBackend('backend/merk/tambah');
        }
    }
    public function editMerk($id)
    {
        $data['merk'] = $this->backendModel->ambilData($id);
        $this->template->templateBackend('backend/merk/edit', $data);
    }
    public function updateMerk()
    {
        $this->_set_rules();
        $id = $this->input->post('merk_id');

        if ($this->form_validation->run() != FALSE) {
            $row = $this->backendModel->ambilData($id);
            $data = [
                'merk_nama' => $this->input->post('merk_nama'),
                'merk_foto' => ""
            ];

            if ($_FILES['merk_foto']['size'] != 0) {
                unlink("img/merk/" . $row['merk_foto']);
                $data['merk_foto'] = fileUpload($_FILES['merk_foto'], "img/merk/");
            } else {
                $data['merk_foto'] = $row['merk_foto'];
            }
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            $this->backendModel->editData($id, $data);
            redirect('admin/merk');
        } else {
            $this->editMerk($id);
        }
    }
    public function hapusMerk($id)
    {
        // $id = $this->uri->segment(2);
        $row = $this->backendModel->ambilData($id);
        unlink("img/merk/" . $row['merk_foto']);
        $this->backendModel->hapusData($id);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('admin/merk');
    }


    public function _set_rules()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->form_validation->set_rules('merk_nama', 'Nama', 'trim|required', $pesan_error);
    }
}
