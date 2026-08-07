
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Penduduk_model');
        $this->load->library('form_validation');
        $this->load->model('Logo_profil_model');
    }


    // ==========================
    // READ DATA
    // ==========================
    public function index()
    {

        $data['title'] = "Data Penduduk";
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();
        $data['penduduk'] =
        $this->Penduduk_model->getAllPenduduk();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Penduduk/index', $data);
        $this->load->view('templates/footer', $data);

    }



    // ==========================
    // CREATE
    // ==========================
    public function tambah()
    {

        $data['title']="Tambah Penduduk";
        $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();

if($this->input->post())
{

    $cek = $this->Penduduk_model->getPendudukByNik(
        $this->input->post('nik')
    );


    if($cek)
    {

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger">
            NIK sudah terdaftar!
            </div>'
        );


        redirect('penduduk/penduduk/tambah');

    }


            $dataPenduduk=[

                'nik'=>$this->input->post('nik'),

                'nama_lengkap'=>
                $this->input->post('nama_lengkap'),

                'tempat_lahir'=>
                $this->input->post('tempat_lahir'),

                'tanggal_lahir'=>
                $this->input->post('tanggal_lahir'),

                'jenis_kelamin'=>
                $this->input->post('jenis_kelamin'),

                'alamat'=>
                $this->input->post('alamat'),

                'rt'=>
                $this->input->post('rt'),

                'rw'=>
                $this->input->post('rw'),

                'agama'=>
                $this->input->post('agama'),

                'pekerjaan'=>
                $this->input->post('pekerjaan'),

                'status_perkawinan'=>
                $this->input->post('status_perkawinan')

            ];



            // simpan penduduk

            $this->Penduduk_model
                 ->insert($dataPenduduk);



            $penduduk_id =
            $this->db->insert_id();



            // buat akun otomatis

            $this->db->insert(
                'user',
                [

                'penduduk_id'=>$penduduk_id,

                'name'=>
                $this->input->post('nama_lengkap'),

                'email'=>NULL,

                'image'=>'default.jpg',

                'password'=>
                password_hash(
                    $this->input->post('nik'),
                    PASSWORD_DEFAULT
                ),

                'role_id'=>3,

                'is_active'=>1,

                'date_created'=>time()

                ]
            );

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                Data penduduk berhasil ditambahkan.
                <br>
                Akun login berhasil dibuat.
                </div>'
            );

            redirect('penduduk/penduduk');



redirect('penduduk/penduduk');

        }



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Penduduk/tambah_penduduk.php', $data);
        $this->load->view('templates/footer', $data);

    }



    // ==========================
    // EDIT
    // ==========================

    public function edit($id)
{

    $data['title'] = "Edit Penduduk";
    $data['logoDesa'] = $this->Logo_profil_model->getLogoDesa();


    $data['penduduk'] =
        $this->Penduduk_model->getPendudukById($id);



    if(!$data['penduduk'])
    {
        redirect('penduduk/penduduk');
    }



    $this->form_validation->set_rules(
        'nik',
        'NIK',
        'required'
    );


    $this->form_validation->set_rules(
        'nama_lengkap',
        'Nama Lengkap',
        'required'
    );



    if($this->form_validation->run() == false)
    {

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Penduduk/edit_penduduk.php', $data);
        $this->load->view('templates/footer', $data);

    }

    else
    {


        $dataUpdate = [

            'nik' =>
            $this->input->post('nik'),


            'nama_lengkap' =>
            $this->input->post('nama_lengkap'),


            'tempat_lahir' =>
            $this->input->post('tempat_lahir'),


            'tanggal_lahir' =>
            $this->input->post('tanggal_lahir'),


            'jenis_kelamin' =>
            $this->input->post('jenis_kelamin'),


            'alamat' =>
            $this->input->post('alamat'),


            'rt' =>
            $this->input->post('rt'),


            'rw' =>
            $this->input->post('rw'),


            'agama' =>
            $this->input->post('agama'),


            'pekerjaan' =>
            $this->input->post('pekerjaan'),


            'status_perkawinan' =>
            $this->input->post('status_perkawinan')

        ];



        $this->Penduduk_model
             ->update(
                $id,
                $dataUpdate
             );



        // update nama user juga

        $this->db->where(
            'penduduk_id',
            $id
        );


        $this->db->update(
            'user',
            [
                'name'=>$this->input->post('nama_lengkap')
            ]
        );



        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
            Data penduduk berhasil diperbarui.
            </div>'
        );


        redirect('penduduk/penduduk');


    }}

    // ==========================
    // DELETE
    // ==========================

    public function hapus($id)
{
    // Cek data penduduk
    $penduduk = $this->Penduduk_model->getPendudukById($id);

    if (!$penduduk) {
        redirect('penduduk/penduduk');
    }

    $this->db->trans_start();

    // Cari user berdasarkan penduduk
    $user = $this->db->get_where('user', [
        'penduduk_id' => $id
    ])->row();

    if ($user) {

        // Hapus semua laporan pendatang milik user
        $this->db->delete('laporan_pendatang', [
            'user_id' => $user->id
        ]);

        // Hapus user
        $this->db->delete('user', [
            'id' => $user->id
        ]);
    }

    // Hapus penduduk
    $this->Penduduk_model->delete($id);

    $this->db->trans_complete();

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
        Data penduduk beserta akun user berhasil dihapus.
        </div>'
    );

    redirect('penduduk/penduduk');
}
    public function akun()
{

    $data['title'] = "Akun Penduduk";

    $data['logoDesa'] =
    $this->Logo_profil_model->getLogoDesa();


    $data['akun'] =
    $this->Penduduk_model->getAllUserPenduduk();



    $this->load->view('templates/header',$data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/topbar',$data);
    $this->load->view('Penduduk/akun',$data);
    $this->load->view('templates/footer',$data);

}
public function reset_password($id)
{

    // ambil data user + penduduk

    $this->db->select('
        user.id,
        penduduk.nik,
        penduduk.nama_lengkap
    ');

    $this->db->from('user');

    $this->db->join(
        'penduduk',
        'penduduk.id = user.penduduk_id'
    );

    $this->db->where(
        'user.id',
        $id
    );


    $user = $this->db->get()->row_array();



    if(!$user)
    {

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger">
            Akun tidak ditemukan.
            </div>'
        );


        redirect('penduduk/penduduk/akun');

    }



    // reset password menjadi NIK

    $password = password_hash(
        $user['nik'],
        PASSWORD_DEFAULT
    );



    $this->db->where(
        'id',
        $id
    );


    $this->db->update(
        'user',
        [
            'password'=>$password
        ]
    );



    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
        Password akun '.$user['nama_lengkap'].' berhasil direset.
        <br>
        Password baru: NIK penduduk.
        </div>'
    );



    redirect('penduduk/penduduk/akun');

}
public function cetak()
{
    $data['penduduk'] = $this->Penduduk_model->getAllPenduduk();

    $this->load->view('Penduduk/print_semua',$data);
}
public function cetakUmur($umur = '')
{
    if (empty($umur) || strpos($umur, '-') === false) {
        show_error('Rentang umur tidak valid.');
    }

    $batas = explode('-', $umur);

    $min = (int)$batas[0];
    $max = (int)$batas[1];

    $data['penduduk'] = $this->Penduduk_model->getPendudukByUmur($min, $max);

    $this->load->view('Penduduk/print_umur', $data);
}
}