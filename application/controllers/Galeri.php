<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Galeri_model');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->model('Kontak_model');
    }

    public function index()
    {
        $data['title'] = 'Galeri Desa';
        $data['galeri'] = $this->Galeri_model->getGaleri();
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('galeri/index', $data);
        $this->load->view('templates/footer');
    }

    // ==========================
    // TAMBAH GALERI
    // ==========================

    public function tambah()
    {

        $config['upload_path'] = './uploads/galeri/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {

            $upload = $this->upload->data();

            $data = [

                'judul'      => $this->input->post('judul'),
                'deskripsi'  => $this->input->post('deskripsi'),
                'gambar'     => $upload['file_name'],
                'status'     => $this->input->post('status'),
                'tanggal'    => date('Y-m-d')

            ];

            $this->Galeri_model->insert($data);

            $this->session->set_flashdata('message',
                '<div class="alert alert-success">Galeri berhasil ditambahkan.</div>');

        } else {

            $this->session->set_flashdata('message',
                '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');

        }

        redirect('galeri');

    }

    // ==========================
    // UPDATE GALERI
    // ==========================

    public function update()
    {

        $id = $this->input->post('id_galeri');

        $data = [

            'judul'      => $this->input->post('judul'),
            'deskripsi'  => $this->input->post('deskripsi'),
            'status'     => $this->input->post('status')

        ];

        $config['upload_path'] = './uploads/galeri/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {

            $upload = $this->upload->data();

            if ($this->input->post('gambar_lama') != "") {

                @unlink('./uploads/galeri/'.$this->input->post('gambar_lama'));

            }

            $data['gambar'] = $upload['file_name'];

        }

        $this->Galeri_model->update($id, $data);

        $this->session->set_flashdata('message',
            '<div class="alert alert-success">Galeri berhasil diubah.</div>');

        redirect('galeri');

    }

    // ==========================
    // HAPUS GALERI
    // ==========================

    public function hapus()
    {

        $id = $this->input->post('id_galeri');

        if ($this->input->post('gambar') != "") {

            @unlink('./uploads/galeri/'.$this->input->post('gambar'));

        }

        $this->Galeri_model->delete($id);

        $this->session->set_flashdata('message',
            '<div class="alert alert-success">Galeri berhasil dihapus.</div>');

        redirect('galeri');

    }

}