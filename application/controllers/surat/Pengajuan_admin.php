<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pengajuan_model');
    }

    public function pengajuan_admin()
    {
        $data['title'] = 'Data Pengajuan';

        $data['pengajuan'] =
            $this->Pengajuan_model->getAllPengajuan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat/data_pengajuan', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detail($id)
{
    $data['title'] = 'Detail Pengajuan';

    $data['pengajuan'] =
        $this->Pengajuan_model->getDetailPengajuan($id);

    $data['file'] =
        $this->Pengajuan_model->getFilePengajuan($id);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('surat/detail_pengajuan', $data);
    $this->load->view('templates/footer');
}
public function updateStatus()
{
    $id     = $this->input->post('id');
    $status = $this->input->post('status');

    $data = [
        'status' => $status
        
    ];
    $kirimEmail = false;

    // upload surat hasil jika ada
    if(!empty($_FILES['file_hasil']['name']))
    {
        $config['upload_path']   = './uploads/surat_hasil/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 2048;
        $config['file_name']     = time().'_'.$_FILES['file_hasil']['name'];

        $this->load->library('upload');
        $this->upload->initialize($config);

        if($this->upload->do_upload('file_hasil'))
        {
            $uploadData = $this->upload->data();

            $data['file_hasil'] =
                $uploadData['file_name'];
                  $kirimEmail = true;
        }
        else
        {
            $this->session->set_flashdata(
                'error',
                $this->upload->display_errors()
            );

            redirect(
                'surat/Pengajuan_admin/detail/'.$id
            );

            return;
        }
    }

    // update database
    $this->Pengajuan_model->updatePengajuan(
        $id,
        $data
    );
    if(
        $status == 'Selesai'
        &&
        !empty($data['file_hasil'])
    )
    {
        $kirimEmail = true;
    }

    // ===========================
    // KIRIM EMAIL JIKA SELESAI
    // ===========================
    if($kirimEmail)
    {
        $pengajuan =
            $this->Pengajuan_model->getPengajuanById($id);

        $this->load->library('email');

        $this->email->from(
            'desakelating027@gmail.com',
            'Pelayanan Surat Desa'
        );

        $this->email->to(
            $pengajuan['email']
        );

        $this->email->subject(
            'Pengajuan Surat Selesai'
        );

        $pesan = '
            Halo <b>'.$pengajuan['name'].'</b>,<br><br>

            Pengajuan surat <b>'.$pengajuan['nama_surat'].'</b>
            telah selesai diproses.<br><br>

            Anda dapat login ke Sistem Pelayanan Desa untuk melihat dan mengunduh salinan surat dalam format PDF.<br><br>

            Untuk mengambil surat asli yang telah ditandatangani dan distempel, silakan datang ke Kantor Desa Kelating pada jam pelayanan.<br><br>

            Terima kasih.<br><br>

            <b>Pelayanan Surat Desa Kelating</b>
        ';

        $this->email->message($pesan);

if(!$this->email->send())
{
    log_message(
        'error',
        $this->email->print_debugger()
    );
}
    }

    $this->session->set_flashdata(
        'success',
        'Data pengajuan berhasil diperbarui'
    );

    redirect(
        'surat/Pengajuan_admin/detail/'.$id
    );
}
public function download($id)
{
    $file = $this->Pengajuan_model->getFileById($id);

    $this->load->helper('download');

    force_download(
        './uploads/persyaratan/'.$file['nama_file'],
        NULL
    );
}
}