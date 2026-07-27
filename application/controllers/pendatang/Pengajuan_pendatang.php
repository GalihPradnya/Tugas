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
        
        $this->load->config('email');

        $this->load->library('email');

        $this->email->initialize($this->config->config);



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
        'Pengajuan Surat Pendatang';



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

    $id = $this->input->post('id');


    $status = $this->input->post('status');


    $data = [

        'status' => $status,

        'catatan' => $this->input->post('catatan')

    ];





    // =====================================
    // UPLOAD SURAT HASIL
    // =====================================

    if(!empty($_FILES['file_hasil']['name']))
    {


        $config['upload_path']
        = './uploads/surat_pendatang/';



        $config['allowed_types']
        = 'pdf|jpg|jpeg|png';



        $config['max_size']
        = 4096;



        $config['encrypt_name']
        = TRUE;




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







    // =====================================
    // UPDATE DATA
    // =====================================

    $update =
    $this->Pengajuan_pendatang_model
    ->update(
        $id,
        $data
    );







    // =====================================
    // JIKA STATUS SELESAI
    // KIRIM EMAIL
    // =====================================

    if($update && $status == 'Selesai')
    {


        $pengajuan =
        $this->Pengajuan_pendatang_model
        ->getById($id);



        // kirim email
        $this->kirimEmailSelesai(
            $pengajuan
        );


    }








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

// =====================================
// AJAX AMBIL PERSYARATAN
// =====================================

public function getPersyaratan($id)
{

    $data =
    $this->JenisSurat_model
    ->getPersyaratan($id);


    echo json_encode($data);

}
// =====================================
// KIRIM EMAIL SURAT SELESAI
// =====================================

private function kirimEmailSelesai($data)
{

    // cek email pendatang
    if(empty($data['email']))
    {
        return false;
    }
     $this->email->clear();


    $this->email->from(
        $this->config->item('smtp_user'),
        'Desa Kelating'
    );


    $this->email->to(
        $data['email']
    );


    $this->email->subject(
        'Surat Pengajuan Pendatang Selesai'
    );



    $pesan = "

<h2>Pengajuan Surat Pendatang</h2>

<p>Yth. <b>{$data['nama_lengkap']}</b>,</p>

<p>
Pengajuan <b>{$data['nama_surat']}</b> telah selesai diproses.
</p>

<p>
Silakan mengambil surat di Kantor Desa Kelating.
</p>

<p>
Apabila terdapat lampiran PDF pada email ini,
Anda juga dapat mengunduh surat tersebut.
</p>

<hr>

<p>Terima kasih.</p>

";



    $this->email->message(
        $pesan
    );
    if(!empty($data['file_hasil']))
{
    $path = FCPATH.'uploads/surat_pendatang/'.$data['file_hasil'];

    if(file_exists($path))
    {
        $this->email->attach($path);
    }
}



   if($this->email->send())
{
    log_message('info','Email pendatang berhasil dikirim.');
    return true;
}
else
{
    log_message('error',$this->email->print_debugger());

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-warning">
        Status berhasil diperbarui tetapi email gagal dikirim.
        </div>'
    );
    return false;
}

}

}