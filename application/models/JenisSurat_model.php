<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisSurat_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('jenis_surat')->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('jenis_surat', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('jenis_surat', $data);
    }

    public function delete($id)
    {
        $this->db->delete('jenis_surat', ['id' => $id]);
    }
public function getPersyaratan($jenis_surat_id)
{

    return $this->db
        ->select('
            persyaratan.id,
            persyaratan.nama_persyaratan,
            persyaratan.tipe_file
        ')
        ->from('persyaratan_surat')

        ->join(
            'persyaratan',
            'persyaratan.id = persyaratan_surat.persyaratan_id'
        )

        ->where(
            'persyaratan_surat.jenis_surat_id',
            $jenis_surat_id
        )

        ->get()
        ->result_array();

}
}