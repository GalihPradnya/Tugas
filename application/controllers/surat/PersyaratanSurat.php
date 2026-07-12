<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersyaratanSurat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('PersyaratanSurat_model');
        $this->load->model('JenisSurat_model');
        $this->load->model('Persyaratan_model');
    }

    public function index()
    {
        $data['title'] = 'Persyaratan Surat';

        $data['jenis_surat'] =
            $this->JenisSurat_model->getAll();

        $data['persyaratan'] =
            $this->Persyaratan_model->getAll();

        $data['persyaratan_surat'] =
            $this->PersyaratanSurat_model->getAll();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat/persyaratan_surat',$data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data = [

            'jenis_surat_id' =>
                $this->input->post('jenis_surat_id'),

            'persyaratan_id' =>
                $this->input->post('persyaratan_id')

        ];

        $this->PersyaratanSurat_model->insert($data);

        redirect('surat/PersyaratanSurat');
    }
    public function hapus($id)
{
    $this->db->delete(
        'persyaratan_surat',
        ['id' => $id]
    );

    redirect('surat/PersyaratanSurat');
}
}