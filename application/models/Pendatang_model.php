<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendatang_model extends CI_Model
{

    private $table = 'penduduk_pendatang';

    // ==========================
    // Ambil semua data pendatang
    // ==========================
    public function getAll()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->get($this->table)
            ->result_array();
    }

    // ==========================
    // Ambil data berdasarkan ID
    // ==========================
    public function getById($id)
    {
        return $this->db
            ->get_where(
                $this->table,
                [
                    'id' => $id
                ]
            )
            ->row_array();
    }

    // ==========================
    // Tambah data
    // ==========================
    public function insert($data)
    {
        return $this->db->insert(
            $this->table,
            $data
        );
    }

    // ==========================
    // Edit data
    // ==========================
    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update(
                $this->table,
                $data
            );
    }

    // ==========================
    // Hapus data
    // ==========================
    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }

    // ==========================
    // Cetak / Filter berdasarkan alamat tinggal
    // ==========================
    public function getPendatangByAlamat($alamat)
    {
        return $this->db
            ->where('alamat_tinggal', $alamat)
            ->order_by('id', 'DESC')
            ->get($this->table)
            ->result_array();
    }

    // ==========================
    // Ambil daftar alamat tinggal
    // (untuk dropdown filter)
    // ==========================
    public function getAlamatTinggal()
    {
        return $this->db
            ->select('alamat_tinggal')
            ->distinct()
            ->where('alamat_tinggal IS NOT NULL', NULL, FALSE)
            ->where('alamat_tinggal !=', '')
            ->order_by('alamat_tinggal', 'ASC')
            ->get($this->table)
            ->result_array();
    }
    // ==========================
    // Cek berdasarkan NIK
    // ==========================
        public function getByNik($nik)
        {
            return $this->db
                ->where('nik', $nik)
                ->get($this->table)
                ->row_array();
                echo "<pre>";
                print_r($cekNik);
                exit;
        }

}