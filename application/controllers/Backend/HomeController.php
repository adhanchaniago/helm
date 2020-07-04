<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->library('template');
        // $this->load->model('aduanModel');
        // $this->load->library('session');
        // $this->load->model('M_admin');
        // $this->load->library('pagination');
        // $this->load->model('M_count');
        // $this->load->helper('tgl_indo_helper');
    }
	public function index()
	{
		$this->form_validation->set_rules('admin_email', 'Email', 'required|trim');
        $this->form_validation->set_rules('admin_password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            redirect('admin/login');
        } else {
            $email = $this->input->POST('admin_email');
			$password = $this->input->POST('admin_password');
            $user = $this->db->GET_WHERE('tb_admin', ['admin_email' => $email])->row_array();
            if ($user['admin_email'] == $email) {
                if (password_verify($password, $user['admin_password'])) {
                    $data = [
                        'admin_id' => $user['admin_id'],
                        'admin_nama' => $user['admin_nama'],
                        'admin_email' => $user['admin_email'],
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('pesan', 'Selamat Datang ' . $data['admin_nama']);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('error', 'Username dan Password Salah');
                    redirect('admin/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Salah');
                redirect('admin/login');
            }
        }
	}
	public function logout()
    {
        $this->session->unset_userdata(array('admin_id', 'admin_nama', 'admin_email'));
        $this->session->set_flashdata('pesan', 'Anda Telah Logout.');
        // $this->load->view('login/login');
        redirect('masuk');
    }
    public function home()
    {
        if (!empty($this->session->userdata('member_email'))) {
            $this->template->utama('home');
        } else {
            redirect('admin/login');
        }
    }
    public function login()
    {
        if (!empty($this->session->userdata('member_email'))) {
            $this->session->set_flashdata('local', 'Anda Belum Logout.');
            redirect('home', 'refresh');
        } else {
            $this->load->view('backend/login/login');
        }
	}
	public function registrasi()
    {
        $this->load->view('backend/login/registrasi');
	}
	public function aksiregistrasi()
    {
        $this->_set_rules();
        if ($this->form_validation->run() != FALSE) {
            $data = [
                'admin_nama' => $this->input->post('admin_nama'),
                'admin_email' => $this->input->post('admin_email'),
                'admin_notelp' => $this->input->post('admin_notelp'),
                'admin_alamat' => $this->input->post('admin_alamat'),
                'admin_password' => $this->input->post('admin_password'),
                'kategori_foto' => "karyawan"
            ];
            $this->session->set_flashdata('pesan', 'Daftar Berhasil');
            $this->backendModel->tambahData($data);
            redirect('admin/login');
            // echo "ok";
        } else {
            $this->load->view('backend/login/registrasi');
        }
	}
	public function _set_rules()
    {
        $pesan_error = [
            'required' => '<span style="color:red;">Data Wajib di Isi</span>',
            'numeric' => '<span style="color:red;">Data Wajib di Isi dengan Angka</span>',
            'email' => '<span style="color:red;">Data Wajib dengan Format Email</span>',
        ];
        $this->form_validation->set_rules('admin_nama', 'Nama', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('admin_email', 'Email', 'trim|required|email', $pesan_error);
        $this->form_validation->set_rules('admin_notelp', 'No Telpon', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('admin_alamat', 'Alamat', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('admin_password', 'Password', 'trim|required', $pesan_error);
        $this->form_validation->set_rules('admin_level', 'Level', 'trim|required', $pesan_error);
    }

}
