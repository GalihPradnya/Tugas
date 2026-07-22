<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pengajuan_model');
        $this->load->model('Logo_profil_model');
    }


    // Halaman Form Pengajuan
    public function index()
    {

        $data['title'] = 'Pengajuan Surat';

        $data['logoDesa'] =
            $this->Logo_profil_model->getLogoDesa();


        // Ambil jenis surat
        $data['jenis_surat'] =
            $this->Pengajuan_model->getJenisSurat();



        // Ambil data penduduk yang sedang login

        $penduduk_id =
            $this->session->userdata('penduduk_id');


        $data['penduduk'] =
            $this->db
                ->get_where(
                    'penduduk',
                    [
                        'id'=>$penduduk_id
                    ]
                )
                ->row_array();



        $this->load->view(
            'templates/dashboard_header',
            $data
        );


        $this->load->view(
            'surat/pengajuan',
            $data
        );


        $this->load->view(
            'templates/dashboard_footer',
            $data
        );

    }



    // AJAX ambil persyaratan surat
    public function getPersyaratan($id)
    {

        $data =
            $this->Pengajuan_model
            ->getPersyaratanBySurat($id);


        echo json_encode($data);

    }



    // Simpan pengajuan surat
    public function simpan()
    {


        $penduduk_id =
            $this->session->userdata('penduduk_id');



        // Data pengajuan

        $data = [

            'user_id' =>
                $this->session->userdata('id'),


            'penduduk_id' =>
                $penduduk_id,


            'hp' =>
                $this->input->post('hp'),


            'jenis_surat_id' =>
                $this->input->post('jenis_surat_id'),


            'keperluan' =>
                $this->input->post('keperluan'),


            'catatan' =>
                $this->input->post('catatan')

        ];



        // simpan pengajuan

        $pengajuan_id =
            $this->Pengajuan_model
            ->simpan($data);



        if($pengajuan_id)
        {


            // konfigurasi upload

            $config['upload_path']
                = './uploads/persyaratan/';


            $config['allowed_types']
                = 'jpg|jpeg|png|pdf';


            $config['max_size']
                = 2048;



            $this->load->library('upload');



            foreach($_FILES as $key=>$file)
            {


                if(!empty($file['name']))
                {


                    $config['file_name']
                    =
                    time().'_'.$file['name'];



                    $this->upload->initialize($config);



                    if($this->upload->do_upload($key))
                    {


                        $uploadData =
                            $this->upload->data();



                        $persyaratan_id =
                            str_replace(
                                'persyaratan_',
                                '',
                                $key
                            );



                        $this->Pengajuan_model
                        ->simpanFile([


                            'pengajuan_id'
                            =>
                            $pengajuan_id,


                            'persyaratan_id'
                            =>
                            $persyaratan_id,


                            'nama_file'
                            =>
                            $uploadData['file_name']


                        ]);

                    }

                }

            }



            $this->session->set_flashdata(
                'success',
                'Pengajuan surat berhasil dikirim'
            );


        }
        else
        {


            $this->session->set_flashdata(
                'error',
                'Pengajuan surat gagal'
            );


        }



        redirect(
            'surat/pengajuan'
        );


    }




    // Upload foto jika diperlukan
    public function upload_foto()
    {

        $config['upload_path']
            ='./assets/img/';


        $config['allowed_types']
            ='jpg|jpeg|png';


        $config['max_size']
            =2048;



        $this->load->library(
            'upload',
            $config
        );



        if($this->upload->do_upload('foto'))
        {


            $data =
            $this->upload->data();


            echo "Upload berhasil : "
            .$data['file_name'];


        }
        else
        {


            echo $this->upload->display_errors();


        }

    }


}