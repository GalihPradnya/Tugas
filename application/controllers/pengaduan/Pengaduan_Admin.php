<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        is_logged_in();

        $this->load->model('Pengaduan_model');
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['title'] = 'Pengaduan Admin';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $data['pengaduan'] =
            $this->Pengaduan_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengaduan/pengaduan_admin', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengaduan';

        $data['pengaduan'] =
            $this->Pengaduan_model->getById($id);
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengaduan/pengaduan_detail', $data);
        $this->load->view('templates/footer');
    }

    public function updateStatus()
    {
        $id = $this->input->post('id');

        $data = [
            'status' => $this->input->post('status'),
            'tanggapan' => $this->input->post('tanggapan')
        ];

        $this->db->where('id', $id);
        $this->db->update('pengaduan', $data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Data berhasil diperbarui.
            </div>'
        );

        redirect('pengaduan/pengaduan_admin');
    }
}