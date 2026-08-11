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


    // =========================================================
    // DAFTAR PENGAJUAN MENUNGGU VERIFIKASI
    // =========================================================
    public function index()
    {
        $data['title'] = 'Verifikasi Pengajuan Surat';

        $data['logoDesa'] =
            $this->Logo_profil_model->getLogoDesa();

        $data['pengajuan'] =
            $this->Pengajuan_model
            ->getPengajuanMenungguVerifikasi();


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
            'kepala_wilayah/verifikasi_surat',
            $data
        );

        $this->load->view(
            'templates/footer',
            $data
        );
    }


    // =========================================================
    // DETAIL PENGAJUAN
    // =========================================================
    public function detail($id)
    {
        $data['title'] =
            'Detail Verifikasi Surat';


        // -----------------------------------------------------
        // DATA UTAMA PEMOHON + PENGAJUAN
        // -----------------------------------------------------

        $data['pengajuan'] =
            $this->Pengajuan_model
            ->getDetailPengajuan($id);


        if (!$data['pengajuan']) {
            show_404();
        }


        // -----------------------------------------------------
        // FIELD YANG DIISI OLEH MASYARAKAT
        // -----------------------------------------------------

        $data['fields'] =
            $this->Pengajuan_model
            ->getFieldPengajuan($id);


        // -----------------------------------------------------
        // FILE PERSYARATAN
        // -----------------------------------------------------

        $data['files'] =
            $this->Pengajuan_model
            ->getFilePengajuan($id);


        // -----------------------------------------------------
        // LOGO DESA
        // -----------------------------------------------------

        $data['logoDesa'] =
            $this->Logo_profil_model
            ->getLogoDesa();


        // -----------------------------------------------------
        // LOAD VIEW
        // -----------------------------------------------------

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
            'kepala_wilayah/detail_verifikasi',
            $data
        );

        $this->load->view(
            'templates/footer',
            $data
        );
    }


    // =========================================================
    // SETUJUI PENGAJUAN
    // =========================================================
    public function setujui($id)
    {
        $pengajuan =
            $this->Pengajuan_model
            ->getDetailPengajuan($id);


        if (!$pengajuan) {
            show_404();
        }


        // -----------------------------------------------------
        // Pastikan status masih menunggu verifikasi
        // -----------------------------------------------------

        if (
            $pengajuan['status']
            !=
            'Menunggu Verifikasi'
        ) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning">
                    Pengajuan ini sudah diproses sebelumnya.
                </div>'
            );

            redirect('verifikasi_surat');
            return;
        }


        // -----------------------------------------------------
        // UPDATE
        // -----------------------------------------------------

        $data = [

            'status' =>
                'Diproses Admin',

            'verifikator_id' =>
                $this->session->userdata('id'),

            'tanggal_verifikasi' =>
                date('Y-m-d H:i:s')

        ];


        $this->Pengajuan_model
            ->updatePengajuan(
                $id,
                $data
            );


        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Pengajuan berhasil diverifikasi
                dan diteruskan ke Admin.
            </div>'
        );


        redirect(
            'verifikasi_surat'
        );
    }


    // =========================================================
    // TOLAK PENGAJUAN
    // =========================================================
    public function tolak()
    {
        $id =
            $this->input
            ->post('id');


        $alasan =
            trim(
                $this->input
                ->post('alasan_penolakan')
            );


        // -----------------------------------------------------
        // VALIDASI
        // -----------------------------------------------------

        if (empty($id)) {

            show_error(
                'ID pengajuan tidak ditemukan.'
            );
        }


        if (empty($alasan)) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Alasan penolakan wajib diisi.
                </div>'
            );

            redirect(
                'verifikasi_surat/detail/'.$id
            );

            return;
        }


        // -----------------------------------------------------
        // CEK DATA
        // -----------------------------------------------------

        $pengajuan =
            $this->Pengajuan_model
            ->getDetailPengajuan($id);


        if (!$pengajuan) {
            show_404();
        }


        // -----------------------------------------------------
        // UPDATE
        // -----------------------------------------------------

        $data = [

            'status' =>
                'Ditolak',

            'alasan_penolakan' =>
                $alasan,

            'verifikator_id' =>
                $this->session->userdata('id'),

            'tanggal_verifikasi' =>
                date('Y-m-d H:i:s')

        ];


        $this->Pengajuan_model
            ->updatePengajuan(
                $id,
                $data
            );


        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Pengajuan berhasil ditolak.
            </div>'
        );


        redirect(
            'verifikasi_surat'
        );
    }
}