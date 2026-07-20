<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logo_profil_model extends CI_Model
{
    public function getLogoDesa()
    {
        return $this->db
            ->get('logo_profil')
            ->row_array();
    }

    public function updateProfil($data)
    {
        $this->db->where('id', 1);

        return $this->db->update(
            'logo_profil',
            $data
        );
    }
}