<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemerintahan_model extends CI_Model
{
    // Mengambil data Kepala Desa
    public function getKepalaDesa()
    {
        return $this->db->get('kepala_desa')->row();
    }

    // Mengambil data Perangkat Desa
    public function getPerangkatDesa()
    {
        return $this->db->order_by('urutan', 'ASC')->get('perangkat_desa')->result();
    }
}