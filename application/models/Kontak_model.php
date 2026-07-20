<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model
{
    public function getKontak()
    {
        return $this->db
                    ->get('kontak_desa')
                    ->row_array();
    }

    public function updateKontak($data)
    {
        $this->db->where('id', 1);

        return $this->db->update(
            'kontak_desa',
            $data
        );
    }
}