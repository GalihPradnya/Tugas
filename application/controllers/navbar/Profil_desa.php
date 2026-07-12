<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_desa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Memanggil model
        $this->load->model('Profil_model');
    }

    // Menampilkan halaman profil desa
    public function index()
    {
        // Mengambil data dari database
        $data['profil'] = $this->Profil_model->getProfil();
        $data['misi']   = $this->Profil_model->getMisi();

        // Mengirim data ke view
        $this->load->view('templates/dashboard_header');
        $this->load->view('dashboard/profil_view', $data);
        $this->load->view('templates/dashboard_footer');
    }

}