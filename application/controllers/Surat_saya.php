<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_saya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pengajuan_model');
    }

    public function index()
    {
        $data['title'] = 'Surat Saya';

        $user_id = $this->session->userdata('id');

        $data['surat'] =
            $this->Pengajuan_model->getSuratByUser($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/surat_saya', $data);
        $this->load->view('templates/footer');
    }
}