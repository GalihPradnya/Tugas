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
    public function simpanFile($data)
    {
        return $this->db->insert('pengajuan_file', $data);
    }
    public function getAllPengajuan()
    {
        $this->db->select('
            pengajuan.*,
            jenis_surat.nama_surat,
            user.name as nama_user,
            user.email
        ');

        $this->db->from('pengajuan');

        $this->db->join(
            'jenis_surat',
            'jenis_surat.id = pengajuan.jenis_surat_id'
        );

        $this->db->join(
            'user',
            'user.id = pengajuan.user_id'
        );

        return $this->db->get()->result_array();
    }
    public function getDetailPengajuan($id)
{
    $this->db->select('
        pengajuan.*,
        jenis_surat.nama_surat
    ');

    $this->db->from('pengajuan');

    $this->db->join(
        'jenis_surat',
        'jenis_surat.id = pengajuan.jenis_surat_id'
    );

    $this->db->where('pengajuan.id', $id);

    return $this->db->get()->row_array();
}
public function getFilePengajuan($id)
{
    $this->db->select('
        pengajuan_file.*,
        persyaratan.nama_persyaratan
    ');

    $this->db->from('pengajuan_file');

    $this->db->join(
        'persyaratan',
        'persyaratan.id = pengajuan_file.persyaratan_id'
    );

    $this->db->where(
        'pengajuan_file.pengajuan_id',
        $id
    );

    return $this->db->get()->result_array();
}
public function updateStatus($id, $status)
{
    $this->db->where('id', $id);

    return $this->db->update(
        'pengajuan',
        [
            'status' => $status
        ]
    );
}
public function getFileById($id)
{
    return $this->db
        ->where('id', $id)
        ->get('pengajuan_file')
        ->row_array();
}
public function getSuratByUser($user_id)
{
    $this->db->select('
        pengajuan.*,
        jenis_surat.nama_surat
    ');

    $this->db->from('pengajuan');

    $this->db->join(
        'jenis_surat',
        'jenis_surat.id = pengajuan.jenis_surat_id'
    );

    $this->db->where(
        'pengajuan.user_id',
        $user_id
    );

    $this->db->order_by(
        'pengajuan.id',
        'DESC'
    );

    return $this->db->get()->result_array();
}
public function updatePengajuan($id, $data)
{
    $this->db->where('id', $id);

    return $this->db->update(
        'pengajuan',
        $data
    );
}
}