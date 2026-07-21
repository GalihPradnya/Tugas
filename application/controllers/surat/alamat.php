<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Alamat_model');
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['title'] = 'Alamat';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $data['alamat'] = $this->Alamat_model->getAll();

        $this->load->model('Alamat_model');

        $data['alamat'] =
        $this->Alamat_model->getAktif();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat/alamat', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data = [
            'nama_alamat' => $this->input->post('nama_alamat'),
            'status'      => $this->input->post('status')
        ];

        $this->Alamat_model->insert($data);

        redirect('surat/alamat');
    }

    public function edit($id)
    {
        $data = [
            'nama_alamat' => $this->input->post('nama_alamat'),
            'status'      => $this->input->post('status')
        ];

        $this->Alamat_model->update($id, $data);

        redirect('surat/alamat');
    }

    public function hapus($id)
    {
        $this->Alamat_model->delete($id);

        redirect('surat/alamat');
    }
}