<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_saya extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

      

        $this->load->model('Pengaduan_model');
        $this->load->model('Logo_profil_model');
    }


    public function index()
    {
        $data['title'] = 'Pengaduan Saya';

        $data['logoDesa'] =
            $this->Logo_profil_model->getLogoDesa();


        $user_id =
            $this->session->userdata('id');


        $data['pengaduan'] =
            $this->Pengaduan_model
            ->getPengaduanByUser($user_id);



        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/pengaduan_saya',$data);
        $this->load->view('templates/footer',$data);
    }





    public function detail($id)
    {

        $data['title'] = 'Detail Pengaduan';


        $user_id =
            $this->session->userdata('id');



        // ambil hanya pengaduan milik user login
        $data['pengaduan'] =
            $this->Pengaduan_model
            ->getDetailPengaduanUser(
                $id,
                $user_id
            );



        if(!$data['pengaduan'])
        {
            show_404();
        }



        $data['logoDesa'] =
            $this->Logo_profil_model
            ->getLogoDesa();



        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/detail_pengaduan_saya',$data);
        $this->load->view('templates/footer',$data);

    }

}