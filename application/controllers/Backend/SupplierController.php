<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SupplierController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('Backend/SupplierModel', 'backendModel');
        $this->load->library('form_validation');
        // $this->load->library('session');
        // $this->load->model('M_admin');
        // $this->load->library('pagination');
        // $this->load->model('M_count');
        // $this->load->helper('tgl_indo_helper');
    }
    public function tampilSupplier()
    {
        $data['supplier'] = $this->backendModel->ambilData();
        // var_dump($data);
        // exit;
        $this->template->templateBackend('backend/supplier/index', $data);
    }
    public function tambahSupplier()
    {
        $this->template->templateBackend('backend/supplier/tambah');
    }
    public function addSupplier()
    {
        $this->_set_rules();

        if ($this->form_validation->run() != FALSE) {
            $data = [
                'supplier_nama' => $this->input->post('supplier_nama'),
                'supplier_alamat' => $this->input->post('supplier_alamat'),
                'supplier_telp' => $this->input->post('supplier_telp'),
            ];
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            $this->backendModel->tambahData($data);
            redirect('admin/supplier');
            // echo "ok";
        } else {
            $this->template->templateBackend('backend/supplier/tambah');
        }
    }
    public function editSupplier($id)
    {
        $data['supplier'] = $this->backendModel->ambilData($id);
        $this->template->templateBackend('backend/supplier/edit', $data);
    }
    public function updateSupplier()
    {
        $this->_set_rules();
        $id = $this->input->post('supplier_id');

        if ($this->form_validation->run() != FALSE) {
            $data = [
                'supplier_nama' => $this->input->post('supplier_nama'),
                'supplier_alamat' => $this->input->post('supplier_alamat'),
                'supplier_telp' => $this->input->post('supplier_telp'),
            ];
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            $this->backendModel->editData($id, $data);
            redirect('admin/supplier');
        } else {
            $this->editSupplier($id);
        }
    }
    public function hapusSupplier($id)
    {
        // $id = $this->uri->segment(2);
        $this->backendModel->hapusData($id);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('admin/supplier');
    }


    public function _set_rules()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->form_validation->set_rules('supplier_nama', 'Nama', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('supplier_alamat', 'Alamat', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('supplier_telp', 'No Telp', 'trim|required|numeric', $pesan_error);
    }
}
