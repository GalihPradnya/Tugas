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

    // Mengambil data Lembaga Desa
    public function getLembagaDesa()
{
    $lembaga = $this->db
        ->order_by('urutan', 'ASC')
        ->get('lembaga_desa')
        ->result();

    foreach ($lembaga as $item) {
        $item->anggota = $this->db
            ->where('lembaga_id', $item->id)
            ->order_by('urutan', 'ASC')
            ->get('anggota_lembaga')
            ->result();
    }

    return $lembaga;
}
}