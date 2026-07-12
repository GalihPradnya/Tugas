<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
    public function getJenisSurat()
    {
        return $this->db
            ->where('status', 'aktif')
            ->get('jenis_surat')
            ->result_array();
    }

    public function getPersyaratanBySurat($id)
    {
        $this->db->select('
            persyaratan.id,
            persyaratan.nama_persyaratan
        ');

        $this->db->from('persyaratan_surat');

        $this->db->join(
            'persyaratan',
            'persyaratan.id = persyaratan_surat.persyaratan_id'
        );

        $this->db->where(
            'persyaratan_surat.jenis_surat_id',
            $id
        );

        return $this->db->get()->result_array();
    }
        public function simpan($data)
    {

        $this->db->insert('pengajuan',$data);

        return $this->db->insert_id();

    }
}