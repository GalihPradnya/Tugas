<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function jumlahPengajuan()
    {
        return $this->db
            ->count_all('pengajuan');
    }


    public function jumlahPengaduan()
    {
        return $this->db
            ->count_all('pengaduan');
    }


    public function jumlahPendatang()
    {
        return $this->db
            ->count_all('penduduk_pendatang');
    }


    public function jumlahPenduduk()
    {
        return $this->db
            ->count_all('penduduk');
    }


    public function jumlahLaporanPendatang()
    {
        return $this->db
            ->count_all('laporan_pendatang');
    }
    public function jumlahAkun()
{
    return $this->db
        ->where('role_id', 3)
        ->count_all_results('user');
}

}