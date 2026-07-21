<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Logo_profil_model');
        $this->load->model('Kontak_model');

    }  

    // Menampilkan halaman kontak desa
    public function index()
    {
        $data['kontak'] = $this->Kontak_model->getKontak();
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('dashboard/kontak_view', $data);
        $this->load->view('templates/dashboard_footer',$data);
    }      
}