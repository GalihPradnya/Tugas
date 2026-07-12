<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersyaratanSurat_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('
            persyaratan_surat.id,
            jenis_surat.nama_surat,
            persyaratan.nama_persyaratan
        ');

        $this->db->from('persyaratan_surat');

        $this->db->join(
            'jenis_surat',
            'jenis_surat.id =
             persyaratan_surat.jenis_surat_id'
        );

        $this->db->join(
            'persyaratan',
            'persyaratan.id =
             persyaratan_surat.persyaratan_id'
        );

        return $this->db->get()->result_array();
    }

    public function insert($data)
    {
        $this->db->insert(
            'persyaratan_surat',
            $data
        );
    }
}