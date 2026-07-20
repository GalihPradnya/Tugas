<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendatang_saya extends CI_Controller
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
        $data['title'] = 'Pendatang Saya';

        $user_id = $this->session->userdata('id');

        $data['pendatang'] =
            $this->Pendatang_model->getByUser($user_id);

        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/pendatang_saya',$data);
        $this->load->view('templates/footer', $data);
    }

public function detail($id)
{
    $data['pendatang'] =
        $this->Pendatang_model->getById($id);

    if(
        $data['pendatang']['user_id']
        != $this->session->userdata('id')
    ){
        redirect('auth/blocked');
    }

    $data['title'] = 'Detail Pendatang';
    $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('user/detail_pendatang_saya',$data);
    $this->load->view('templates/footer', $data);
}
}