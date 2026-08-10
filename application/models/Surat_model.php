<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model
{
    private $table = 'surat';
    private $detail = 'surat_detail';


    // ==========================================================
    // SIMPAN SURAT
    // ==========================================================

    public function insertSurat($data)
    {
        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }


    // ==========================================================
    // SIMPAN DETAIL SURAT
    // ==========================================================

    public function insertDetail($data)
    {
        return $this->db->insert(
            $this->detail,
            $data
        );
    }


    // ==========================================================
    // AMBIL SURAT BERDASARKAN ID
    // ==========================================================

    public function getSurat($id)
    {
        return $this->db
            ->where('id', $id)
            ->get($this->table)
            ->row_array();
    }


    public function getById($id)
    {
        return $this->db
            ->where('id', $id)
            ->get($this->table)
            ->row_array();
    }


    // ==========================================================
    // AMBIL DETAIL SURAT
    // ==========================================================

    public function getDetail($surat_id)
    {
        return $this->db
            ->where('surat_id', $surat_id)
            ->get($this->detail)
            ->result_array();
    }


    // ==========================================================
    // UPDATE SURAT
    // ==========================================================

    public function updateSurat($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update(
                $this->table,
                $data
            );
    }


    // ==========================================================
    // HAPUS DETAIL SURAT
    // ==========================================================

    public function deleteDetail($surat_id)
    {
        return $this->db
            ->where('surat_id', $surat_id)
            ->delete($this->detail);
    }


    // ==========================================================
    // FIELD BERDASARKAN JENIS SURAT
    // ==========================================================

    public function getFieldByJenisSurat($jenis_surat_id)
    {
        return $this->db
            ->where(
                'jenis_surat_id',
                $jenis_surat_id
            )
            ->order_by(
                'urutan',
                'ASC'
            )
            ->get('jenis_surat_field')
            ->result_array();
    }


    // ==========================================================
    // SURAT BERDASARKAN PENGAJUAN
    // ==========================================================

    public function getByPengajuan($pengajuan_id)
    {
        return $this->db
            ->where(
                'pengajuan_id',
                $pengajuan_id
            )
            ->get($this->table)
            ->row_array();
    }
}