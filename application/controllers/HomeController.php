<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
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
		$this->template->templateFrontend('frontend/home');
        // $this->load->view('welcome_message');
    }
}
