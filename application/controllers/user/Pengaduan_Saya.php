<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_saya extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        

        $this->load->model('Pengaduan_model');
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['title'] = 'Pengaduan Saya';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $user_id = $this->session->userdata('id');

        $data['pengaduan'] =
            $this->Pengaduan_model
            ->getPengaduanByUser($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pengaduan_saya', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengaduan';

        $data['pengaduan'] =
            $this->Pengaduan_model
            ->getDetailPengaduan($id);
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail_pengaduan_saya', $data);
        $this->load->view('templates/footer', $data);
    }
}