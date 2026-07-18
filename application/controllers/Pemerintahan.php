<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemerintahan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pemerintahan_model');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }


    // ==========================
    // HALAMAN CRUD PEMERINTAHAN
    // ==========================

    public function index()
    {

        $data['title'] = "Pemerintahan Desa";


        // Kepala Desa
        $data['kepala_desa'] = 
            $this->Pemerintahan_model->getKepalaDesa();


        // Perangkat Desa
        $data['perangkat_desa'] =
            $this->Pemerintahan_model->getPerangkatDesa();


        // Lembaga Desa
        $data['lembaga_desa'] =
            $this->Pemerintahan_model->getLembaga();


        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);

        $this->load->view(
            'pemerintahan/index',
            $data
        );

        $this->load->view('templates/footer', $data);

    }




    // ==================================
    // UPDATE KEPALA DESA
    // ==================================

    public function updateKepalaDesa()
    {

        $data = [

            'nama_kepala_desa'
            =>
            $this->input->post('nama_kepala_desa')

        ];


        // upload foto

        if(!empty($_FILES['foto']['name'])){


            $config['upload_path']
            =
            './uploads/kepala_desa/';


            $config['allowed_types']
            =
            'jpg|jpeg|png';


            $config['max_size']
            =
            2048;


            $this->upload->initialize($config);



            if($this->upload->do_upload('foto')){


                $foto =
                $this->upload->data('file_name');


                $data['foto']=$foto;

            }

        }



        $this->Pemerintahan_model
        ->updateKepalaDesa($data);



        redirect('pemerintahan');

    }





    // ==================================
    // TAMBAH PERANGKAT DESA
    // ==================================

    public function tambahPerangkat()
    {


        $config['upload_path']
        =
        './uploads/perangkat_desa/';


        $config['allowed_types']
        =
        'jpg|jpeg|png';


        $config['max_size']
        =
        2048;



        $this->upload->initialize($config);



        $foto='default.jpg';



        if($this->upload->do_upload('foto')){

            $foto =
            $this->upload->data('file_name');

        }



        $data=[

            'nama'=>
            $this->input->post('nama'),


            'jabatan'=>
            $this->input->post('jabatan'),


            'foto'=>
            $foto,


            'urutan'=>
            $this->input->post('urutan')

        ];



        $this->Pemerintahan_model
        ->tambahPerangkat($data);



        redirect('pemerintahan');

    }





    // ==================================
    // UPDATE PERANGKAT DESA
    // ==================================

    public function updatePerangkat($id)
    {


        $data=[

            'nama'=>
            $this->input->post('nama'),


            'jabatan'=>
            $this->input->post('jabatan'),


            'urutan'=>
            $this->input->post('urutan')

        ];



        if(!empty($_FILES['foto']['name'])){


            $config['upload_path']
            =
            './uploads/perangkat_desa/';


            $config['allowed_types']
            =
            'jpg|jpeg|png';



            $this->upload->initialize($config);



            if($this->upload->do_upload('foto')){


                $data['foto']
                =
                $this->upload->data('file_name');

            }

        }



        $this->Pemerintahan_model
        ->updatePerangkat($id,$data);



        redirect('pemerintahan');

    }





    // ==================================
    // HAPUS PERANGKAT DESA
    // ==================================

    public function hapusPerangkat($id)
    {


        $this->Pemerintahan_model
        ->hapusPerangkat($id);



        redirect('pemerintahan');

    }






    // ==================================
    // TAMBAH LEMBAGA DESA
    // ==================================

    public function tambahLembaga()
    {


        $data=[

            'nama_lembaga'=>
            $this->input->post('nama_lembaga')

        ];



        $this->Pemerintahan_model
        ->tambahLembaga($data);



        redirect('pemerintahan');

    }







    // ==================================
    // TAMBAH ANGGOTA LEMBAGA
    // ==================================

    public function tambahAnggota()
    {


        $data=[

            'lembaga_id'=>
            $this->input->post('lembaga_id'),


            'jabatan'=>
            $this->input->post('jabatan'),


            'nama'=>
            $this->input->post('nama')

        ];



        $this->Pemerintahan_model
        ->tambahAnggota($data);



        redirect('pemerintahan');

    }





    // ==================================
    // HAPUS ANGGOTA
    // ==================================

    public function hapusAnggota($id)
    {

        $this->Pemerintahan_model
        ->hapusAnggota($id);


        redirect('pemerintahan');

    }



    // ==================================
    // HAPUS LEMBAGA
    // ==================================

    public function hapusLembaga($id)
    {

        $this->Pemerintahan_model
        ->hapusLembaga($id);


        redirect('pemerintahan');

    }


}