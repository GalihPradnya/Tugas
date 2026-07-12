<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pengajuan_model');
         $this->load->model('Alamat_model');
    }

    public function index()
    {
        $data['title'] = 'Pengajuan Surat';
        
        $data['jenis_surat'] =
            $this->Pengajuan_model->getJenisSurat();

        $data['alamat'] =
        $this->Alamat_model->getAktif();

        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('surat/pengajuan', $data);
        $this->load->view('templates/dashboard_footer', $data);
    }
     public function upload_foto()
{
    $config['upload_path']   = './assets/img/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {

        $data = $this->upload->data();

        echo "Upload berhasil: " . $data['file_name'];

    } else {

        echo $this->upload->display_errors();

    }
}
public function getPersyaratan($id)
{
    $data = $this->Pengajuan_model->getPersyaratanBySurat($id);

    echo json_encode($data);
}
public function tambah()
{
    $data = [
        'nama' => $this->input->post('nama'),
        'nik' => $this->input->post('nik'),
        'alamat' => $this->input->post('alamat'),
        'keperluan' => $this->input->post('keperluan')
    ];

    $this->Pengajuan_model->simpan($data);

    redirect('surat/pengajuan');
}
public function simpan()
{

    $data = [

        'nik' => $this->input->post('nik'),
        'nama' => $this->input->post('nama'),
        'hp' => $this->input->post('hp'),
        'alamat_id' => $this->input->post('alamat_id'),
        'alamat_lainnya' => $this->input->post('alamat_lainnya'),
        'jenis_surat_id' => $this->input->post('jenis_surat_id'),
        'keperluan' => $this->input->post('keperluan'),
        'catatan' => $this->input->post('catatan')

    ];


    // simpan ke database
    $pengajuan_id = $this->Pengajuan_model->simpan($data);


    // jika berhasil simpan
    if($pengajuan_id)
    {

        $this->session->set_flashdata(
            'success',
            'Pengajuan berhasil dikirim'
        );


        redirect('surat/pengajuan');

    }
    else
    {

        $this->session->set_flashdata(
            'error',
            'Pengajuan gagal dikirim'
        );


        redirect('surat/pengajuan');

    }

}
}