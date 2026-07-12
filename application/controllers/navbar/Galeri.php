<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

    // Menampilkan halaman galeri desa
    public function index()
    {
            $this->load->view('templates/dashboard_header');
            $this->load->view('dashboard/galeri_view');
            $this->load->view('templates/dashboard_footer');
    }      
}