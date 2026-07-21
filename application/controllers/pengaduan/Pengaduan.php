<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->model('Kategori_pengaduan_model');
    $this->load->model('Pengaduan_model');
    $this->load->model('Logo_profil_model');
    
}
public function index()
{
    $data['title'] = 'Pengaduan Masyarakat';


    $data['kategori'] =
    $this->Kategori_pengaduan_model->getAktif();
    $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

    $this->load->view('templates/dashboard_header', $data);
    $this->load->view('pengaduan/pengaduan_masyarakat', $data);
    $this->load->view('templates/dashboard_footer', $data);
}
public function simpan()
    {
        $file = '';

        if (!empty($_FILES['bukti']['name'])) {

            $config['upload_path'] = './uploads/pengaduan/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bukti')) {

                $file = $this->upload->data('file_name');

            }
        }

        $data = [   
                    'user_id'       => $this->session->userdata('id'),
                    'nama'          => $this->input->post('nama'),
                    'kontak'        => $this->input->post('kontak'),
                    'alamat'        => $this->input->post('alamat'),
                    'kategori_id'   => $this->input->post('kategori_id'),
                    'judul'         => $this->input->post('judul'),
                    'lokasi'        => $this->input->post('lokasi'),
                    'isi_pengaduan' => $this->input->post('isi_pengaduan'),
                    'bukti'         => $file
                ];

        $this->Pengaduan_model->simpan($data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Pengaduan berhasil dikirim.
            </div>'
        );

        redirect('pengaduan/pengaduan');
    }

}