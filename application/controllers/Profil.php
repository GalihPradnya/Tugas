<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Profil_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Profil Desa';

        $data['user'] = $this->db
            ->get_where('user', [
                'email' => $this->session->userdata('email')
            ])
            ->row_array();

        $data['profil'] = $this->Profil_model->getProfil();
        $data['misi']   = $this->Profil_model->getMisi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profil/index', $data);
        $this->load->view('templates/footer');
    }

    // ==========================
    // TAMBAH MISI
    // ==========================
    public function tambahMisi()
    {
        $this->form_validation->set_rules(
            'isi_misi',
            'Isi Misi',
            'required|trim'
        );

        $this->form_validation->set_rules(
            'urutan',
            'Urutan',
            'required|integer'
        );

        if ($this->form_validation->run() == FALSE) {

            redirect('profil');

        } else {

            $data = [
                'isi_misi' => $this->input->post('isi_misi', TRUE),
                'urutan'   => $this->input->post('urutan', TRUE)
            ];

            $this->Profil_model->tambahMisi($data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                    Misi berhasil ditambahkan.
                </div>'
            );

            redirect('profil');
        }
    }
    public function editMisi($id)
{
    $data = [
        'isi_misi' => $this->input->post('isi_misi', TRUE),
        'urutan'   => $this->input->post('urutan', TRUE)
    ];

    $this->Profil_model->updateMisi($id, $data);

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
            Data misi berhasil diubah.
        </div>'
    );

    redirect('profil');
}

// ==========================
    // HAPUS MISI
    // ==========================
    
public function hapusMisi($id)
{
    // Cek apakah data ada
    $misi = $this->Profil_model->getMisiById($id);

    if (!$misi) {

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger">
                Data misi tidak ditemukan.
            </div>'
        );

        redirect('profil');
    }

    // Hapus data
    $this->Profil_model->hapusMisi($id);

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
            Data misi berhasil dihapus.
        </div>'
    );

    redirect('profil');
}

// update profil desa
public function updateProfil()
{
    $profil = $this->Profil_model->getProfil();

    $data = [
        'tentang'          => $this->input->post('tentang', true),
        'visi'             => $this->input->post('visi', true),
        'luas_wilayah'     => $this->input->post('luas_wilayah', true),
        'jumlah_penduduk'  => $this->input->post('jumlah_penduduk', true),
        'jumlah_dusun'     => $this->input->post('jumlah_dusun', true),
        'jumlah_rt'        => $this->input->post('jumlah_rt', true),
        'jumlah_rw'        => $this->input->post('jumlah_rw', true),
        'kode_pos'         => $this->input->post('kode_pos', true),
    ];

    // upload gambar jika ada
    if (!empty($_FILES['gambar']['name'])) {

        $config['upload_path']   = './uploads/profil/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {

            // hapus gambar lama
            if (!empty($profil->gambar) && file_exists('./uploads/profil/'.$profil->gambar)) {
                unlink('./uploads/profil/'.$profil->gambar);
            }

            $upload = $this->upload->data();

            $data['gambar'] = $upload['file_name'];

        } else {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">'.
                $this->upload->display_errors().
                '</div>'
            );

            redirect('profil');
        }
    }

    $this->Profil_model->updateProfil($profil->id, $data);

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
            Profil desa berhasil diperbarui.
        </div>'
    );

    redirect('profil');
}

}