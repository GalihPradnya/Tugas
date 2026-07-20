<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin_model extends CI_Model
{

    public function jumlahUser()
    {
        return $this->db->count_all('user');
    }


    public function jumlahAdmin()
    {
        return $this->db
            ->where('role_id', 2)
            ->count_all_results('user');
    }


    public function jumlahRole()
    {
        return $this->db->count_all('user_role');
    }


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