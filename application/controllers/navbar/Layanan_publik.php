<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_publik extends CI_Controller {

    // Menampilkan halaman profil desa
    public function index()
    {
            $this->load->view('templates/dashboard_header');
            $this->load->view('dashboard/layanan_view');
            $this->load->view('templates/dashboard_footer');
    } 
    
    public function ajukan_surat()
    {
        $this->load->view('templates/dashboard_header');
        $this->load->view('layanan/ajukan_surat');
        $this->load->view('templates/dashboard_footer');
    }

    public function data_kependudukan()
    {
        $this->load->view('templates/dashboard_header');
        $this->load->view('layanan/data_kependudukan');
        $this->load->view('templates/dashboard_footer');
    }

    public function pengaduan_masyarakat()
    {
        $this->load->view('templates/dashboard_header');
        $this->load->view('layanan/pengaduan_masyarakat');
        $this->load->view('templates/dashboard_footer');
    }
}