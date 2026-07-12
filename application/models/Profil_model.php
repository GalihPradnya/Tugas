<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model
{

    // Mengambil data profil desa
    public function getProfil()
    {
        return $this->db->get('profil_desa')->row();
    }

    // Mengambil semua data misi
    public function getMisi()
    {
        return $this->db
                    ->order_by('urutan','ASC')
                    ->get('misi_desa')
                    ->result();
    }

    // Update profil desa
    public function updateProfil($id, $data)
    {
        return $this->db
                    ->where('id', $id)
                    ->update('profil_desa', $data);
    }

    // Tambah misi
    public function tambahMisi($data)
    {
        return $this->db->insert('misi_desa', $data);
    }

    // Ambil satu misi
    public function getMisiById($id)
    {
        return $this->db
                    ->where('id', $id)
                    ->get('misi_desa')
                    ->row();
    }

    // Update misi
    public function updateMisi($id, $data)
    {
        return $this->db
                    ->where('id', $id)
                    ->update('misi_desa', $data);
    }

    // Hapus misi
    public function hapusMisi($id)
    {
        return $this->db
                    ->where('id', $id)
                    ->delete('misi_desa');
    }

}