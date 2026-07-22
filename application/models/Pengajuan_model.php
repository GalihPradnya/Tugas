<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{


    // ==========================
    // JENIS SURAT
    // ==========================
    public function getJenisSurat()
    {

        return $this->db
            ->where('status','aktif')
            ->get('jenis_surat')
            ->result_array();

    }



    // ==========================
    // PERSYARATAN SURAT
    // ==========================
    public function getPersyaratanBySurat($id)
    {

        $this->db->select('
            persyaratan.id,
            persyaratan.nama_persyaratan
        ');


        $this->db->from('persyaratan_surat');


        $this->db->join(
            'persyaratan',
            'persyaratan.id = persyaratan_surat.persyaratan_id'
        );


        $this->db->where(
            'persyaratan_surat.jenis_surat_id',
            $id
        );


        return $this->db
            ->get()
            ->result_array();

    }




    // ==========================
    // SIMPAN PENGAJUAN
    // ==========================
    public function simpan($data)
    {

        $this->db->insert(
            'pengajuan',
            $data
        );


        return $this->db->insert_id();

    }





    // ==========================
    // SIMPAN FILE
    // ==========================
    public function simpanFile($data)
    {

        return $this->db->insert(
            'pengajuan_file',
            $data
        );

    }






    // ==========================
    // SEMUA DATA PENGAJUAN ADMIN
    // ==========================
   public function getAllPengajuan()
{

    $this->db->select('

        pengajuan.*,

        jenis_surat.nama_surat,


        penduduk.nik,

        penduduk.nama_lengkap,

        penduduk.alamat,


        user.email

    ');


    $this->db->from('pengajuan');



    // jenis surat
    $this->db->join(
        'jenis_surat',
        'jenis_surat.id = pengajuan.jenis_surat_id'
    );



    // akun user
    $this->db->join(
        'user',
        'user.id = pengajuan.user_id',
        'left'
    );



    // data penduduk
    $this->db->join(
        'penduduk',
        'penduduk.id = pengajuan.penduduk_id',
        'left'
    );



    $this->db->order_by(
        'pengajuan.created_at',
        'DESC'
    );



    return $this->db
        ->get()
        ->result_array();

}







    // ==========================
    // DETAIL PENGAJUAN
    // ==========================
   public function getDetailPengajuan($id)
{

    $this->db->select('

        pengajuan.*,

        jenis_surat.nama_surat,


        user.email,


        penduduk.nik,
        penduduk.nama_lengkap,
        penduduk.tempat_lahir,
        penduduk.tanggal_lahir,
        penduduk.jenis_kelamin,
        penduduk.alamat,
        penduduk.rt,
        penduduk.rw,
        penduduk.agama,
        penduduk.pekerjaan,
        penduduk.status_perkawinan

    ');


    $this->db->from('pengajuan');


    // jenis surat
    $this->db->join(
        'jenis_surat',
        'jenis_surat.id = pengajuan.jenis_surat_id'
    );


    // email akun
    $this->db->join(
        'user',
        'user.id = pengajuan.user_id',
        'left'
    );


    // data penduduk
    $this->db->join(
        'penduduk',
        'penduduk.id = pengajuan.penduduk_id',
        'left'
    );


    $this->db->where(
        'pengajuan.id',
        $id
    );


    return $this->db->get()->row_array();

}







    // ==========================
    // FILE PERSYARATAN
    // ==========================
    public function getFilePengajuan($id)
    {


        $this->db->select('

            pengajuan_file.*,

            persyaratan.nama_persyaratan

        ');



        $this->db->from('pengajuan_file');



        $this->db->join(
            'persyaratan',
            'persyaratan.id = pengajuan_file.persyaratan_id'
        );



        $this->db->where(
            'pengajuan_file.pengajuan_id',
            $id
        );



        return $this->db
            ->get()
            ->result_array();


    }







    // ==========================
    // UPDATE PENGAJUAN
    // ==========================
    public function updatePengajuan($id,$data)
    {


        $this->db->where(
            'id',
            $id
        );


        return $this->db->update(
            'pengajuan',
            $data
        );


    }






    // ==========================
    // AMBIL FILE BERDASARKAN ID
    // ==========================
    public function getFileById($id)
    {


        return $this->db
            ->where(
                'id',
                $id
            )
            ->get('pengajuan_file')
            ->row_array();


    }







    // ==========================
    // SURAT SAYA
    // ==========================
    public function getSuratByUser($user_id)
    {


        $this->db->select('

            pengajuan.*,

            jenis_surat.nama_surat,


            penduduk.nik,

            penduduk.nama_lengkap


        ');



        $this->db->from('pengajuan');



        $this->db->join(
            'jenis_surat',
            'jenis_surat.id = pengajuan.jenis_surat_id'
        );



        $this->db->join(
            'penduduk',
            'penduduk.id = pengajuan.penduduk_id',
            'left'
        );



        $this->db->where(
            'pengajuan.user_id',
            $user_id
        );



        $this->db->order_by(
            'pengajuan.id',
            'DESC'
        );



        return $this->db
            ->get()
            ->result_array();


    }







    // ==========================
    // DATA UNTUK EMAIL
    // ==========================
    public function getPengajuanById($id)
    {


        $this->db->select('

            pengajuan.*,


            jenis_surat.nama_surat,


            user.email,


            penduduk.nama_lengkap,

            penduduk.nik


        ');



        $this->db->from('pengajuan');



        $this->db->join(
            'jenis_surat',
            'jenis_surat.id = pengajuan.jenis_surat_id'
        );



        $this->db->join(
            'user',
            'user.id = pengajuan.user_id',
            'left'
        );



        $this->db->join(
            'penduduk',
            'penduduk.id = pengajuan.penduduk_id',
            'left'
        );



        $this->db->where(
            'pengajuan.id',
            $id
        );



        return $this->db
            ->get()
            ->row_array();


    }
    public function cekPengajuanAktif($penduduk_id, $jenis_surat_id)
{

    return $this->db
        ->where('penduduk_id', $penduduk_id)
        ->where('jenis_surat_id', $jenis_surat_id)
        ->where_in(
            'status',
            [
                'Menunggu',
                'Diproses'
            ]
        )
        ->get('pengajuan')
        ->row_array();

}


}