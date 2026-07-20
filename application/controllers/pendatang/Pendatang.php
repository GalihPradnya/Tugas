<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendatang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pendatang_model');
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['title'] = 'Pendataan Warga Pendatang';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('pendatang/form_pendatang', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function simpan()
    {
        $foto_warga = '';
        $foto_ktp = '';
        $foto_kk = '';

        if (!is_dir('./uploads/pendatang/')) {
            mkdir('./uploads/pendatang/', 0777, true);
        }

        $config['upload_path'] = './uploads/pendatang/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048;

        $this->load->library('upload');

        // Foto warga
        if(!empty($_FILES['foto_warga']['name']))
        {
            $this->upload->initialize($config);

            if($this->upload->do_upload('foto_warga'))
            {
                $foto_warga = $this->upload->data('file_name');
            }
        }

        // Foto KTP
        if(!empty($_FILES['foto_ktp']['name']))
        {
            $this->upload->initialize($config);

            if($this->upload->do_upload('foto_ktp'))
            {
                $foto_ktp = $this->upload->data('file_name');
            }
        }

        // Foto KK
        if(!empty($_FILES['foto_kk']['name']))
        {
            $this->upload->initialize($config);

            if($this->upload->do_upload('foto_kk'))
            {
                $foto_kk = $this->upload->data('file_name');
            }
        }

        $data = [
            'user_id'         => $this->session->userdata('id'),
            'nik'             => $this->input->post('nik'),
            'nama'            => $this->input->post('nama'),
            'jenis_kelamin'   => $this->input->post('jenis_kelamin'),
            'tempat_lahir'    => $this->input->post('tempat_lahir'),
            'tanggal_lahir'   => $this->input->post('tanggal_lahir'),
            'telepon'         => $this->input->post('telepon'),
            'alamat_asal'     => $this->input->post('alamat_asal'),
            'alamat_tinggal'  => $this->input->post('alamat_tinggal'),
            'tujuan_datang'   => $this->input->post('tujuan_datang'),
            'tanggal_datang'  => $this->input->post('tanggal_datang'),
            'lama_tinggal'    => $this->input->post('lama_tinggal'),
            'foto_warga'      => $foto_warga,
            'foto_ktp'        => $foto_ktp,
            'foto_kk'         => $foto_kk
        ];

        $this->Pendatang_model->simpan($data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">Data pendatang berhasil dikirim.</div>'
        );

        redirect('pendatang/pendatang');
    }
    
}