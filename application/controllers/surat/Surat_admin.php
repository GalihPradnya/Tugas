<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();

        $this->load->model('Surat_model');
        $this->load->model('Pengajuan_model');
        $this->load->model('Logo_profil_model');
    }


    // ==========================================================
    // BUAT SURAT
    // ==========================================================

    public function buat($pengajuan_id)
    {
        $data['title'] = 'Buat Surat';

        $data['logoDesa'] =
            $this->Logo_profil_model
                ->getLogoDesa();


        // DATA PENGAJUAN
        $data['pengajuan'] =
            $this->Pengajuan_model
                ->getDetailPengajuan($pengajuan_id);


        if (!$data['pengajuan']) {
            show_404();
        }


        // FIELD SURAT
        $data['field_surat'] =
            $this->Surat_model
                ->getFieldByJenisSurat(
                    $data['pengajuan']['jenis_surat_id']
                );


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
            'surat/buat_surat',
            $data
        );

        $this->load->view(
            'templates/footer'
        );
    }


    // ==========================================================
    // SIMPAN SURAT BARU
    // ==========================================================

    public function simpan()
    {
        $pengajuan_id =
            $this->input
                ->post(
                    'pengajuan_id',
                    true
                );

        $nomor_surat =
            $this->input
                ->post(
                    'nomor_surat',
                    true
                );

        $tanggal_surat =
            $this->input
                ->post(
                    'tanggal_surat',
                    true
                );


        // CEK PENGAJUAN

        $pengajuan =
            $this->Pengajuan_model
                ->getDetailPengajuan(
                    $pengajuan_id
                );


        if (!$pengajuan) {
            show_404();
        }


        // CEK SURAT SUDAH ADA

        $cek =
            $this->Surat_model
                ->getByPengajuan(
                    $pengajuan_id
                );


        if ($cek) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning">
                    Surat untuk pengajuan ini sudah dibuat.
                </div>'
            );

            redirect(
                'surat/surat_admin/edit/'
                .$cek['id']
            );
        }


        // DATA SURAT

        $dataSurat = [

            'pengajuan_id' =>
                $pengajuan_id,

            'nomor_surat' =>
                $nomor_surat,

            'tanggal_surat' =>
                $tanggal_surat,

            'dibuat_oleh' =>
                $this->session
                    ->userdata('id')
        ];


        // TRANSAKSI

        $this->db->trans_start();


        // SIMPAN SURAT

        $this->db->insert(
            'surat',
            $dataSurat
        );


        $surat_id =
            $this->db->insert_id();


        // FIELD TAMBAHAN

        $field_surat =
            $this->Surat_model
                ->getFieldByJenisSurat(
                    $pengajuan['jenis_surat_id']
                );


        foreach ($field_surat as $field) {

            $field_name =
                $field['field_name'];


            // KETERANGAN USAHA TIDAK DIPAKAI

            if (
                $field_name ===
                'keterangan_usaha'
            ) {
                continue;
            }


            $field_value =
                $this->input
                    ->post(
                        $field_name,
                        true
                    );


            $dataDetail = [

                'surat_id' =>
                    $surat_id,

                'field_name' =>
                    $field_name,

                'field_value' =>
                    $field_value
            ];


            $this->db->insert(
                'surat_detail',
                $dataDetail
            );
        }


        $this->db->trans_complete();


        // CEK TRANSAKSI

        if (
            $this->db->trans_status()
            === FALSE
        ) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Surat gagal disimpan.
                </div>'
            );

            redirect(
                'surat/surat_admin/buat/'
                .$pengajuan_id
            );
        }


        // BERHASIL

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Surat berhasil dibuat.
            </div>'
        );


        redirect(
            'surat/surat_admin/detail/'
            .$surat_id
        );
    }


    // ==========================================================
    // EDIT SURAT
    // ==========================================================

    public function edit($id)
    {
        $data['title'] = 'Edit Surat';


        $data['logoDesa'] =
            $this->Logo_profil_model
                ->getLogoDesa();


        // DATA SURAT

        $data['surat'] =
            $this->Surat_model
                ->getById($id);


        if (!$data['surat']) {
            show_404();
        }


        // DATA PENGAJUAN

        $data['pengajuan'] =
            $this->Pengajuan_model
                ->getDetailPengajuan(
                    $data['surat']['pengajuan_id']
                );


        if (!$data['pengajuan']) {
            show_404();
        }


        // FIELD YANG TERSEDIA

        $data['field_surat'] =
            $this->Surat_model
                ->getFieldByJenisSurat(
                    $data['pengajuan']
                        ['jenis_surat_id']
                );


        // DETAIL SURAT

        $detail =
            $this->Surat_model
                ->getDetail($id);


        // UBAH MENJADI ARRAY

        $data['isi_surat'] = [];


        foreach ($detail as $d) {

            $data['isi_surat']
                [$d['field_name']]
                =
                $d['field_value'];
        }


        // TAMPILKAN

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
            'surat/edit_surat',
            $data
        );

        $this->load->view(
            'templates/footer'
        );
    }


    // ==========================================================
    // UPDATE SURAT
    // ==========================================================

    public function update()
    {
        $surat_id =
            $this->input
                ->post(
                    'surat_id',
                    true
                );


        $nomor_surat =
            $this->input
                ->post(
                    'nomor_surat',
                    true
                );


        $tanggal_surat =
            $this->input
                ->post(
                    'tanggal_surat',
                    true
                );


        // CEK SURAT

        $surat =
            $this->Surat_model
                ->getById($surat_id);


        if (!$surat) {
            show_404();
        }


        // DATA PENGAJUAN

        $pengajuan =
            $this->Pengajuan_model
                ->getDetailPengajuan(
                    $surat['pengajuan_id']
                );


        if (!$pengajuan) {
            show_404();
        }


        // FIELD SURAT

        $field_surat =
            $this->Surat_model
                ->getFieldByJenisSurat(
                    $pengajuan['jenis_surat_id']
                );


        // MULAI TRANSAKSI

        $this->db->trans_start();


        // UPDATE SURAT

        $this->Surat_model
            ->updateSurat(
                $surat_id,
                [

                    'nomor_surat' =>
                        $nomor_surat,

                    'tanggal_surat' =>
                        $tanggal_surat
                ]
            );


        // HAPUS DETAIL LAMA

        $this->Surat_model
            ->deleteDetail(
                $surat_id
            );


        // SIMPAN DETAIL BARU

        foreach ($field_surat as $field) {

            $field_name =
                $field['field_name'];


            // KETERANGAN USAHA TIDAK DIPAKAI

            if (
                $field_name ===
                'keterangan_usaha'
            ) {
                continue;
            }


            $field_value =
                $this->input
                    ->post(
                        $field_name,
                        true
                    );


            $this->Surat_model
                ->insertDetail(
                    [

                        'surat_id' =>
                            $surat_id,

                        'field_name' =>
                            $field_name,

                        'field_value' =>
                            $field_value
                    ]
                );
        }


        $this->db->trans_complete();


        if (
            $this->db->trans_status()
            === FALSE
        ) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Surat gagal diperbarui.
                </div>'
            );

            redirect(
                'surat/surat_admin/edit/'
                .$surat_id
            );
        }


        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Surat berhasil diperbarui.
            </div>'
        );


        redirect(
            'surat/surat_admin/detail/'
            .$surat_id
        );
    }
    // ==========================================================
// DETAIL SURAT
// ==========================================================

public function detail($id)
{
    $data['title'] = 'Detail Surat';

    $data['logoDesa'] =
        $this->Logo_profil_model
            ->getLogoDesa();


    // ======================================================
    // DATA SURAT
    // ======================================================

    $data['surat'] =
        $this->Surat_model
            ->getById($id);


    if (!$data['surat']) {
        show_404();
    }


    // ======================================================
    // DATA PENGAJUAN
    // ======================================================

    $data['pengajuan'] =
        $this->Pengajuan_model
            ->getDetailPengajuan(
                $data['surat']['pengajuan_id']
            );


    if (!$data['pengajuan']) {
        show_404();
    }


    // ======================================================
    // DETAIL ISI SURAT
    // ======================================================

    $data['detail'] =
        $this->Surat_model
            ->getDetail($id);


    // ======================================================
    // TAMPILKAN HALAMAN
    // ======================================================

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
        'surat/detail_surat',
        $data
    );

    $this->load->view(
        'templates/footer'
    );
}

// ==========================================================
// CETAK SURAT
// ==========================================================

// ==========================================================
// CETAK SURAT
// ==========================================================

// ==========================================================
// CETAK SURAT
// ==========================================================

public function cetak($id)
{
    $data['title'] = 'Cetak Surat';


    // ==========================================================
    // KOP SURAT
    // ==========================================================

    $data['logoDesa'] =
        $this->Logo_profil_model
            ->getLogoDesa();


    // ==========================================================
    // DATA SURAT
    // ==========================================================

    $data['surat'] =
        $this->Surat_model
            ->getById($id);


    if (!$data['surat']) {

        show_404();

    }


    // ==========================================================
    // DATA PENGAJUAN
    // ==========================================================

    $data['pengajuan'] =
        $this->Pengajuan_model
            ->getDetailPengajuan(
                $data['surat']['pengajuan_id']
            );


    if (!$data['pengajuan']) {

        show_error(
            'Data pengajuan surat tidak ditemukan.'
        );

    }


    // ==========================================================
    // DETAIL SURAT
    // ==========================================================

    $detail =
        $this->Surat_model
            ->getDetail($id);


    // ==========================================================
    // UBAH DETAIL MENJADI ARRAY
    // ==========================================================

    $data['isi_surat'] = [];


    if (!empty($detail)) {

        foreach ($detail as $row) {

            $data['isi_surat'][
                $row['field_name']
            ] = $row['field_value'];

        }

    }


    // ==========================================================
    // TEMPLATE SURAT
    // ==========================================================

    /*
     * Ambil nama template langsung dari tabel jenis_surat
     * berdasarkan jenis_surat_id dari pengajuan.
     */

    $jenis_surat =
        $this->db
            ->where(
                'id',
                $data['pengajuan']['jenis_surat_id']
            )
            ->get('jenis_surat')
            ->row_array();


    if (!$jenis_surat) {

        show_error(
            'Jenis surat tidak ditemukan.'
        );

    }


    // ==========================================================
    // CEK TEMPLATE
    // ==========================================================

    if (
        empty(
            $jenis_surat['template']
        )
    ) {

        show_error(
            'Template cetak untuk jenis surat ini belum tersedia.'
        );

    }


    $template =
        $jenis_surat['template'];


    // ==========================================================
    // NAMA VIEW
    // ==========================================================

    $view =
        'surat/cetak/' . $template;


    // ==========================================================
    // CEK FILE VIEW
    // ==========================================================

    if (
        !file_exists(
            APPPATH .
            'views/' .
            $view .
            '.php'
        )
    ) {

        show_error(
            'File template cetak tidak ditemukan: '
            . $template
        );

    }


    // ==========================================================
    // TAMPILKAN TEMPLATE
    // ==========================================================

    $this->load->view(
        $view,
        $data
    );
}
}