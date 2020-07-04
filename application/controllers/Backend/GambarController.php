<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GambarController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('Backend/GambarModel', 'backendModel');
        $this->load->model('Backend/ProdukModel', 'ProdukModel');
        $this->load->library('form_validation');
        // $this->load->library('session');
        // $this->load->model('M_admin');
        // $this->load->library('pagination');
        // $this->load->model('M_count');
        // $this->load->helper('tgl_indo_helper');
    }
    public function tampilGambar($id)
    {
    https://uptobox.com/1vbh5lf76q96
        $data['gambar'] = $this->backendModel->ambilDataGambar($id);
        $data['produk'] = $this->ProdukModel->ambilDataDenganKondisi(["produk_id" => $id]);

        $set_produk_id = $data['produk']['0']['produk_id'];
        $data_session = array(
            'produk_id' => $set_produk_id
        );
        $this->session->set_userdata($data_session);
        // cara penggunaan session di controller
        // echo $this->session->userdata('produk_id');
        // exit;
        $this->template->templateBackend('backend/gambar/index', $data);
    }
    public function tambahGambar()
    {
        $this->template->templateBackend('backend/gambar/tambah');
    }
    public function addGambar()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->_set_rules();
        if (empty($_FILES['gambar_produk']['name'])) {
            $this->form_validation->set_rules('gambar_produk', 'Gambar', 'required', $pesan_error);
        }
        if ($this->form_validation->run() != FALSE) {
            $data = [
                'produk_id' => $this->session->userdata('produk_id'),
                'gambar_ket' => $this->input->post('gambar_ket'),
                'gambar_produk' => ""
            ];
            if ($_FILES['gambar_produk']['size'] != 0) {
                $data['gambar_produk'] = fileUpload($_FILES['gambar_produk'], "img/produk_gambar/");
            }
            // var_dump($data);
            // exit;
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            $this->backendModel->tambahData($data);
            redirect('admin/produk/gambar/' . $this->session->userdata('produk_id'));
            // echo "ok";
        } else {
            $this->template->templateBackend('backend/gambar/tambah');
        }
    }
    public function editGambar($id)
    {
        $data['gambar'] = $this->backendModel->ambilData($id);
        $this->template->templateBackend('backend/gambar/edit', $data);
    }
    public function updateGambar()
    {
        $this->_set_rules();
        $id = $this->input->post('gambar_id');

        if ($this->form_validation->run() != FALSE) {
            $row = $this->backendModel->ambilData($id);
            $data = [
                'gambar_nama' => $this->input->post('gambar_nama'),
                'gambar_foto' => ""
            ];

            if ($_FILES['gambar_foto']['size'] != 0) {
                unlink("img/gambar/" . $row['gambar_foto']);
                $data['gambar_foto'] = fileUpload($_FILES['gambar_foto'], "img/gambar/");
            } else {
                $data['gambar_foto'] = $row['gambar_foto'];
            }
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            $this->backendModel->editData($id, $data);
            redirect('admin/produk/gambar');
        } else {
            $this->editGambar($id);
        }
    }
    public function hapusGambar($id)
    {
        // $id = $this->uri->segment(2);
        $row = $this->backendModel->ambilData($id);
        unlink("img/gambar/" . $row['gambar_foto']);
        $this->backendModel->hapusData($id);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('admin/produk/gambar');
    }


    public function _set_rules()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->form_validation->set_rules('gambar_ket', 'Keterangan', 'trim|required', $pesan_error);
    }
}
