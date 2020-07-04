<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WarnaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('Backend/WarnaModel', 'backendModel');
        $this->load->library('form_validation');
        // $this->load->library('session');
        // $this->load->model('M_admin');
        // $this->load->library('pagination');
        // $this->load->model('M_count');
        // $this->load->helper('tgl_indo_helper');
    }
    public function tampilWarna()
    {
        $data['warna'] = $this->backendModel->ambilData();
        // var_dump($data);
        // exit;
        $this->template->templateBackend('backend/warna/index', $data);
    }
    public function tambahWarna()
    {
        $this->template->templateBackend('backend/warna/tambah');
    }
    public function addWarna()
    {
        $this->_set_rules();

        if ($this->form_validation->run() != FALSE) {
            $data = [
                'warna_nama' => $this->input->post('warna_nama'),
                'warna_kode' => $this->input->post('warna_kode'),
			];
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            $this->backendModel->tambahData($data);
            redirect('admin/warna');
            // echo "ok";
        } else {
            $this->template->templateBackend('backend/warna/tambah');
        }
    }
    public function editWarna($id)
    {
        $data['warna'] = $this->backendModel->ambilData($id);
        $this->template->templateBackend('backend/warna/edit', $data);
    }
    public function updateWarna()
    {
        $this->_set_rules();
        $id = $this->input->post('warna_id');

        if ($this->form_validation->run() != FALSE) {
            $data = [
                'warna_nama' => $this->input->post('warna_nama'),
                'warna_kode' => $this->input->post('warna_kode'),
            ];

            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            $this->backendModel->editData($id, $data);
            redirect('admin/warna');
        } else {
            $this->editWarna($id);
        }
    }
    public function hapusWarna($id)
    {
        // $id = $this->uri->segment(2);
        $this->backendModel->hapusData($id);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('admin/warna');
    }


    public function _set_rules()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->form_validation->set_rules('warna_nama', 'Warna', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('warna_kode', 'Kode Warna', 'trim|required', $pesan_error);
    }
}
