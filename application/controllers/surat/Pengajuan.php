<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pengajuan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();


        // =====================================================
        // LOAD MODEL
        // =====================================================

        $this->load->model('User_model');

        $this->load->model('Pengajuan_model');

        $this->load->model('Logo_profil_model');


        // =====================================================
        // CEK LOGIN
        // =====================================================

        if (!$this->session->userdata('id')) {

            $this->session->set_userdata(
                'redirect_after_login',
                current_url()
            );


            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning">
                    Silakan login terlebih dahulu untuk
                    mengakses layanan publik.
                </div>'
            );


            redirect('auth/login');
        }


        // =====================================================
        // AMBIL DATA USER
        // =====================================================

        $user =
            $this->User_model->getUserById(
                $this->session->userdata('id')
            );


        // =====================================================
        // CEK EMAIL
        // =====================================================

        if (
            empty($user['email'])
        ) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning">
                    Silakan lengkapi email Anda terlebih dahulu
                    sebelum mengajukan surat.
                </div>'
            );


            redirect('user/user/edit');
        }
    }


    // =========================================================
    // HALAMAN FORM PENGAJUAN
    // =========================================================
    public function index()
    {

        $data['title'] =
            'Pengajuan Surat';


        // =====================================================
        // LOGO DESA
        // =====================================================

        $data['logoDesa'] =
            $this->Logo_profil_model
            ->getLogoDesa();


        // =====================================================
        // JENIS SURAT
        // =====================================================

        $data['jenis_surat'] =
            $this->Pengajuan_model
            ->getJenisSurat();


        // =====================================================
        // DATA PENDUDUK YANG LOGIN
        // =====================================================

        $penduduk_id =
            $this->session
            ->userdata('penduduk_id');


        $data['penduduk'] =
            $this->db
            ->get_where(
                'penduduk',
                [
                    'id' => $penduduk_id
                ]
            )
            ->row_array();


        // =====================================================
        // VIEW
        // =====================================================

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


    // =========================================================
    // AJAX FIELD + PERSYARATAN
    // =========================================================
    public function getPersyaratan($id)
    {

        // =====================================================
        // FIELD YANG DIISI PEMOHON
        // =====================================================

        $fields =
            $this->Pengajuan_model
            ->getFieldConfigBySurat($id);


        // =====================================================
        // FILE PERSYARATAN
        // =====================================================

        $persyaratan =
            $this->Pengajuan_model
            ->getPersyaratanBySurat($id);


        // =====================================================
        // RESPONSE JSON
        // =====================================================

        echo json_encode([
            'fields' =>
                $fields,

            'persyaratan' =>
                $persyaratan
        ]);
    }


    // =========================================================
    // SIMPAN PENGAJUAN
    // =========================================================
    public function simpan()
    {

        // =====================================================
        // DATA DASAR
        // =====================================================

        $penduduk_id =
            $this->session
            ->userdata('penduduk_id');


        $user_id =
            $this->session
            ->userdata('id');


        $jenis_surat_id =
            $this->input
            ->post('jenis_surat_id');


        // =====================================================
        // VALIDASI JENIS SURAT
        // =====================================================

        if (empty($jenis_surat_id)) {

            $this->session->set_flashdata(
                'error',
                'Silakan pilih jenis surat terlebih dahulu.'
            );


            redirect(
                'surat/pengajuan'
            );
        }


        // =====================================================
        // CEK PENGAJUAN YANG MASIH BERJALAN
        // =====================================================

        $cek =
            $this->Pengajuan_model
            ->cekPengajuanBerjalan(
                $penduduk_id,
                $jenis_surat_id
            );


        if ($cek) {

            $this->session->set_flashdata(
                'error',
                'Pengajuan surat yang sama masih berstatus '
                . $cek['status']
                . '. Silakan tunggu hingga proses pengajuan selesai '
                . 'sebelum mengajukan kembali.'
            );


            redirect(
                'surat/pengajuan'
            );
        }


        // =====================================================
        // DATA PENGAJUAN
        // =====================================================

        $data = [

            'user_id' =>
                $user_id,

            'penduduk_id' =>
                $penduduk_id,

            'hp' =>
                trim(
                    $this->input
                    ->post('hp')
                ),

            'jenis_surat_id' =>
                $jenis_surat_id,

            'keperluan' =>
                trim(
                    $this->input
                    ->post('keperluan')
                ),

            'catatan' =>
                trim(
                    $this->input
                    ->post('catatan')
                ),

            'status' =>
                'Menunggu Verifikasi'
        ];


        // =====================================================
        // SIMPAN PENGAJUAN
        // =====================================================

        $pengajuan_id =
            $this->Pengajuan_model
            ->simpan($data);


        if (!$pengajuan_id) {

            $this->session->set_flashdata(
                'error',
                'Pengajuan surat gagal disimpan.'
            );


            redirect(
                'surat/pengajuan'
            );
        }


        // =====================================================
        // SIMPAN FIELD DINAMIS
        //
        // field[id] = nilai
        // =====================================================

        $fields =
            $this->input
            ->post('field');


        if (
            !empty($fields)
            &&
            is_array($fields)
        ) {

            foreach (
                $fields
                as $field_config_id => $nilai
            ) {

                // Bersihkan nilai
                if (is_array($nilai)) {

                    $nilai =
                        implode(
                            ', ',
                            $nilai
                        );
                }


                $nilai =
                    trim(
                        $nilai
                    );


                // Simpan
                $this->Pengajuan_model
                ->simpanField([

                    'pengajuan_id' =>
                        $pengajuan_id,

                    'field_config_id' =>
                        (int) $field_config_id,

                    'nilai' =>
                        $nilai

                ]);
            }
        }


        // =====================================================
        // KONFIGURASI UPLOAD
        // =====================================================

        $config['upload_path'] =
            './uploads/persyaratan/';


        $config['allowed_types'] =
            'jpg|jpeg|png|pdf';


        $config['max_size'] =
            2048;


        $config['encrypt_name'] =
            FALSE;


        // Pastikan folder tersedia
        if (
            !is_dir(
                $config['upload_path']
            )
        ) {

            mkdir(
                $config['upload_path'],
                0755,
                TRUE
            );
        }


        // =====================================================
        // LOAD LIBRARY UPLOAD
        // =====================================================

        $this->load->library(
            'upload'
        );


        // =====================================================
        // UPLOAD SEMUA FILE PERSYARATAN
        // =====================================================

        foreach (
            $_FILES
            as $key => $file
        ) {

            // Hanya proses field persyaratan
            if (
                strpos(
                    $key,
                    'persyaratan_'
                ) !== 0
            ) {

                continue;
            }


            // Tidak ada file
            if (
                empty(
                    $file['name']
                )
            ) {

                continue;
            }


            // =================================================
            // AMBIL ID PERSYARATAN
            // =================================================

            $persyaratan_id =
                str_replace(
                    'persyaratan_',
                    '',
                    $key
                );


            // =================================================
            // NAMA FILE
            // =================================================

            $config['file_name'] =
                time()
                . '_'
                . preg_replace(
                    '/[^A-Za-z0-9_\-.]/',
                    '_',
                    $file['name']
                );


            // =================================================
            // INITIALIZE UPLOAD
            // =================================================

            $this->upload
            ->initialize(
                $config
            );


            // =================================================
            // UPLOAD
            // =================================================

            if (
                $this->upload
                ->do_upload($key)
            ) {

                $uploadData =
                    $this->upload
                    ->data();


                // =================================================
                // SIMPAN KE DATABASE
                // =================================================

                $this->Pengajuan_model
                ->simpanFile([

                    'pengajuan_id' =>
                        $pengajuan_id,

                    'persyaratan_id' =>
                        $persyaratan_id,

                    'nama_file' =>
                        $uploadData[
                            'file_name'
                        ]

                ]);
            }
            else {

                // =================================================
                // JIKA UPLOAD GAGAL
                // =================================================

                log_message(
                    'error',
                    'Upload persyaratan gagal: '
                    . $key
                    . ' - '
                    . $this->upload
                    ->display_errors(
                        '',
                        ''
                    )
                );
            }
        }


        // =====================================================
        // BERHASIL
        // =====================================================

        $this->session->set_flashdata(
            'success',
            'Pengajuan surat berhasil dikirim.'
        );


        redirect(
            'surat/pengajuan'
        );
    }


    // =========================================================
    // UPLOAD FOTO
    // =========================================================
    public function upload_foto()
    {

        $config['upload_path'] =
            './assets/img/';


        $config['allowed_types'] =
            'jpg|jpeg|png';


        $config['max_size'] =
            2048;


        $this->load->library(
            'upload',
            $config
        );


        if (
            $this->upload
            ->do_upload('foto')
        ) {

            $data =
                $this->upload
                ->data();


            echo
                'Upload berhasil : '
                . $data['file_name'];

        }
        else {

            echo
                $this->upload
                ->display_errors();
        }
    }


}