<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Berita_pengumuman_model');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Berita Desa';
        $data['berita'] = $this->Berita_pengumuman_model->getAllBerita();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('berita/index', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $gambar = "";

        if($_FILES['gambar']['name'] != '')
        {
            $config['upload_path']   = './uploads/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if($this->upload->do_upload('gambar'))
            {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(

            'judul'     => $this->input->post('judul'),
            'slug'      => url_title($this->input->post('judul'), '-', TRUE),
            'isi'       => $this->input->post('isi'),
            'gambar'    => $gambar,
            'penulis'   => $this->input->post('penulis'),
            'tanggal' => $this->input->post('tanggal'),
            'status'    => $this->input->post('status')

        );

        $this->Berita_pengumuman_model->insertBerita($data);

        $this->session->set_flashdata('pesan',
            '<div class="alert alert-success">
                Berita berhasil ditambahkan.
            </div>');

        redirect('berita');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Berita';
        $data['berita'] = $this->Berita_pengumuman_model->getBeritaById($id);

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('berita/edit',$data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_berita');

        $data = array(

            'judul'   => $this->input->post('judul'),
            'slug'    => url_title($this->input->post('judul'), '-', TRUE),
            'isi'     => $this->input->post('isi'),
            'penulis' => $this->input->post('penulis'),
            'status'  => $this->input->post('status'),
            'tanggal' => $this->input->post('tanggal')

        );

        if($_FILES['gambar']['name'] != '')
        {
            $config['upload_path']   = './uploads/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if($this->upload->do_upload('gambar'))
            {
                $data['gambar'] = $this->upload->data('file_name');
            }
        }

        $this->Berita_pengumuman_model->updateBerita($id,$data);

        $this->session->set_flashdata('pesan',
            '<div class="alert alert-success">
                Berita berhasil diubah.
            </div>');

        redirect('berita');
    }

    public function hapus($id)
    {
        $this->Berita_pengumuman_model->deleteBerita($id);

        $this->session->set_flashdata('pesan',
            '<div class="alert alert-success">
                Berita berhasil dihapus.
            </div>');

        redirect('berita');
    }
}