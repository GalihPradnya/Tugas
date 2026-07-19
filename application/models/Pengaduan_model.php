<?php

class Pengaduan_model extends CI_Model
{
    public function simpan($data)
    {
        return $this->db->insert('pengaduan', $data);
    }

    public function getAll()
    {
        $this->db->select('
            pengaduan.*,
            kategori_pengaduan.nama_kategori
        ');

        $this->db->from('pengaduan');

        $this->db->join(
            'kategori_pengaduan',
            'kategori_pengaduan.id = pengaduan.kategori_id'
        );

        $this->db->order_by('created_at', 'DESC');

        return $this->db->get()->result_array();
    }
    public function getById($id)
{
    $this->db->select('
        pengaduan.*,
        kategori_pengaduan.nama_kategori
    ');

    $this->db->from('pengaduan');

    $this->db->join(
        'kategori_pengaduan',
        'kategori_pengaduan.id = pengaduan.kategori_id'
    );

    $this->db->where('pengaduan.id', $id);

    return $this->db->get()->row_array();
}
public function getPengaduanByUser($user_id)
{
    $this->db->select('
        pengaduan.*,
        kategori_pengaduan.nama_kategori
    ');

    $this->db->from('pengaduan');

    $this->db->join(
        'kategori_pengaduan',
        'kategori_pengaduan.id = pengaduan.kategori_id'
    );

    $this->db->where('pengaduan.user_id', $user_id);

    $this->db->order_by('created_at', 'DESC');

    return $this->db->get()->result_array();
}

public function getDetailPengaduan($id)
{
    $this->db->select('
        pengaduan.*,
        kategori_pengaduan.nama_kategori
    ');

    $this->db->from('pengaduan');

    $this->db->join(
        'kategori_pengaduan',
        'kategori_pengaduan.id = pengaduan.kategori_id'
    );

    $this->db->where('pengaduan.id', $id);

    return $this->db->get()->row_array();
}
}