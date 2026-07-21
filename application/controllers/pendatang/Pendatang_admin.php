<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendatang_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();

        $this->load->model('Pendatang_model');
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['title'] = 'Data Pendatang';

        $data['pendatang'] =
            $this->Pendatang_model->getAll();
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('pendatang/data_pendatang',$data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pendatang';

        $data['pendatang'] =
            $this->Pendatang_model->getById($id);
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('pendatang/detail_pendatang',$data);
        $this->load->view('templates/footer');
    }

    public function updateStatus()
    {
        $id = $this->input->post('id');

        $data = [
            'status' => $this->input->post('status'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->Pendatang_model->update($id,$data);

        redirect('pendatang/pendatang_admin');
    }
}