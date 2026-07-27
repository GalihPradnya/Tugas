<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_publik extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Validasi login
        if (!$this->session->userdata('id')) {

            // Simpan URL yang ingin diakses (opsional)
            $this->session->set_userdata('redirect_after_login', current_url());

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning">
                    Silakan login terlebih dahulu untuk mengakses layanan publik.
                </div>'
            );

            redirect('auth/login');
        }

        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('dashboard/layanan_view', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function data_kependudukan()
    {
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('layanan/data_kependudukan', $data);
        $this->load->view('templates/dashboard_footer');
    }
}