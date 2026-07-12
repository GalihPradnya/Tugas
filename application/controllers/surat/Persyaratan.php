<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Persyaratan_model');
    }

    public function index()
    {
        $data['title'] = 'Persyaratan';

        $data['persyaratan'] =
            $this->Persyaratan_model->getAll();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat/persyaratan',$data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data = [

            'nama_persyaratan' =>
                $this->input->post('nama_persyaratan'),

            'tipe_file' =>
                $this->input->post('tipe_file')

        ];

        $this->Persyaratan_model->insert($data);

        redirect('surat/Persyaratan');
    }

    public function hapus($id)
    {
        $this->Persyaratan_model->delete($id);

        redirect('surat/Persyaratan');
    }
}