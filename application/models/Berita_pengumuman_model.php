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

}