<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_pengumuman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_pengumuman_model');
    }

    // Menampilkan halaman berita dan pengumuman
    public function index()
    {
        $data['berita'] = $this->Berita_pengumuman_model->getBerita();
        $data['pengumuman'] = $this->Berita_pengumuman_model->getPengumuman();
        $this->load->view('templates/dashboard_header');
        $this->load->view('dashboard/berita_pengumuman_view', $data);
        $this->load->view('templates/dashboard_footer');
    }
    
    // Menampilkan halaman detail berita
   public function berita_detail($id)
    {
        $data['berita'] = $this->Berita_pengumuman_model->getBeritaById($id);
        if (!$data['berita']) {
            show_404();
        }
        $this->load->view('templates/dashboard_header');
        $this->load->view('dashboard/berita_detail_view', $data);
        $this->load->view('templates/dashboard_footer');
    }

    // Menampilkan halaman detail pengumuman
    public function pengumuman_detail($id)
    {
        $data['pengumuman'] = $this->Berita_pengumuman_model->getPengumumanById($id);
        if (!$data['pengumuman']) {
            show_404();
        }
        $this->load->view('templates/dashboard_header');
        $this->load->view('dashboard/pengumuman_detail_view', $data);
        $this->load->view('templates/dashboard_footer');
    }
}