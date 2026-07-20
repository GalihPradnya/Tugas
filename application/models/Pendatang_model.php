<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendatang_model extends CI_Model
{
    public function simpan($data)
    {
        return $this->db->insert('warga_pendatang', $data);
    }

    public function getAll()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->get('warga_pendatang')
            ->result_array();
    }

    public function getById($id)
    {
        return $this->db
            ->get_where('warga_pendatang', ['id' => $id])
            ->row_array();
    }

    public function getByUser($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->order_by('id', 'DESC')
            ->get('warga_pendatang')
            ->result_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('warga_pendatang', $data);
    }
}