<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_publik extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Logo_profil_model');
    }

    // Menampilkan halaman profil desa
    public function index()
    {
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $this->load->view('templates/dashboard_header', $data);
            $this->load->view('dashboard/layanan_view', $data);
            $this->load->view('templates/dashboard_footer', $data);
    } 
    
    public function data_kependudukan()
    {
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('layanan/data_kependudukan', $data);
        $this->load->view('templates/dashboard_footer');
    }

}