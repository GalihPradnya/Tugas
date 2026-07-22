<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pengajuan_pendatang extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();


        is_logged_in();


        $this->load->model('Pengajuan_pendatang_model');

        $this->load->model('Pendatang_model');

        $this->load->model('JenisSurat_model');

        $this->load->model('Logo_profil_model');

    }





    // =====================================
    // LIST PENGAJUAN PENDATANG
    // =====================================

    public function index()
    {


        $data['title'] = 'Pengajuan Surat Pendatang';


        $data['logoDesa'] =
        $this->Logo_profil_model->getLogoDesa();



        $data['pengajuan'] =
        $this->Pengajuan_pendatang_model
        ->getAll();




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
            'pendatang/pengajuan/index',
            $data
        );


        $this->load->view(
            'templates/footer',
            $data
        );

    }







    // =====================================
    // TAMBAH FORM
    // =====================================

    public function tambah()
    {


        $data['title'] =
        'Tambah Pengajuan Surat Pendatang';



        $data['logoDesa'] =
        $this->Logo_profil_model
        ->getLogoDesa();



        // ambil pendatang aktif

        $data['pendatang'] =
        $this->Pendatang_model
        ->getAll();



        // ambil jenis surat

        $data['jenis_surat'] =
        $this->JenisSurat_model->getAll();





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
            'pendatang/pengajuan/tambah',
            $data
        );


        $this->load->view(
            'templates/footer',
            $data
        );

    }








    // =====================================
    // SIMPAN
    // =====================================

    public function simpan()
    {


        $data = [


            'pendatang_id' =>
            $this->input->post('pendatang_id'),



            'jenis_surat_id' =>
            $this->input->post('jenis_surat_id'),



            'keperluan' =>
            $this->input->post('keperluan'),



            'catatan' =>
            $this->input->post('catatan'),



            'status'=>'Menunggu'


        ];




        $simpan =
        $this->Pengajuan_pendatang_model
        ->insert($data);




        if($simpan)
        {


            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                Pengajuan surat pendatang berhasil dibuat.
                </div>'
            );


        }
        else
        {


            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                Pengajuan gagal.
                </div>'
            );


        }



        redirect(
            'pendatang/pengajuan_pendatang'
        );


    }










    // =====================================
    // DETAIL
    // =====================================

    public function detail($id)
    {


        $data['title'] =
        'Detail Pengajuan Pendatang';



        $data['logoDesa'] =
        $this->Logo_profil_model
        ->getLogoDesa();



        $data['pengajuan'] =
        $this->Pengajuan_pendatang_model
        ->getById($id);




        if(!$data['pengajuan'])
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
            'pendatang/pengajuan/detail',
            $data
        );


        $this->load->view(
            'templates/footer',
            $data
        );


    }









    // =====================================
    // UPDATE STATUS
    // =====================================

    public function updateStatus()
    {


        $id =
        $this->input->post('id');




        $data = [


            'status'=>
            $this->input->post('status'),



            'catatan'=>
            $this->input->post('catatan')

        ];






        // upload surat hasil

        if(!empty($_FILES['file_hasil']['name']))
        {


            $config['upload_path']
            ='./uploads/surat_pendatang/';



            $config['allowed_types']
            ='pdf|jpg|jpeg|png';



            $config['max_size']
            =4096;



            $config['encrypt_name']
            =TRUE;




            if(!is_dir('./uploads/surat_pendatang/'))
            {

                mkdir(
                    './uploads/surat_pendatang/',
                    0777,
                    TRUE
                );

            }




            $this->load->library(
                'upload',
                $config
            );





            if($this->upload->do_upload('file_hasil'))
            {


                $upload =
                $this->upload->data();



                $data['file_hasil']
                =
                $upload['file_name'];


            }
            else
            {


                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">'
                    .$this->upload->display_errors().
                    '</div>'
                );


                redirect(
                    'pendatang/pengajuan_pendatang/detail/'.$id
                );

            }



        }







        $this->Pengajuan_pendatang_model
        ->update(
            $id,
            $data
        );






        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
            Pengajuan berhasil diperbarui.
            </div>'
        );



        redirect(
            'pendatang/pengajuan_pendatang/detail/'.$id
        );


    }



}