<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('persyaratan')->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('persyaratan', $data);
    }

    public function delete($id)
    {
        $this->db->delete('persyaratan', ['id'=>$id]);
    }
}