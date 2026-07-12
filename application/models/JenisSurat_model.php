<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisSurat_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('jenis_surat')->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('jenis_surat', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('jenis_surat', $data);
    }

    public function delete($id)
    {
        $this->db->delete('jenis_surat', ['id' => $id]);
    }
}