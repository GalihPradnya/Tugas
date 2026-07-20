<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function jumlahPengajuan()
    {
        return $this->db->count_all('pengajuan');
    }


    public function jumlahPengaduan()
    {
        return $this->db->count_all('pengaduan');
    }


    public function jumlahPendatang()
    {
        return $this->db->count_all('warga_pendatang');
    }

}