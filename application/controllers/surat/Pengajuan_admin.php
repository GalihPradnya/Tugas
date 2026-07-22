<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_logged_in();

        $this->load->model('Pengajuan_model');
        $this->load->model('Logo_profil_model');


        // Load konfigurasi email
        $this->load->config('email');


        // Load library email
        $this->load->library('email');


        // Inisialisasi email
        $this->email->initialize();

    }


    // ============================
    // DATA SEMUA PENGAJUAN
    // ============================
    public function pengajuan_admin()
    {

        $data['title'] = 'Pengajuan Surat Admin';

        $data['logoDesa'] =
            $this->Logo_profil_model->getLogoDesa();


        $data['pengajuan'] =
            $this->Pengajuan_model->getAllPengajuan();


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
            'surat/data_pengajuan',
            $data
        );

        $this->load->view(
            'templates/footer',
            $data
        );

    }



    // ============================
    // DETAIL PENGAJUAN
    // ============================
    public function detail($id)
    {

        $data['title'] =
            'Detail Pengajuan Surat';


        $data['pengajuan'] =
            $this->Pengajuan_model
            ->getDetailPengajuan($id);



        if(!$data['pengajuan'])
        {
            show_404();
        }



        $data['file'] =
            $this->Pengajuan_model
            ->getFilePengajuan($id);



        $data['logoDesa'] =
            $this->Logo_profil_model
            ->getLogoDesa();



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
            'surat/detail_pengajuan',
            $data
        );


        $this->load->view(
            'templates/footer',
            $data
        );

    }



    // ============================
    // UPDATE STATUS + UPLOAD SURAT
    // ============================
    public function updateStatus()
{

    $id =
        $this->input->post('id');


    $status =
        $this->input->post('status');


    $dataUpdate = [

        'status' => $status

    ];



    // ==========================
    // UPLOAD FILE HASIL
    // ==========================

    if(!empty($_FILES['file_hasil']['name']))
    {

        $config['upload_path'] =
            './uploads/hasil_surat/';


        $config['allowed_types'] =
            'pdf';


        $config['max_size'] =
            4096;


        $config['encrypt_name'] =
            TRUE;



        $this->load->library(
            'upload',
            $config
        );


        if($this->upload->do_upload('file_hasil'))
        {

            $upload =
                $this->upload->data();


            $dataUpdate['file_hasil'] =
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
                'surat/pengajuan_admin/detail/'.$id
            );

        }

    }



    // update database

    $this->Pengajuan_model
        ->updatePengajuan(
            $id,
            $dataUpdate
        );




    // ==========================
    // KIRIM EMAIL JIKA SELESAI
    // ==========================

    if($status == 'Selesai')
    {


        $pengajuan =
            $this->Pengajuan_model
            ->getPengajuanById($id);



        if(!empty($pengajuan['email']))
        {


            $this->email->from(
                'desakelating027@gmail.com',
                'Website Desa Kelating'
            );


            $this->email->to(
                $pengajuan['email']
            );


            $this->email->subject(
                'Surat Anda Telah Selesai'
            );



            $pesan = '

            <h3>Pengajuan Surat Selesai</h3>


            Halo 
            <b>'.$pengajuan['nama_lengkap'].'</b>,


            <br><br>


            Pengajuan surat Anda sudah selesai diproses.


            <br><br>


            <b>Jenis Surat :</b>
            '.$pengajuan['nama_surat'].'


            <br>


            <b>Status :</b>
            Selesai


            <br><br>


            Silakan login ke website desa untuk
            mengunduh surat.


            <br><br>


            Terima kasih.


            ';



            $this->email->message($pesan);



            if(!$this->email->send())
            {

                echo $this->email->print_debugger();

                exit;

            }


        }


    }



    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
        Data pengajuan berhasil diperbarui.
        </div>'
    );


    redirect(
        'surat/Pengajuan_admin/detail/'.$id
    );

}




    // ============================
    // DOWNLOAD PERSYARATAN
    // ============================
    public function download($id)
    {

        $file =
            $this->Pengajuan_model
            ->getFileById($id);



        if(!$file)
        {
            show_404();
        }



        $path =
        './uploads/persyaratan/'
        .$file['nama_file'];



        if(!file_exists($path))
        {
            show_error(
                'File tidak ditemukan'
            );
        }



        $this->load->helper(
            'download'
        );


        force_download(
            $path,
            NULL
        );

    }




    // ============================
    // DOWNLOAD SURAT HASIL
    // ============================
    public function download_hasil($id)
    {

        $data =
        $this->Pengajuan_model
        ->getPengajuanById($id);



        if(
            !$data ||
            empty($data['file_hasil'])
        )
        {
            show_404();
        }



        $path =
        './uploads/hasil_surat/'
        .$data['file_hasil'];



        $this->load->helper(
            'download'
        );


        force_download(
            $path,
            NULL
        );

    }


}