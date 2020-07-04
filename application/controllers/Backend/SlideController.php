<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SlideController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('Backend/SlideModel', 'backendModel');
        $this->load->library('form_validation');
        // $this->load->library('session');
        // $this->load->model('M_admin');
        // $this->load->library('pagination');
        // $this->load->model('M_count');
        // $this->load->helper('tgl_indo_helper');
    }
    public function tampilSlide()
    {
        $data['slide'] = $this->backendModel->ambilData();
        // var_dump($data);
        // exit;
        $this->template->templateBackend('backend/slide/index', $data);
    }
    public function tambahSlide()
    {
        $this->template->templateBackend('backend/slide/tambah');
    }
    public function addSlide()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->_set_rules();
        if (empty($_FILES['slide_foto']['name'])) {
            $this->form_validation->set_rules('slide_foto', 'Foto', 'required', $pesan_error);
        }
        if ($this->form_validation->run() != FALSE) {
            $data = [
                'slide_judul' => $this->input->post('slide_judul'),
                'slide_desk' => $this->input->post('slide_desk'),
                'slide_foto' => ""
            ];
            if ($_FILES['slide_foto']['size'] != 0) {
                $data['slide_foto'] = fileUpload($_FILES['slide_foto'], "img/slide/");

                if (!$data['slide_foto']) {
                    echo "<script>
                    alert('Gambar Tidak Valid');
                    </script>";
                }
            }
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            $this->backendModel->tambahData($data);
            redirect('admin/slide');
            // echo "ok";
        } else {
            $this->template->templateBackend('backend/slide/tambah');
        }
    }
    public function editSlide($id)
    {
        $data['slide'] = $this->backendModel->ambilData($id);
        $this->template->templateBackend('backend/slide/edit', $data);
    }
    public function updateSlide()
    {
        $this->_set_rules();
        $id = $this->input->post('slide_id');

        if ($this->form_validation->run() != FALSE) {
            $row = $this->backendModel->ambilData($id);
            $data = [
                'slide_judul' => $this->input->post('slide_judul'),
                'slide_desk' => $this->input->post('slide_desk'),
                'slide_foto' => ""
            ];

            if ($_FILES['slide_foto']['size'] != 0) {
                unlink("img/slide/" . $row['slide_foto']);
                $data['slide_foto'] = fileUpload($_FILES['slide_foto'], "img/slide/");
            } else {
                $data['slide_foto'] = $row['slide_foto'];
            }
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            $this->backendModel->editData($id, $data);
            redirect('admin/slide');
        } else {
            $this->editSlide($id);
        }
    }
    public function hapusSlide($id)
    {
        // $id = $this->uri->segment(2);
        $row = $this->backendModel->ambilData($id);
        unlink("img/slide/" . $row['slide_foto']);
        $this->backendModel->hapusData($id);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('admin/slide');
    }


    public function _set_rules()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
        ];
        $this->form_validation->set_rules('slide_judul', 'Judul', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('slide_desk', 'Deskripsi', 'trim|required', $pesan_error);
    }
}
