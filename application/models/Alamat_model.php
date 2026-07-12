<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat_model extends CI_Model
{
    private $table = 'alamat';

    public function getAll()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->get($this->table)
            ->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getById($id)
    {
        return $this->db
            ->get_where($this->table, ['id' => $id])
            ->row_array();
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }

    public function getAktif()
    {
        return $this->db
            ->where('status', 'aktif')
            ->get($this->table)
            ->result_array();
    }
}