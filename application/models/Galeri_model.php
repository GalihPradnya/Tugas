<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model
{

    // ==========================
    // FRONTEND & ADMIN
    // ==========================

    public function getGaleri()
    {
        return $this->db
            ->order_by('urutan', 'ASC')
            ->order_by('tanggal', 'DESC')
            ->get('galeri')
            ->result();
    }

    // ==========================
    // FRONTEND
    // ==========================

    public function getGaleriPublish()
    {
        return $this->db
            ->where('status', 'publish')
            ->order_by('urutan', 'ASC')
            ->order_by('tanggal', 'DESC')
            ->get('galeri')
            ->result();
    }

    // ==========================
    // DETAIL
    // ==========================

    public function getById($id)
    {
        return $this->db
            ->where('id_galeri', $id)
            ->get('galeri')
            ->row();
    }

    // ==========================
    // INSERT
    // ==========================

    public function insert($data)
    {
        return $this->db->insert('galeri', $data);
    }

    // ==========================
    // UPDATE
    // ==========================

    public function update($id, $data)
    {
        return $this->db
            ->where('id_galeri', $id)
            ->update('galeri', $data);
    }

    // ==========================
    // DELETE
    // ==========================

    public function delete($id)
    {
        return $this->db
            ->where('id_galeri', $id)
            ->delete('galeri');
    }

}