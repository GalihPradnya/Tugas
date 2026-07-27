<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pendatang_model extends CI_Model
{

    // Simpan laporan
    public function insert($data)
    {
        return $this->db->insert('laporan_pendatang', $data);
    }

    // Semua laporan (Admin)
    public function getAll()
    {
        return $this->db
            ->select('laporan_pendatang.*, user.name')
            ->from('laporan_pendatang')
            ->join('user', 'user.id = laporan_pendatang.user_id')
            ->order_by('laporan_pendatang.id', 'DESC')
            ->get()
            ->result_array();
    }

    // Riwayat laporan milik user
    public function getByUser($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->order_by('created_at', 'DESC')
            ->get('laporan_pendatang')
            ->result_array();
    }

    // Detail laporan
    public function getById($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('laporan_pendatang')
            ->row_array();
    }

    // Update laporan
    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('laporan_pendatang', $data);
    }

    // Hapus laporan
    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('laporan_pendatang');
    }

    // Hitung jumlah laporan
    public function countAll()
    {
        return $this->db->count_all('laporan_pendatang');
    }

    // Hitung laporan berdasarkan status
    public function countByStatus($status)
    {
        return $this->db
            ->where('status', $status)
            ->count_all_results('laporan_pendatang');
    }

}