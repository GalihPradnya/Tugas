<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_pengumuman_model extends CI_Model
{

    // ==========================
    // BERITA
    // ==========================

    public function getBerita()
    {
        return $this->db
            ->where('status', 'publish')
            ->order_by('tanggal', 'DESC')
            ->get('berita')
            ->result();
    }

    public function getBeritaById($id)
    {
        return $this->db
            ->where('id_berita', $id)
            ->where('status', 'publish')
            ->get('berita')
            ->row();
    }

    // ==========================
    // PENGUMUMAN
    // ==========================

    public function getPengumuman()
    {
        return $this->db
            ->where('status', 'publish')
            ->order_by('tanggal', 'DESC')
            ->get('pengumuman')
            ->result();
    }

    public function getPengumumanById($id)
    {
        return $this->db
            ->where('id_pengumuman', $id)
            ->where('status', 'publish')
            ->get('pengumuman')
            ->row();
    }

    // ==========================
    // KOMENTAR BERITA
    // ==========================

    public function getKomentar($id_berita)
    {
        return $this->db
            ->where('id_berita', $id_berita)
            ->where('status', 'aktif')
            ->order_by('tanggal', 'DESC')
            ->get('komentar_berita')
            ->result();
    }

    public function tambahKomentar($data)
    {
        return $this->db->insert('komentar_berita', $data);
    }

    // ==========================
    // CRUD BERITA (ADMIN)
    // ==========================

    public function getAllBerita()
    {
        return $this->db
            ->order_by('tanggal', 'DESC')
            ->get('berita')
            ->result();
    }

    public function insertBerita($data)
    {
        return $this->db->insert('berita', $data);
    }

    public function updateBerita($id, $data)
    {
        return $this->db
            ->where('id_berita', $id)
            ->update('berita', $data);
    }

    public function deleteBerita($id)
    {
        // hapus gambar jika ada
        $berita = $this->db
            ->where('id_berita', $id)
            ->get('berita')
            ->row();

        if ($berita && !empty($berita->gambar)) {

            $file = FCPATH . 'uploads/berita/' . $berita->gambar;

            if (file_exists($file)) {
                unlink($file);
            }
        }

        return $this->db
            ->where('id_berita', $id)
            ->delete('berita');
    }

    // ==========================
// CRUD PENGUMUMAN (ADMIN)
// ==========================

public function getAllPengumuman()
{
    return $this->db
        ->order_by('tanggal', 'DESC')
        ->get('pengumuman')
        ->result();
}

public function getPengumumanByIdAdmin($id)
{
    return $this->db
        ->where('id_pengumuman', $id)
        ->get('pengumuman')
        ->row();
}

public function insertPengumuman($data)
{
    return $this->db->insert('pengumuman', $data);
}

public function updatePengumuman($id, $data)
{
    return $this->db
        ->where('id_pengumuman', $id)
        ->update('pengumuman', $data);
}

public function deletePengumuman($id)
{
    $pengumuman = $this->db
        ->where('id_pengumuman', $id)
        ->get('pengumuman')
        ->row();

    if ($pengumuman && !empty($pengumuman->gambar)) {

        $file = FCPATH . 'uploads/pengumuman/' . $pengumuman->gambar;

        if (file_exists($file)) {
            unlink($file);
        }
    }

    return $this->db
        ->where('id_pengumuman', $id)
        ->delete('pengumuman');
}

public function countBeritaPublish()
{
    return $this->db
        ->where('status', 'publish')
        ->count_all_results('berita');
}

public function getBeritaPagination($limit, $start)
{
    return $this->db
        ->where('status', 'publish')
        ->order_by('tanggal', 'DESC')
        ->limit($limit, $start)
        ->get('berita')
        ->result();
}

public function getBeritaLimit($limit)
{
    $this->db->order_by('tanggal','DESC');
    $this->db->limit($limit);

    return $this->db
                ->get('berita')
                ->result();
}



public function getPengumumanLimit($limit)
{
    $this->db->order_by('tanggal','DESC');
    $this->db->limit($limit);

    return $this->db
                ->get('pengumuman')
                ->result();
}

}