<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();

        $this->load->model('Kategori_pengaduan_model');
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['title'] = 'Kategori Pengaduan';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $data['kategori'] =
            $this->Kategori_pengaduan_model->getAll();

        $this->form_validation->set_rules(
            'nama_kategori',
            'Kategori',
            'required'
        );

        if($this->form_validation->run() == FALSE){

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengaduan/kategori_pengaduan', $data);
            $this->load->view('templates/footer');

        } else {

            $dataInsert = [
                'nama_kategori' => $this->input->post('nama_kategori'),
                'status' => 'aktif'
            ];

            $this->db->insert(
                'kategori_pengaduan',
                $dataInsert
            );

            redirect('pengaduan/kategori_pengaduan');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');

        $data = [
            'nama_kategori' =>
            $this->input->post('nama_kategori')
        ];

        $this->db->where('id', $id);
        $this->db->update(
            'kategori_pengaduan',
            $data
        );

        redirect('pengaduan/kategori_pengaduan');
    }

    public function hapus($id)
    {
        $this->db->delete(
            'kategori_pengaduan',
            ['id' => $id]
        );

        redirect('pengaduan/kategori_pengaduan');
    }
}