
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_saya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pengajuan_model');
        $this->load->model('Logo_profil_model');
    }


    // ==========================
    // SURAT SAYA
    // ==========================

    public function index()
    {
        $data['title'] = 'Surat Saya';

        $user_id = $this->session->userdata('id');

        $data['surat'] =
            $this->Pengajuan_model->getSuratByUser($user_id);

        $data['logoDesa'] =
            $this->Logo_profil_model->getLogoDesa();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/surat_saya', $data);
        $this->load->view('templates/footer', $data);
    }


    // ==========================
    // BATALKAN PENGAJUAN
    // ==========================

    public function batalkan($id)
    {
        $user_id = $this->session->userdata('id');


        // Cek pengajuan
        $pengajuan =
            $this->Pengajuan_model
                ->getPengajuanUntukBatal(
                    $id,
                    $user_id
                );


        // Pengajuan tidak ditemukan
        // atau bukan milik user
        // atau status sudah berubah
        if (!$pengajuan) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning">
                    Pengajuan tidak dapat dibatalkan.
                    Pastikan pengajuan masih dalam status
                    Menunggu Verifikasi.
                 </div>'
            );

            redirect('user/surat_saya');

            return;
        }


        // Batalkan pengajuan
        $hapus =
            $this->Pengajuan_model
                ->batalkanPengajuan(
                    $id,
                    $user_id
                );


        if ($hapus) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                    Pengajuan surat berhasil dibatalkan.
                 </div>'
            );

        } else {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Pengajuan surat gagal dibatalkan.
                 </div>'
            );
        }


        redirect('user/surat_saya');
    }
}

