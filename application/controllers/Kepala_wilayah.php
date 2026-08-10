<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_wilayah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Kepala Wilayah';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kepala_wilayah/index');
        $this->load->view('templates/footer');
    }
}