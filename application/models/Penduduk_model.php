<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk_model extends CI_Model
{
    private $table = 'penduduk';

    public function getAllPenduduk()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getPendudukById($id)
    {
        return $this->db
            ->get_where($this->table, ['id' => $id])
            ->row_array();
    }

    public function getPendudukByNik($nik)
    {
        return $this->db
            ->get_where($this->table, ['nik' => $nik])
            ->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
public function getUserByNik($nik)
{
    $this->db->select('
        user.*,
        penduduk.nik,
        penduduk.nama_lengkap
    ');

    $this->db->from('user');

    $this->db->join(
        'penduduk',
        'penduduk.id = user.penduduk_id'
    );

    $this->db->where(
        'penduduk.nik',
        $nik
    );

    return $this->db->get()->row_array();
}
public function getAllUserPenduduk()
{
    $this->db->select('
        user.id,
        user.name,
        user.email,
        user.is_active,
        user.role_id,
        penduduk.nik,
        penduduk.nama_lengkap
    ');

    $this->db->from('user');

    $this->db->join(
        'penduduk',
        'penduduk.id = user.penduduk_id'
    );

    $this->db->where(
        'user.role_id',
        3
    );

    return $this->db->get()->result_array();
}

}