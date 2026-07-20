<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Galeri_model');
    }

    public function index()
    {
        $data['galeri'] = $this->Galeri_model->getGaleri();

        $this->load->view('templates/dashboard_header');
        $this->load->view('dashboard/galeri_view', $data);
        $this->load->view('templates/dashboard_footer');
    }

}