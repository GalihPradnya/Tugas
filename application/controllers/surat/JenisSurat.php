<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisSurat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('JenisSurat_model');
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['title'] = 'Jenis Surat';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $data['jenis_surat'] = $this->JenisSurat_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat/jenis_surat', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data = [
            'nama_surat' => $this->input->post('nama_surat'),
            'status' => $this->input->post('status')
        ];

        $this->JenisSurat_model->insert($data);

        redirect('surat/JenisSurat');
    }

    public function edit($id)
    {
        $data = [
            'nama_surat' => $this->input->post('nama_surat'),
            'status' => $this->input->post('status')
        ];

        $this->JenisSurat_model->update($id, $data);

        redirect('surat/JenisSurat');
    }

    public function hapus($id)
    {
        $this->JenisSurat_model->delete($id);

        redirect('surat/JenisSurat');
    }
}