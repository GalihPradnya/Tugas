<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendatang_model extends CI_Model
{

    private $table = 'penduduk_pendatang';



    // Ambil semua data pendatang
    public function getAll()
    {
        return $this->db
            ->order_by('id','DESC')
            ->get($this->table)
            ->result_array();
    }



    // Ambil berdasarkan ID
    public function getById($id)
    {
        return $this->db
            ->get_where(
                $this->table,
                [
                    'id'=>$id
                ]
            )
            ->row_array();
    }



    // Tambah data
    public function insert($data)
    {
        return $this->db
            ->insert(
                $this->table,
                $data
            );
    }



    // Edit data
    public function update($id,$data)
    {
        return $this->db
            ->where(
                'id',
                $id
            )
            ->update(
                $this->table,
                $data
            );
    }



    // Hapus data
    public function delete($id)
    {
        return $this->db
            ->where(
                'id',
                $id
            )
            ->delete(
                $this->table
            );
    }


}