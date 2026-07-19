<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_saya extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        is_logged_in();

        $this->load->model('Pengaduan_model');
    }

    public function index()
    {
        $data['title'] = 'Pengaduan Saya';

        $user_id = $this->session->userdata('id');

        $data['pengaduan'] =
            $this->Pengaduan_model
            ->getPengaduanByUser($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengaduan/pengaduan_saya', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengaduan';

        $data['pengaduan'] =
            $this->Pengaduan_model
            ->getDetailPengaduan($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengaduan/detail_pengaduan_saya', $data);
        $this->load->view('templates/footer', $data);
    }
}