<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hero extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        

        $this->load->model('Hero_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['title'] = 'Hero Beranda';
        $data['hero'] = $this->Hero_model->getHero();
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

        $this->form_validation->set_rules(
            'judul',
            'Judul',
            'required'
        );

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('superadmin/hero',$data);
            $this->load->view('templates/footer', $data);
        }
        else
        {
            $update = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'alamat' => $this->input->post('alamat')
            ];

            $this->Hero_model->updateHero($update);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                    Hero berhasil diupdate
                </div>'
            );

            redirect('hero');
        }
    }
    public function slide()
{
    $data['title'] = 'Hero Slide';
    $data['slides'] = $this->Hero_model->getSlides();
    $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('superadmin/hero_slide',$data);
    $this->load->view('templates/footer', $data);
}
public function tambahSlide()
{
    $config['upload_path'] = './uploads/hero/';
    $config['allowed_types'] = 'jpg|jpeg|png|webp';
    $config['max_size'] = 4096;

    $this->upload->initialize($config);

    if($this->upload->do_upload('gambar'))
    {
        $upload = $this->upload->data();

        $data = [
            'gambar' => $upload['file_name'],
            'status' => 'aktif'
        ];

        $this->db->insert(
            'hero_slide',
            $data
        );
    }

    redirect('hero/slide');
}
public function hapusSlide($id)
{
    $slide = $this->db
        ->get_where('hero_slide',['id'=>$id])
        ->row_array();

    if($slide)
    {
        @unlink(
            FCPATH.'uploads/hero/'.$slide['gambar']
        );

        $this->db->delete(
            'hero_slide',
            ['id'=>$id]
        );
    }

    redirect('hero/slide');
}
}