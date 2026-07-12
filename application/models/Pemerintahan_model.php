<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemerintahan_model extends CI_Model
{

    // ===========================
    // KEPALA DESA
    // ===========================

    public function getKepalaDesa()
    {
        return $this->db->get('kepala_desa')->row();
    }

    public function updateKepalaDesa($data)
    {
        return $this->db->update('kepala_desa', $data);
    }


    // ===========================
    // PERANGKAT DESA
    // ===========================

    public function getPerangkatDesa()
    {
        return $this->db
                    ->order_by('urutan', 'ASC')
                    ->get('perangkat_desa')
                    ->result();
    }

    public function getPerangkatById($id)
    {
        return $this->db
                    ->get_where('perangkat_desa', ['id' => $id])
                    ->row();
    }

    public function tambahPerangkat($data)
    {
        return $this->db->insert('perangkat_desa', $data);
    }

    public function updatePerangkat($id, $data)
    {
        return $this->db
                    ->where('id', $id)
                    ->update('perangkat_desa', $data);
    }

    public function hapusPerangkat($id)
    {
        return $this->db
                    ->where('id', $id)
                    ->delete('perangkat_desa');
    }


    // ===========================
    // LEMBAGA DESA
    // ===========================

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

    // Alias supaya cocok dengan controller
    public function getLembaga()
    {
        return $this->getLembagaDesa();
    }

    public function tambahLembaga($data)
    {
        return $this->db->insert('lembaga_desa', $data);
    }

    public function updateLembaga($id, $data)
    {
        return $this->db
                    ->where('id', $id)
                    ->update('lembaga_desa', $data);
    }

    public function hapusLembaga($id)
    {
        // hapus semua anggota lembaga
        $this->db
             ->where('lembaga_id', $id)
             ->delete('anggota_lembaga');

        // hapus lembaga
        return $this->db
                    ->where('id', $id)
                    ->delete('lembaga_desa');
    }


    // ===========================
    // ANGGOTA LEMBAGA
    // ===========================

    public function tambahAnggota($data)
    {
        return $this->db->insert('anggota_lembaga', $data);
    }

    public function updateAnggota($id, $data)
    {
        return $this->db
                    ->where('id', $id)
                    ->update('anggota_lembaga', $data);
    }

    public function hapusAnggota($id)
    {
        return $this->db
                    ->where('id', $id)
                    ->delete('anggota_lembaga');
    }

}