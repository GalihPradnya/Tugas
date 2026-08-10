<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi_surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pengajuan_model');
        $this->load->model('Logo_profil_model');
    }

    // Daftar pengajuan yang menunggu verifikasi
    public function index()
    {
        $data['title'] = 'Verifikasi Pengajuan Surat';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $data['pengajuan'] = $this->Pengajuan_model
            ->getPengajuanMenungguVerifikasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kepala_wilayah/verifikasi_surat', $data);
        $this->load->view('templates/footer');
    }

    // Detail pengajuan
public function detail($id)
{
    $data['title'] = 'Detail Verifikasi Surat';
    $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

    $data['pengajuan'] = $this->Pengajuan_model->getDetailPengajuan($id);
    $data['files'] = $this->Pengajuan_model->getFilePengajuan($id);

    if (!$data['pengajuan']) {
        show_404();
    }

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('kepala_wilayah/detail_verifikasi', $data);
    $this->load->view('templates/footer');
}

    // Setujui pengajuan
    public function setujui($id)
{
    $data = [

        'status' => 'Diproses Admin',

        'verifikator_id' =>
        $this->session->userdata('id'),

        'tanggal_verifikasi' =>
        date('Y-m-d H:i:s')

    ];

    $this->Pengajuan_model
         ->updatePengajuan($id,$data);

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
        Pengajuan berhasil diverifikasi.
        </div>'
    );

    redirect('verifikasi_surat');
}

    // Tolak pengajuan
public function tolak()
{
    $id = $this->input->post('id');

    $data = [

        'status' => 'Ditolak',

        'alasan_penolakan' =>
            $this->input->post('alasan_penolakan'),

        'verifikator_id' =>
            $this->session->userdata('id'),

        'tanggal_verifikasi' =>
            date('Y-m-d H:i:s')

    ];

    $this->Pengajuan_model
         ->updatePengajuan($id, $data);

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
            Pengajuan berhasil ditolak.
        </div>'
    );

    redirect('verifikasi_surat');
}
}