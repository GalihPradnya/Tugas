<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemerintahan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Load model
        $this->load->model('Pemerintahan_model');
    }

    // Menampilkan halaman Pemerintahan Desa
    public function index()
    {

         $data['menu'] = 'pemerintahan';
        // Data Kepala Desa
        $data['kepala_desa'] = $this->Pemerintahan_model->getKepalaDesa();

        // Data Perangkat Desa
        $data['perangkat_desa'] = $this->Pemerintahan_model->getPerangkatDesa();

        // Data Lembaga Desa
        $data['lembaga_desa'] = $this->Pemerintahan_model->getLembagaDesa();

        // Menampilkan view
        $this->load->view('templates/dashboard_header');
        $this->load->view('dashboard/pemerintahan_view', $data);
        $this->load->view('templates/dashboard_footer');
    }

}