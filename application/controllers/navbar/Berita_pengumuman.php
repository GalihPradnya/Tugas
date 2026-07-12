<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_pengumuman extends CI_Controller {

    // Menampilkan halaman berita dan pengumuman
    public function index()
    {
            $this->load->view('templates/dashboard_header');
            $this->load->view('dashboard/berita_pengumuman_view');
            $this->load->view('templates/dashboard_footer');
    }
    
    // Menampilkan halaman detail berita
    public function berita_detail()
    {
        $this->load->view('templates/dashboard_header');
        $this->load->view('dashboard/berita_detail_view');
        $this->load->view('templates/dashboard_footer');
    }

    // Menampilkan halaman detail pengumuman
    public function pengumuman_detail()
    {
        $this->load->view('templates/dashboard_header');
        $this->load->view('dashboard/pengumuman_detail_view');
        $this->load->view('templates/dashboard_footer');
    }
}