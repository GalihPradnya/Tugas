<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pendatang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        // cek login dan hak akses
        is_logged_in();


        $this->load->model('Pendatang_model');
        $this->load->model('Logo_profil_model');
        $this->load->library('form_validation');

    }





    // ==========================
    // DATA PENDATANG
    // ==========================
    public function index()
    {

        $data['title'] = 'Data Penduduk Pendatang';


        $data['logoDesa'] =
        $this->Logo_profil_model
        ->getLogoDesa();



        $data['pendatang'] =
        $this->Pendatang_model
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
            'pendatang/index',
            $data
        );


        $this->load->view(
            'templates/footer',
            $data
        );

    }








    // ==========================
    // TAMBAH DATA PENDATANG
    // ==========================
    public function tambah()
    {


        $data['title'] =
        'Tambah Pendatang';



        $data['logoDesa'] =
        $this->Logo_profil_model
        ->getLogoDesa();




        $this->form_validation->set_rules(
            'nama_lengkap',
            'Nama Lengkap',
            'required|trim',
            [
                'required'=>'Nama wajib diisi'
            ]
        );


        $this->form_validation->set_rules(
            'nomor_hp',
            'Nomor HP',
            'required|trim',
            [
                'required'=>'Nomor HP wajib diisi'
            ]
        );





        if($this->form_validation->run()==false)
        {


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
                'pendatang/tambah',
                $data
            );


            $this->load->view(
                'templates/footer',
                $data
            );


        }
        else
        {



            $data = [


                'nik'=>
                $this->input->post('nik'),


                'nama_lengkap'=>
                $this->input->post('nama_lengkap'),


                'tempat_lahir'=>
                $this->input->post('tempat_lahir'),


                'tanggal_lahir'=>
                $this->input->post('tanggal_lahir'),


                'jenis_kelamin'=>
                $this->input->post('jenis_kelamin'),


                'alamat_asal'=>
                $this->input->post('alamat_asal'),


                'alamat_tinggal'=>
                $this->input->post('alamat_tinggal'),


                'nomor_hp'=>
                $this->input->post('nomor_hp'),


                'pekerjaan'=>
                $this->input->post('pekerjaan'),


                'asal_daerah'=>
                $this->input->post('asal_daerah'),


                'status'=>'Aktif'

            ];





            $this->Pendatang_model
            ->insert($data);





            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                    Data pendatang berhasil ditambahkan.
                </div>'
            );



            redirect(
                'pendatang/pendatang'
            );


        }


    }









    // ==========================
    // EDIT DATA PENDATANG
    // ==========================
    public function edit($id)
    {

        $data['title'] =
        'Edit Pendatang';



        $data['logoDesa'] =
        $this->Logo_profil_model
        ->getLogoDesa();



        $data['pendatang'] =
        $this->Pendatang_model
        ->getById($id);




        if(!$data['pendatang'])
        {
            show_404();
        }






        $this->form_validation->set_rules(
            'nama_lengkap',
            'Nama Lengkap',
            'required|trim'
        );




        if($this->form_validation->run()==false)
        {


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
                'pendatang/edit',
                $data
            );


            $this->load->view(
                'templates/footer',
                $data
            );

        }
        else
        {


            $update=[


                'nik'=>
                $this->input->post('nik'),


                'nama_lengkap'=>
                $this->input->post('nama_lengkap'),


                'tempat_lahir'=>
                $this->input->post('tempat_lahir'),


                'tanggal_lahir'=>
                $this->input->post('tanggal_lahir'),


                'jenis_kelamin'=>
                $this->input->post('jenis_kelamin'),


                'alamat_asal'=>
                $this->input->post('alamat_asal'),


                'alamat_tinggal'=>
                $this->input->post('alamat_tinggal'),


                'nomor_hp'=>
                $this->input->post('nomor_hp'),


                'pekerjaan'=>
                $this->input->post('pekerjaan'),


                'asal_daerah'=>
                $this->input->post('asal_daerah')

            ];





            $this->Pendatang_model
            ->update(
                $id,
                $update
            );





            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                Data pendatang berhasil diperbarui.
                </div>'
            );



            redirect(
                'pendatang'
            );

        }


    }








    // ==========================
    // HAPUS DATA PENDATANG
    // ==========================
    public function hapus($id)
    {


        $this->Pendatang_model
        ->delete($id);



        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
            Data pendatang berhasil dihapus.
            </div>'
        );


        redirect(
            'pendatang/pendatang'
        );


    }

}