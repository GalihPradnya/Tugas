<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

public function __construct()
{
    parent::__construct();


    $this->load->model('Kategori_pengaduan_model');
    $this->load->model('Pengaduan_model');
    $this->load->model('Logo_profil_model');
}
public function index()
{
    $data['title'] = 'Pengaduan Masyarakat';


    $data['kategori'] =
    $this->Kategori_pengaduan_model->getAktif();


    $data['logoDesa'] =
    $this->Logo_profil_model->getLogoDesa();



    $penduduk_id =
    $this->session->userdata('penduduk_id');



    $data['penduduk'] =
    $this->db
        ->where('id',$penduduk_id)
        ->get('penduduk')
        ->row_array();



    $data['user'] =
    $this->db
        ->where('id',$this->session->userdata('id'))
        ->get('user')
        ->row_array();



    $this->load->view('templates/dashboard_header',$data);
    $this->load->view('pengaduan/pengaduan_masyarakat',$data);
    $this->load->view('templates/dashboard_footer',$data);
}
public function simpan()

{
    

    $user_id = $this->session->userdata('id');

    $penduduk_id = $this->session->userdata('penduduk_id');


    $file = '';

    if(!empty($_FILES['bukti']['name']))
    {

        $config['upload_path'] = './uploads/pengaduan/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;


        $this->load->library('upload',$config);


        if($this->upload->do_upload('bukti'))
        {

            $file =
            $this->upload->data('file_name');

        }

    }



    $data = [
    'user_id' => $this->session->userdata('id'),
    'penduduk_id' => $this->session->userdata('penduduk_id'),
    'kontak' => $this->input->post('kontak'),
    'kategori_id' => $this->input->post('kategori_id'),
    'judul' => $this->input->post('judul'),
    'lokasi' => $this->input->post('lokasi'),
    'isi_pengaduan' => $this->input->post('isi_pengaduan'),
    'bukti' => $file
];



    $this->Pengaduan_model->simpan($data);



    $this->session->set_flashdata(
    'message',
    '
    <div class="bg-green-50 border border-green-300 text-green-800 
                px-5 py-4 rounded-xl shadow-md mb-6 flex items-start gap-3">

        <div class="text-green-600 text-xl">
            <i class="fas fa-check-circle"></i>
        </div>

        <div>
            <h4 class="font-bold">
                Pengaduan berhasil dikirim
            </h4>

            <p class="text-sm mt-1">
                Terima kasih, laporan Anda telah diterima dan akan segera diproses oleh Pemerintah Desa Kelating.
            </p>
        </div>

    </div>
    '
);


    redirect(
        'pengaduan/pengaduan'
    );

}
}