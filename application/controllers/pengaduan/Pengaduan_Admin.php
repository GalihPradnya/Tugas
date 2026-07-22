<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pengaduan_admin extends CI_Controller 
{


    public function __construct()
    {
        parent::__construct();


        is_logged_in();


        $this->load->model('Pengaduan_model');
        $this->load->model('Logo_profil_model');

    }






    // ==========================
    // LIST PENGADUAN
    // ==========================

    public function index()
    {

        $data['title'] = 'Pengaduan Admin';


        $data['logoDesa'] =
            $this->Logo_profil_model->getLogoDesa();



        $data['pengaduan'] =
            $this->Pengaduan_model->getAll();




        $this->load->view(
            'templates/header',
            $data
        );


        $this->load->view(
            'templates/sidebar',
            $data
        );


        $this->load->view(
            'templates/topbar',
            $data
        );


        $this->load->view(
            'pengaduan/pengaduan_admin',
            $data
        );


        $this->load->view(
            'templates/footer',
            $data
        );

    }







    // ==========================
    // DETAIL PENGADUAN
    // ==========================

    public function detail($id)
    {


        $data['title'] =
            'Detail Pengaduan';



        $data['logoDesa'] =
            $this->Logo_profil_model->getLogoDesa();




        $data['pengaduan'] =
            $this->Pengaduan_model
            ->getById($id);




        if(!$data['pengaduan'])
        {
            show_404();
        }





        $this->load->view(
            'templates/header',
            $data
        );


        $this->load->view(
            'templates/sidebar',
            $data
        );


        $this->load->view(
            'templates/topbar',
            $data
        );


        $this->load->view(
            'pengaduan/pengaduan_detail',
            $data
        );


        $this->load->view(
            'templates/footer',
            $data
        );


    }








    // ==========================
    // UPDATE STATUS
    // ==========================

    public function updateStatus()
{

    $id = $this->input->post('id');


    $data = [

        'status' => $this->input->post('status'),

        'tanggapan' => $this->input->post('tanggapan')

    ];



    // =========================
    // UPLOAD BUKTI ADMIN
    // =========================

    if(!empty($_FILES['bukti_admin']['name']))
    {


        $config['upload_path'] =
        './uploads/pengaduan_admin/';


        $config['allowed_types'] =
        'jpg|jpeg|png|pdf';


        $config['max_size'] =
        4096;


        $config['encrypt_name'] =
        TRUE;



        // buat folder otomatis

        if(!is_dir($config['upload_path']))
        {

            mkdir(
                $config['upload_path'],
                0777,
                TRUE
            );

        }



        $this->load->library(
            'upload',
            $config
        );



        if($this->upload->do_upload('bukti_admin'))
        {


            $upload =
            $this->upload->data();



            $data['bukti_admin'] =
            $upload['file_name'];


        }
        else
        {


            $this->session->set_flashdata(
                'message',

                '<div class="alert alert-danger">
                '.$this->upload->display_errors().'
                </div>'
            );


            redirect(
                'pengaduan/pengaduan_admin/detail/'.$id
            );


        }


    }





    // =========================
    // UPDATE DATABASE
    // =========================


    $this->Pengaduan_model
    ->updatePengaduan(
        $id,
        $data
    );




    $this->session->set_flashdata(
        'message',

        '<div class="alert alert-success">
            Pengaduan berhasil diperbarui.
        </div>'
    );



    redirect(
        'pengaduan/pengaduan_admin/detail/'.$id
    );

}

}