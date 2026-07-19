<?php

class Kategori_pengaduan_model extends CI_Model
{
    public function getAktif()
    {
        return $this->db
            ->get_where(
                'kategori_pengaduan',
                ['status' => 'aktif']
            )
            ->result_array();
    }
}