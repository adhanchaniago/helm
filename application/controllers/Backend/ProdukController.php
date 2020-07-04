<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('Backend/ProdukModel', 'backendModel');
        $this->load->model('Backend/UkuranModel', 'UkuranModel');
        $this->load->model('Backend/MerkModel', 'MerkModel');
        $this->load->model('Backend/SupplierModel', 'SupplierModel');
        $this->load->model('Backend/WarnaModel', 'WarnaModel');
        $this->load->library('form_validation');
        // $this->load->library('session');
        // $this->load->model('M_admin');
        // $this->load->library('pagination');
        // $this->load->model('M_count');
        // $this->load->helper('tgl_indo_helper');
    }
    public function tampilProduk()
    {
        $data['produk'] = $this->backendModel->ambilDataProduk();
        // var_dump($data);
        // exit;
        $this->template->templateBackend('backend/produk/index', $data);
    }
    public function tambahProduk()
    {
        $data['ukuran'] = $this->UkuranModel->ambilData();
        $data['merk'] = $this->MerkModel->ambilData();
        $data['supplier'] = $this->SupplierModel->ambilData();
        $data['warna'] = $this->WarnaModel->ambilData();
        $this->template->templateBackend('backend/produk/tambah', $data);
    }
    public function addProduk()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->_set_rules();
        if (empty($_FILES['produk_gambar']['name'])) {
            $this->form_validation->set_rules('produk_gambar', 'Gambar', 'required', $pesan_error);
        }
        if ($this->form_validation->run() != FALSE) {
            $data = [
                'merk_id' => $this->input->post('merk_id'),
                'ukuran_id' => $this->input->post('ukuran_id'),
                'warna_id' => $this->input->post('warna_id'),
                'warna_id' => $this->input->post('warna_id'),
                'supplier_id' => $this->input->post('supplier_id'),
                'produk_nama' => $this->input->post('produk_nama'),
                'produk_harga_beli' => nilaiAsliRupiah($this->input->post('produk_harga_beli')),
                'produk_harga_jual' => nilaiAsliRupiah($this->input->post('produk_harga_jual')),
                'produk_stok' => $this->input->post('produk_stok'),
                'produk_desk' => $this->input->post('produk_desk'),
                'produk_gambar' => "",
                'produk_tgl_input' => date('Y-m-d'),
            ];
            if ($_FILES['produk_gambar']['size'] != 0) {
                $data['produk_gambar'] = fileUpload($_FILES['produk_gambar'], "img/produk/");
            }
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            $this->backendModel->tambahData($data);
            redirect('admin/produk');
            // echo "ok";
        } else {
            $data['ukuran'] = $this->UkuranModel->ambilData();
            $data['merk'] = $this->MerkModel->ambilData();
            $data['supplier'] = $this->SupplierModel->ambilData();
            $data['warna'] = $this->WarnaModel->ambilData();
            $this->template->templateBackend('backend/produk/tambah', $data);
        }
    }
    public function editProduk($id)
    {
        $data['produk'] = $this->backendModel->ambilData($id);
        $data['ukuran'] = $this->UkuranModel->ambilData();
        $data['merk'] = $this->MerkModel->ambilData();
        $data['supplier'] = $this->SupplierModel->ambilData();
        $data['warna'] = $this->WarnaModel->ambilData();
        $this->template->templateBackend('backend/produk/edit', $data);
    }
    public function updateProduk()
    {
        $this->_set_rules();
        $id = $this->input->post('produk_id');

        if ($this->form_validation->run() != FALSE) {
            $row = $this->backendModel->ambilData($id);
            $data = [
                'merk_id' => $this->input->post('merk_id'),
                'ukuran_id' => $this->input->post('ukuran_id'),
                'warna_id' => $this->input->post('warna_id'),
                'warna_id' => $this->input->post('warna_id'),
                'supplier_id' => $this->input->post('supplier_id'),
                'produk_nama' => $this->input->post('produk_nama'),
                'produk_harga_beli' => nilaiAsliRupiah($this->input->post('produk_harga_beli')),
                'produk_harga_jual' => nilaiAsliRupiah($this->input->post('produk_harga_jual')),
                'produk_stok' => $this->input->post('produk_stok'),
                'produk_desk' => $this->input->post('produk_desk'),
                'produk_gambar' => "",
            ];
            if ($_FILES['produk_gambar']['size'] != 0) {
                unlink("img/produk/" . $row['produk_gambar']);
                $data['produk_gambar'] = fileUpload($_FILES['produk_gambar'], "img/produk/");
            } else {
                $data['produk_gambar'] = $row['produk_gambar'];
            }
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            $this->backendModel->editData($id, $data);
            redirect('admin/produk');
        } else {
            $this->editProduk($id);
        }
    }
    public function hapusProduk($id)
    {
        // $id = $this->uri->segment(2);
        $row = $this->backendModel->ambilData($id);
        unlink("img/produk/" . $row['produk_gambar']);
        $this->backendModel->hapusData($id);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('admin/produk');
    }



    public function _set_rules()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->form_validation->set_rules('produk_nama', 'Nama Produk', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('merk_id', 'Merk', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('ukuran_id', 'Ukuran', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('warna_id', 'Warna', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('produk_harga_beli', 'Harga Beli', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('produk_harga_jual', 'Harga Jual', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('produk_stok', 'Stok', 'trim|required|numeric', $pesan_error);
        $this->form_validation->set_rules('produk_desk', 'Deskripsi', 'trim|required', $pesan_error);
    }
}
