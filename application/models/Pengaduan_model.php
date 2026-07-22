<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_model extends CI_Model
{


    // SIMPAN PENGADUAN
    public function simpan($data)
    {
        return $this->db->insert(
            'pengaduan',
            $data
        );
    }





    // DATA SEMUA PENGADUAN ADMIN
    public function getAll()
{

    $this->db->select('
        pengaduan.*,

        kategori_pengaduan.nama_kategori,

        penduduk.nik,
        penduduk.nama_lengkap,

        user.email
    ');


    $this->db->from('pengaduan');


    $this->db->join(
        'kategori_pengaduan',
        'kategori_pengaduan.id = pengaduan.kategori_id'
    );


    $this->db->join(
        'penduduk',
        'penduduk.id = pengaduan.penduduk_id',
        'left'
    );


    $this->db->join(
        'user',
        'user.id = pengaduan.user_id',
        'left'
    );


    $this->db->order_by(
        'pengaduan.created_at',
        'DESC'
    );


    return $this->db->get()->result_array();

}








    // DETAIL PENGADUAN ADMIN
    public function getById($id)
    {

        $this->db->select('

            pengaduan.*,

            kategori_pengaduan.nama_kategori,


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


            user.email


        ');



        $this->db->from('pengaduan');



        $this->db->join(
            'kategori_pengaduan',
            'kategori_pengaduan.id = pengaduan.kategori_id'
        );



        $this->db->join(
            'user',
            'user.id = pengaduan.user_id',
            'left'
        );



        $this->db->join(
            'penduduk',
            'penduduk.id = pengaduan.penduduk_id',
            'left'
        );



        $this->db->where(
            'pengaduan.id',
            $id
        );


        return $this->db
            ->get()
            ->row_array();

    }








    // PENGADUAN MILIK USER
    public function getPengaduanByUser($user_id)
    {

        $this->db->select('

            pengaduan.*,

            kategori_pengaduan.nama_kategori,


            penduduk.nik,

            penduduk.nama_lengkap

        ');



        $this->db->from('pengaduan');



        $this->db->join(
            'kategori_pengaduan',
            'kategori_pengaduan.id = pengaduan.kategori_id'
        );



        $this->db->join(
            'penduduk',
            'penduduk.id = pengaduan.penduduk_id',
            'left'
        );



        $this->db->where(
            'pengaduan.user_id',
            $user_id
        );



        $this->db->order_by(
            'pengaduan.created_at',
            'DESC'
        );


        return $this->db
            ->get()
            ->result_array();

    }







    // DETAIL PENGADUAN USER
    public function getDetailPengaduan($id)
    {

        $this->db->select('

            pengaduan.*,

            kategori_pengaduan.nama_kategori,


            penduduk.nik,

            penduduk.nama_lengkap,

            penduduk.alamat,


            user.email


        ');



        $this->db->from('pengaduan');



        $this->db->join(
            'kategori_pengaduan',
            'kategori_pengaduan.id = pengaduan.kategori_id'
        );



        $this->db->join(
            'user',
            'user.id = pengaduan.user_id',
            'left'
        );



        $this->db->join(
            'penduduk',
            'penduduk.id = pengaduan.penduduk_id',
            'left'
        );



        $this->db->where(
            'pengaduan.id',
            $id
        );


        return $this->db
            ->get()
            ->row_array();

    }



public function updatePengaduan($id,$data)
{

    $this->db->where(
        'id',
        $id
    );


    return $this->db->update(
        'pengaduan',
        $data
    );

}
public function getDetailPengaduanUser($id,$user_id)
{

    $this->db->select('

        pengaduan.*,

        kategori_pengaduan.nama_kategori,

        penduduk.nik,

        penduduk.nama_lengkap,

        penduduk.alamat,

        user.email

    ');


    $this->db->from('pengaduan');


    $this->db->join(
        'kategori_pengaduan',
        'kategori_pengaduan.id = pengaduan.kategori_id'
    );


    $this->db->join(
        'penduduk',
        'penduduk.id = pengaduan.penduduk_id',
        'left'
    );


    $this->db->join(
        'user',
        'user.id = pengaduan.user_id',
        'left'
    );


    $this->db->where(
        'pengaduan.id',
        $id
    );


    $this->db->where(
        'pengaduan.user_id',
        $user_id
    );


    return $this->db
        ->get()
        ->row_array();

}
}