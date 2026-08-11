
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_saya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Pastikan user sudah login
        is_logged_in();

        $this->load->model('Pengajuan_model');
        $this->load->model('Logo_profil_model');
    }


    // =========================================================
    // SURAT SAYA
    // =========================================================
    public function index()
    {
        $data['title'] = 'Surat Saya';

        $user_id = $this->session->userdata('id');

        $data['surat'] =
            $this->Pengajuan_model->getSuratByUser($user_id);

        $data['logoDesa'] =
            $this->Logo_profil_model->getLogoDesa();


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
            'user/surat_saya',
            $data
        );

        $this->load->view(
            'templates/footer',
            $data
        );
    }


    // =========================================================
    // BATALKAN PENGAJUAN
    // =========================================================
// =========================================================
// BATALKAN PENGAJUAN
// =========================================================
public function batalkan($id)
{
    $user_id = $this->session->userdata('id');


    // =====================================================
    // CEK PENGAJUAN MILIK USER
    // =====================================================

    $pengajuan = $this->Pengajuan_model->getById($id);


    if (!$pengajuan) {

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger">
                Pengajuan tidak ditemukan.
            </div>'
        );

        redirect('user/surat_saya');
        return;
    }


    // =====================================================
    // PASTIKAN MILIK USER YANG LOGIN
    // =====================================================

    if ($pengajuan['user_id'] != $user_id) {

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger">
                Anda tidak memiliki akses untuk membatalkan
                pengajuan ini.
            </div>'
        );

        redirect('user/surat_saya');
        return;
    }


    // =====================================================
    // HANYA BOLEH BATAL SEBELUM VERIFIKASI KAWIL
    // =====================================================

    if ($pengajuan['status'] != 'Menunggu Verifikasi') {

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-warning">
                Pengajuan tidak dapat dibatalkan karena
                sudah diverifikasi oleh Kepala Wilayah.
            </div>'
        );

        redirect('user/surat_saya');
        return;
    }


    // =====================================================
    // BATALKAN
    // =====================================================

    $berhasil = $this->Pengajuan_model
        ->batalkanPengajuan(
            $id,
            $user_id
        );


    if ($berhasil) {

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
