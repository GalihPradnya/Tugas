<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Logo_profil_model');
    }
    public function ajukan_surat()
    {
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('layanan/ajukan_surat', $data);
        $this->load->view('templates/dashboard_footer', $data);

    }
    public function upload_foto()
{
    $config['upload_path']   = './assets/img/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {

        $data = $this->upload->data();

        echo "Upload berhasil: " . $data['file_name'];

    } else {

        echo $this->upload->display_errors();

    }
}
}