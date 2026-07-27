<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pendatang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

                if (!$this->session->userdata('id')) {

            // Simpan URL yang ingin diakses (opsional)
            $this->session->set_userdata('redirect_after_login', current_url());

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning">
                    Silakan login terlebih dahulu untuk mengakses layanan publik.
                </div>'
            );

            redirect('auth/login');
        }

        $this->load->model('Laporan_pendatang_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Logo_profil_model');

        $this->load->library('form_validation');
    }

    // ==========================
    // Riwayat laporan pendatang
    // ==========================
    public function index()
    {
        $data['title'] = 'Riwayat Laporan Pendatang';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $user_id = $this->session->userdata('id');

        $data['laporan'] = $this->Laporan_pendatang_model->getByUser($user_id);

        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('laporan_pendatang/index', $data);
        $this->load->view('templates/dashboard_footer', $data);
    }

    // ==========================
    // Form tambah laporan
    // ==========================
    public function tambah()
    {
        $data['title'] = 'Lapor Pendatang';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $user_id = $this->session->userdata('id');

        // mengambil data penduduk yang login
        $data['penduduk'] = $this->Penduduk_model->getPendudukByUserId($user_id);

        if (!$data['penduduk']) {

            $this->session->set_flashdata(
                'error',
                'Data penduduk tidak ditemukan.'
            );

            redirect('pendatang/laporan_pendatang');
        }

        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('laporan_pendatang/tambah', $data);
        $this->load->view('templates/dashboard_footer', $data);
    }

    // ==========================
    // Simpan laporan
    // ==========================
    public function simpan()
    {
        $this->form_validation->set_rules(
            'nama_lengkap',
            'Nama Lengkap',
            'required'
        );

        $this->form_validation->set_rules(
            'alamat_tinggal',
            'Alamat Tinggal',
            'required'
        );

        if ($this->form_validation->run() == FALSE) {

            return $this->tambah();

        }

        $data = [

            'user_id' => $this->session->userdata('id'),

            'nik' => $this->input->post('nik', true),

            'nama_lengkap' => $this->input->post('nama_lengkap', true),

            'tempat_lahir' => $this->input->post('tempat_lahir', true),

            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),

            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),

            'alamat_asal' => $this->input->post('alamat_asal', true),

            'alamat_tinggal' => $this->input->post('alamat_tinggal', true),

            'nomor_hp' => $this->input->post('nomor_hp', true),

            'email' => $this->input->post('email', true),

            'pekerjaan' => $this->input->post('pekerjaan', true),

            'tanggal_datang' => $this->input->post('tanggal_datang', true),

            'tempat_tinggal' => $this->input->post('tempat_tinggal', true),

            'lama_tinggal' => $this->input->post('lama_tinggal', true),

            'keterangan' => $this->input->post('keterangan', true),

            'status' => 'Menunggu'

        ];

        if ($this->Laporan_pendatang_model->insert($data)) {

            $this->session->set_flashdata(
                'success',
                'Laporan pendatang berhasil dikirim dan sedang menunggu verifikasi admin.'
            );

        } else {

            $this->session->set_flashdata(
                'error',
                'Laporan pendatang gagal dikirim.'
            );

        }

        redirect('pendatang/laporan_pendatang');
    }

    // ==========================
    // Detail laporan
    // ==========================
    public function detail($id)
    {
        $data['title'] = 'Detail Laporan Pendatang';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $data['laporan'] = $this->Laporan_pendatang_model->getById($id);

        if (!$data['laporan']) {
            show_404();
        }

        // hanya pemilik laporan yang boleh melihat
        if ($data['laporan']['user_id'] != $this->session->userdata('id')) {
            show_error('Anda tidak memiliki akses ke laporan ini.', 403);
        }

        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('laporan_pendatang/detail', $data);
        $this->load->view('templates/dashboard_footer', $data);
    }
}