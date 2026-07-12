<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    // Menampilkan halaman kontak desa
    public function index()
    {
            $this->load->view('templates/dashboard_header');
            $this->load->view('dashboard/kontak_view');
            $this->load->view('templates/dashboard_footer');
    }      
}