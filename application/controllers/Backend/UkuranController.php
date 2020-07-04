<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UkuranController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('Backend/UkuranModel', 'backendModel');
        $this->load->library('form_validation');
        // $this->load->library('session');
        // $this->load->model('M_admin');
        // $this->load->library('pagination');
        // $this->load->model('M_count');
        // $this->load->helper('tgl_indo_helper');
    }
    public function tampilUkuran()
    {
        $data['ukuran'] = $this->backendModel->ambilData();
        // var_dump($data);
        // exit;
        $this->template->templateBackend('backend/ukuran/index', $data);
    }
    public function tambahUkuran()
    {
        $this->template->templateBackend('backend/ukuran/tambah');
    }
    public function addUkuran()
    {
        $this->_set_rules();

        if ($this->form_validation->run() != FALSE) {
            $data = [
                'ukuran_nama' => $this->input->post('ukuran_nama'),
            ];
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            $this->backendModel->tambahData($data);
            redirect('admin/ukuran');
            // echo "ok";
        } else {
            $this->template->templateBackend('backend/ukuran/tambah');
        }
    }
    public function editUkuran($id)
    {
        $data['ukuran'] = $this->backendModel->ambilData($id);
        $this->template->templateBackend('backend/ukuran/edit', $data);
    }
    public function updateUkuran()
    {
        $this->_set_rules();
        $id = $this->input->post('ukuran_id');

        if ($this->form_validation->run() != FALSE) {
            $data = [
                'ukuran_nama' => $this->input->post('ukuran_nama'),
            ];

            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            $this->backendModel->editData($id, $data);
            redirect('admin/ukuran');
        } else {
            $this->editUkuran($id);
        }
    }
    public function hapusUkuran($id)
    {
        // $id = $this->uri->segment(2);
        $this->backendModel->hapusData($id);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('admin/ukuran');
    }


    public function _set_rules()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->form_validation->set_rules('ukuran_nama', 'Ukuran', 'trim|required', $pesan_error);
    }
}
