<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Berita_pengumuman_model');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['title'] = 'Pengumuman Desa';
        $data['pengumuman'] = $this->Berita_pengumuman_model->getAllPengumuman();
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengumuman/index', $data);
        $this->load->view('templates/footer');
    }

    // ===========================
    // SIMPAN
    // ===========================

    public function simpan()
    {
        $gambar = "";

        if ($_FILES['gambar']['name'] != '') {

            $config['upload_path']   = './uploads/pengumuman/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(

            'judul'   => $this->input->post('judul'),
            'isi'     => $this->input->post('isi'),
            'gambar'  => $gambar,
            'tanggal' => $this->input->post('tanggal'),
            'status'  => $this->input->post('status')

        );

        $this->Berita_pengumuman_model->insertPengumuman($data);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success">
                Pengumuman berhasil ditambahkan.
            </div>'
        );

        redirect('pengumuman');
    }

    // ===========================
    // UPDATE
    // ===========================

    public function update()
    {
        $id = $this->input->post('id_pengumuman');

        $data = array(

            'judul'   => $this->input->post('judul'),
            'isi'     => $this->input->post('isi'),
            'tanggal' => $this->input->post('tanggal'),
            'status'  => $this->input->post('status')

        );

        if ($_FILES['gambar']['name'] != '') {

            $config['upload_path']   = './uploads/pengumuman/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {

                $lama = $this->Berita_pengumuman_model->getPengumumanByIdAdmin($id);

                if ($lama && $lama->gambar != '') {

                    $path = './uploads/pengumuman/' . $lama->gambar;

                    if (file_exists($path)) {
                        unlink($path);
                    }
                }

                $data['gambar'] = $this->upload->data('file_name');
            }
        }

        $this->Berita_pengumuman_model->updatePengumuman($id, $data);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success">
                Pengumuman berhasil diubah.
            </div>'
        );

        redirect('pengumuman');
    }

    // ===========================
    // HAPUS
    // ===========================

    public function hapus($id)
    {
        $pengumuman = $this->Berita_pengumuman_model->getPengumumanByIdAdmin($id);

        if ($pengumuman && $pengumuman->gambar != '') {

            $path = './uploads/pengumuman/' . $pengumuman->gambar;

            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->Berita_pengumuman_model->deletePengumuman($id);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success">
                Pengumuman berhasil dihapus.
            </div>'
        );

        redirect('pengumuman');
    }
}