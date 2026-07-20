<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pengajuan_model');
         $this->load->model('Alamat_model');
        $this->load->model('Logo_profil_model');
    }

    public function index()
    {
        $data['title'] = 'Pengajuan Surat';
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

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
        'user_id' => $this->session->userdata('id'),
        
        'nik' => $this->input->post('nik'),
        'nama' => $this->input->post('nama'),
        'hp' => $this->input->post('hp'),
        'alamat_id' => $this->input->post('alamat_id'),
        'alamat_lainnya' => $this->input->post('alamat_lainnya'),
        'jenis_surat_id' => $this->input->post('jenis_surat_id'),
        'keperluan' => $this->input->post('keperluan'),
        'catatan' => $this->input->post('catatan')

    ];

    // Simpan data pengajuan
        $pengajuan_id = $this->Pengajuan_model->simpan($data);

        if($pengajuan_id)
        {
            // Konfigurasi upload
            $config['upload_path']   = './uploads/persyaratan/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size']      = 2048;

            $this->load->library('upload');

            // Upload semua file persyaratan
            foreach($_FILES as $key => $file)
            {
                if(!empty($file['name']))
                {
                    $config['file_name'] = time().'_'.$file['name'];

                    $this->upload->initialize($config);

                    if($this->upload->do_upload($key))
                    {
                        $uploadData = $this->upload->data();

                        $persyaratan_id = str_replace(
                            'persyaratan_',
                            '',
                            $key
                        );

                        $this->Pengajuan_model->simpanFile([
                            'pengajuan_id'   => $pengajuan_id,
                            'persyaratan_id' => $persyaratan_id,
                            'nama_file'      => $uploadData['file_name']
                        ]);
                    }
                }
            }

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