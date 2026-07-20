<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_pengumuman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_pengumuman_model');
        $this->load->model('Logo_profil_model');
        $this->load->library('pagination');
        
    }

    // Menampilkan halaman berita dan pengumuman
    public function index()
    {
        $config['base_url'] = base_url('navbar/berita_pengumuman/index');

        // hanya berita publish
        $config['total_rows'] = $this->Berita_pengumuman_model->countBeritaPublish();

        $config['per_page'] = 6;
        $config['uri_segment'] = 4;

        // Konfigurasi tampilan pagination
        $config['full_tag_open'] = '<div class="flex justify-center mt-8"><nav class="inline-flex rounded-md shadow-sm">';
        $config['full_tag_close'] = '</nav></div>';

        $config['first_link'] = false;
        $config['last_link'] = false;

        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';

        $config['cur_tag_open'] = '<span class="px-3 py-2 border border-green-700 bg-green-700 text-white">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $data['current_page'] = $this->uri->segment(4) ? floor($this->uri->segment(4) / $config['per_page']) + 1 : 1;

        $data['total_page'] = ceil($config['total_rows'] / $config['per_page']);

        $data['per_page'] = $config['per_page'];

        $start = $this->uri->segment(4);
        if (!$start) {
            $start = 0;
        }

        $data['berita'] = $this->Berita_pengumuman_model
            ->getBeritaPagination($config['per_page'], $start);

        $data['pengumuman'] = $this->Berita_pengumuman_model->getPengumuman();
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $data['links'] = $this->pagination->create_links();

        



        $this->load->view('templates/dashboard_header', $data);
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
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $this->load->view('templates/dashboard_header', $data);
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
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('dashboard/pengumuman_detail_view', $data);
        $this->load->view('templates/dashboard_footer');
    }
}