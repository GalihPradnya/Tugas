<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pendatang_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();

        if (
            $this->session->userdata('role_id') != 1 &&
            $this->session->userdata('role_id') != 2
        ) {
            redirect('auth/blocked');
        }

        $this->load->model('Laporan_pendatang_model');
        $this->load->model('Pendatang_model');
        $this->load->model('Logo_profil_model');
    }

    // ==========================
    // Daftar Laporan
    // ==========================
    public function index()
    {
        $data['title'] = 'Laporan Pendatang';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $data['laporan'] = $this->Laporan_pendatang_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan_pendatang_admin/index', $data);
        $this->load->view('templates/footer');
    }

    // ==========================
    // Detail Laporan
    // ==========================
    public function detail($id)
    {
        $data['title'] = 'Detail Laporan Pendatang';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $data['laporan'] = $this->Laporan_pendatang_model->getById($id);

        if (!$data['laporan']) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan_pendatang_admin/detail', $data);
        $this->load->view('templates/footer');
    }

    // ==========================
    // Setujui Laporan
    // ==========================
    public function setujui($id)
    {
        $laporan = $this->Laporan_pendatang_model->getById($id);

        if (!$laporan) {
            show_404();
        }

        // Cek apakah NIK sudah terdaftar
        if (!empty($laporan['nik'])) {

            $cek = $this->Pendatang_model->getByNik($laporan['nik']);

            if ($cek) {

                $this->session->set_flashdata(
                    'error',
                    'Pendatang dengan NIK tersebut sudah terdaftar.'
                );

                redirect('pendatang/laporan_pendatang_admin/detail/' . $id);
            }
        }

        // Data yang akan dimasukkan ke tabel penduduk_pendatang
$dataPendatang = [

    'nik'              => $laporan['nik'],

    'nama_lengkap'     => $laporan['nama_lengkap'],

    'tempat_lahir'     => $laporan['tempat_lahir'],

    'tanggal_lahir'    => $laporan['tanggal_lahir'],

    'jenis_kelamin'    => $laporan['jenis_kelamin'],

    'alamat_asal'      => $laporan['alamat_asal'],

    'alamat_tinggal'   => $laporan['alamat_tinggal'],

    'nomor_hp'         => $laporan['nomor_hp'],

    'email' => $laporan['email'],

    'pekerjaan'        => $laporan['pekerjaan'],

    'tanggal_datang'   => $laporan['tanggal_datang'],

    'tempat_tinggal'   => $laporan['tempat_tinggal'],

    'lama_tinggal'     => $laporan['lama_tinggal'],

    'keterangan'       => $laporan['keterangan'],

    'status'           => 'Aktif'

];

        $this->db->trans_start();

        // Simpan ke tabel penduduk_pendatang
        $this->Pendatang_model->insert($dataPendatang);

        // Update status laporan
        $this->Laporan_pendatang_model->update($id, [
            'status' => 'Disetujui'
        ]);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            $this->session->set_flashdata(
                'error',
                'Terjadi kesalahan saat menyetujui laporan.'
            );

        } else {

            $this->session->set_flashdata(
                'success',
                'Laporan berhasil disetujui dan data pendatang telah ditambahkan.'
            );

        }

        redirect('pendatang/laporan_pendatang_admin');
    }

    // ==========================
    // Tolak Laporan
    // ==========================
    public function tolak($id)
    {
        $laporan = $this->Laporan_pendatang_model->getById($id);

        if (!$laporan) {
            show_404();
        }

        // Jika form belum dikirim
        if ($this->input->method() != 'post') {

            $data['title'] = 'Tolak Laporan Pendatang';
            $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
            $data['laporan'] = $laporan;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan_pendatang_admin/tolak', $data);
            $this->load->view('templates/footer');

            return;
        }

        $alasan = $this->input->post('alasan_penolakan', true);

        $this->Laporan_pendatang_model->update($id, [

            'status' => 'Ditolak',

            'alasan_penolakan' => $alasan

        ]);

        $this->session->set_flashdata(
            'success',
            'Laporan berhasil ditolak.'
        );

        redirect('pendatang/laporan_pendatang_admin');
    }
}