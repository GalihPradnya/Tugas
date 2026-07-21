<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        is_logged_in();

        $this->load->model('Dashboard_model');
        $this->load->model('Logo_profil_model');
        $this->load->model('Kontak_model');
    }


    public function index()
    {   
        $data['title'] = 'Menu Admin';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $data['user'] = $this->db
            ->get_where(
                'user',
                ['email' => $this->session->userdata('email')]
            )
            ->row_array();


        $data['jumlahPengajuan'] =
            $this->Dashboard_model->jumlahPengajuan();


        $data['jumlahPengaduan'] =
            $this->Dashboard_model->jumlahPengaduan();


        $data['jumlahPendatang'] =
            $this->Dashboard_model->jumlahPendatang();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function kontakDesa()
    {
        $data['title'] = 'Kontak';

        $data['kontak'] =
            $this->Kontak_model->getKontak();
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        if($this->input->post()){

            $update = [

                'alamat' =>
                $this->input->post('alamat'),

                'telepon' =>
                $this->input->post('telepon'),

                'email' =>
                $this->input->post('email'),

                'whatsapp' =>
                $this->input->post('whatsapp'),

                'jam_pelayanan' =>
                $this->input->post('jam_pelayanan'),

                'maps' =>
                $this->input->post('maps')

            ];

            $this->Kontak_model
                ->updateKontak($update);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                    Kontak berhasil diperbarui.
                </div>'
            );

            redirect('Admin/kontakDesa');
        }

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('Profil/kontak_desa',$data);
        $this->load->view('templates/footer', $data);
    }


}