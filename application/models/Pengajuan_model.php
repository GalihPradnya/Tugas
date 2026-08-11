<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
    // =========================================================
    // JENIS SURAT
    // =========================================================
    public function getJenisSurat()
    {
        return $this->db
            ->where('status', 'aktif')
            ->order_by('nama_surat', 'ASC')
            ->get('jenis_surat')
            ->result_array();
    }


    // =========================================================
    // FIELD YANG HARUS DIISI MASYARAKAT
    //
    // pengajuan_field_config
    // =========================================================
    public function getFieldConfigBySurat($jenis_surat_id)
    {
        return $this->db
            ->where(
                'jenis_surat_id',
                $jenis_surat_id
            )
            ->order_by(
                'urutan',
                'ASC'
            )
            ->order_by(
                'id',
                'ASC'
            )
            ->get(
                'pengajuan_field_config'
            )
            ->result_array();
    }


    // =========================================================
    // PERSYARATAN FILE
    //
    // persyaratan_surat
    //       ↓
    // persyaratan
    // =========================================================
    public function getPersyaratanBySurat($id)
    {
        $this->db->select('
            persyaratan.id,
            persyaratan.nama_persyaratan
        ');

        $this->db->from(
            'persyaratan_surat'
        );

        $this->db->join(
            'persyaratan',
            'persyaratan.id =
             persyaratan_surat.persyaratan_id'
        );

        $this->db->where(
            'persyaratan_surat.jenis_surat_id',
            $id
        );

        $this->db->order_by(
            'persyaratan.id',
            'ASC'
        );

        return $this->db
            ->get()
            ->result_array();
    }


    // =========================================================
    // SIMPAN PENGAJUAN
    // =========================================================
    public function simpan($data)
    {
        $this->db->insert(
            'pengajuan',
            $data
        );

        return $this->db->insert_id();
    }


    // =========================================================
    // SIMPAN FIELD PENGAJUAN
    //
    // pengajuan_field
    // =========================================================
    public function simpanField($data)
    {
        return $this->db->insert(
            'pengajuan_field',
            $data
        );
    }


    // =========================================================
    // SIMPAN FILE PERSYARATAN
    // =========================================================
    public function simpanFile($data)
    {
        return $this->db->insert(
            'pengajuan_file',
            $data
        );
    }


    // =========================================================
    // CEK PENGAJUAN YANG MASIH BERJALAN
    // =========================================================
    public function cekPengajuanBerjalan(
        $penduduk_id,
        $jenis_surat_id
    ) {
        return $this->db
            ->where(
                'penduduk_id',
                $penduduk_id
            )
            ->where(
                'jenis_surat_id',
                $jenis_surat_id
            )
            ->where_in(
                'status',
                [
                    'Menunggu Verifikasi',
                    'Diproses',
                    'Diproses Admin',
                    'Menunggu'
                ]
            )
            ->limit(1)
            ->get(
                'pengajuan'
            )
            ->row_array();
    }


    // =========================================================
    // SEMUA PENGAJUAN ADMIN
    // =========================================================
    public function getAllPengajuan()
    {
        $this->db->select('
            pengajuan.*,
            jenis_surat.nama_surat,
            penduduk.nik,
            penduduk.nama_lengkap,
            penduduk.alamat,
            user.email
        ');

        $this->db->from(
            'pengajuan'
        );

        $this->db->join(
            'jenis_surat',
            'jenis_surat.id =
             pengajuan.jenis_surat_id'
        );

        $this->db->join(
            'user',
            'user.id = pengajuan.user_id',
            'left'
        );

        $this->db->join(
            'penduduk',
            'penduduk.id =
             pengajuan.penduduk_id',
            'left'
        );

        $this->db->order_by("
            CASE
                WHEN pengajuan.status =
                    'Menunggu Verifikasi'
                THEN 1

                WHEN pengajuan.status =
                    'Menunggu'
                THEN 2

                WHEN pengajuan.status =
                    'Diproses'
                THEN 3

                WHEN pengajuan.status =
                    'Diproses Admin'
                THEN 4

                WHEN pengajuan.status =
                    'Selesai'
                THEN 5

                WHEN pengajuan.status =
                    'Ditolak'
                THEN 6

                ELSE 7
            END
        ", '', FALSE);

        $this->db->order_by(
            'pengajuan.created_at',
            'DESC'
        );

        return $this->db
            ->get()
            ->result_array();
    }


    // =========================================================
    // DETAIL PENGAJUAN
    // =========================================================
    public function getDetailPengajuan($id)
    {
        $this->db->select('
            pengajuan.*,

            jenis_surat.nama_surat,

            user.email,

            penduduk.nik,
            penduduk.nama_lengkap,
            penduduk.tempat_lahir,
            penduduk.tanggal_lahir,
            penduduk.jenis_kelamin,
            penduduk.alamat,
            penduduk.rt,
            penduduk.rw,
            penduduk.agama,
            penduduk.pekerjaan,
            penduduk.status_perkawinan
        ');

        $this->db->from(
            'pengajuan'
        );

        $this->db->join(
            'jenis_surat',
            'jenis_surat.id =
             pengajuan.jenis_surat_id'
        );

        $this->db->join(
            'user',
            'user.id = pengajuan.user_id',
            'left'
        );

        $this->db->join(
            'penduduk',
            'penduduk.id =
             pengajuan.penduduk_id',
            'left'
        );

        $this->db->where(
            'pengajuan.id',
            $id
        );

        return $this->db
            ->get()
            ->row_array();
    }


    // =========================================================
    // FIELD YANG DIISI MASYARAKAT
    //
    // contoh:
    //
    // NIK Orang Meninggal
    // Tanggal Meninggal
    // Penyebab Kematian
    // Keperluan
    //
    // =========================================================
    public function getFieldPengajuan($pengajuan_id)
    {
        $this->db->select('
            pengajuan_field.id,
            pengajuan_field.pengajuan_id,
            pengajuan_field.field_config_id,
            pengajuan_field.nilai,

            pengajuan_field_config.field_name,
            pengajuan_field_config.label,
            pengajuan_field_config.tipe,
            pengajuan_field_config.required,
            pengajuan_field_config.urutan
        ');

        $this->db->from(
            'pengajuan_field'
        );

        $this->db->join(
            'pengajuan_field_config',
            'pengajuan_field_config.id =
             pengajuan_field.field_config_id'
        );

        $this->db->where(
            'pengajuan_field.pengajuan_id',
            $pengajuan_id
        );

        $this->db->order_by(
            'pengajuan_field_config.urutan',
            'ASC'
        );

        $this->db->order_by(
            'pengajuan_field_config.id',
            'ASC'
        );

        return $this->db
            ->get()
            ->result_array();
    }


    // =========================================================
    // FILE PERSYARATAN
    // =========================================================
    public function getFilePengajuan($id)
    {
        $this->db->select('
            pengajuan_file.*,
            persyaratan.nama_persyaratan
        ');

        $this->db->from(
            'pengajuan_file'
        );

        $this->db->join(
            'persyaratan',
            'persyaratan.id =
             pengajuan_file.persyaratan_id'
        );

        $this->db->where(
            'pengajuan_file.pengajuan_id',
            $id
        );

        return $this->db
            ->get()
            ->result_array();
    }


    // =========================================================
    // UPDATE PENGAJUAN
    // =========================================================
    public function updatePengajuan(
        $id,
        $data
    ) {
        $this->db->where(
            'id',
            $id
        );

        return $this->db->update(
            'pengajuan',
            $data
        );
    }


    // =========================================================
    // AMBIL FILE BERDASARKAN ID
    // =========================================================
    public function getFileById($id)
    {
        return $this->db
            ->where(
                'id',
                $id
            )
            ->get(
                'pengajuan_file'
            )
            ->row_array();
    }


    // =========================================================
    // SURAT SAYA
    // =========================================================
    public function getSuratByUser($user_id)
    {
        $this->db->select('
            pengajuan.*,
            jenis_surat.nama_surat,
            penduduk.nik,
            penduduk.nama_lengkap
        ');

        $this->db->from(
            'pengajuan'
        );

        $this->db->join(
            'jenis_surat',
            'jenis_surat.id =
             pengajuan.jenis_surat_id'
        );

        $this->db->join(
            'penduduk',
            'penduduk.id =
             pengajuan.penduduk_id',
            'left'
        );

        $this->db->where(
            'pengajuan.user_id',
            $user_id
        );

        $this->db->order_by(
            'pengajuan.id',
            'DESC'
        );

        return $this->db
            ->get()
            ->result_array();
    }


    // =========================================================
    // DATA UNTUK EMAIL
    // =========================================================
    public function getPengajuanById($id)
    {
        $this->db->select('
            pengajuan.*,
            jenis_surat.nama_surat,
            user.email,
            penduduk.nama_lengkap,
            penduduk.nik
        ');

        $this->db->from(
            'pengajuan'
        );

        $this->db->join(
            'jenis_surat',
            'jenis_surat.id =
             pengajuan.jenis_surat_id'
        );

        $this->db->join(
            'user',
            'user.id = pengajuan.user_id',
            'left'
        );

        $this->db->join(
            'penduduk',
            'penduduk.id =
             pengajuan.penduduk_id',
            'left'
        );

        $this->db->where(
            'pengajuan.id',
            $id
        );

        return $this->db
            ->get()
            ->row_array();
    }


    // =========================================================
    // MENUNGGU VERIFIKASI
    // =========================================================
    public function getPengajuanMenungguVerifikasi()
    {
        $this->db->select('
            pengajuan.*,
            jenis_surat.nama_surat,
            penduduk.nik,
            penduduk.nama_lengkap,
            penduduk.alamat,
            user.email
        ');

        $this->db->from(
            'pengajuan'
        );

        $this->db->join(
            'jenis_surat',
            'jenis_surat.id =
             pengajuan.jenis_surat_id'
        );

        $this->db->join(
            'user',
            'user.id = pengajuan.user_id',
            'left'
        );

        $this->db->join(
            'penduduk',
            'penduduk.id =
             pengajuan.penduduk_id',
            'left'
        );

        $this->db->where(
            'pengajuan.status',
            'Menunggu Verifikasi'
        );

        $this->db->order_by(
            'pengajuan.created_at',
            'DESC'
        );

        return $this->db
            ->get()
            ->result_array();
    }


    // =========================================================
    // DIPROSES ADMIN
    // =========================================================
    public function getPengajuanDiprosesAdmin()
    {
        $this->db->select('
            pengajuan.*,
            jenis_surat.nama_surat,
            penduduk.nik,
            penduduk.nama_lengkap,
            penduduk.alamat,
            user.email
        ');

        $this->db->from(
            'pengajuan'
        );

        $this->db->join(
            'jenis_surat',
            'jenis_surat.id =
             pengajuan.jenis_surat_id'
        );

        $this->db->join(
            'user',
            'user.id = pengajuan.user_id',
            'left'
        );

        $this->db->join(
            'penduduk',
            'penduduk.id =
             pengajuan.penduduk_id',
            'left'
        );

        $this->db->where(
            'pengajuan.status',
            'Diproses Admin'
        );

        $this->db->order_by(
            'pengajuan.created_at',
            'DESC'
        );

        return $this->db
            ->get()
            ->result_array();
    }
        // =========================================================
    // AMBIL PENGAJUAN BERDASARKAN ID
    // =========================================================
    public function getById($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('pengajuan')
            ->row_array();
    }


    // =========================================================
    // HAPUS / BATALKAN PENGAJUAN
    // =========================================================
    public function hapusPengajuan($id)
    {
        // -----------------------------------------
        // Ambil semua file persyaratan
        // -----------------------------------------
        $files = $this->db
            ->where('pengajuan_id', $id)
            ->get('pengajuan_file')
            ->result_array();


        // -----------------------------------------
        // Hapus file fisik
        // -----------------------------------------
        foreach ($files as $file) {

            $path = './uploads/persyaratan/' . $file['nama_file'];

            if (file_exists($path)) {
                unlink($path);
            }
        }


        // -----------------------------------------
        // Hapus data file persyaratan
        // -----------------------------------------
        $this->db
            ->where('pengajuan_id', $id)
            ->delete('pengajuan_file');


        // -----------------------------------------
        // Hapus field pengajuan
        // -----------------------------------------
        $this->db
            ->where('pengajuan_id', $id)
            ->delete('pengajuan_field');


        // -----------------------------------------
        // Hapus data pengajuan
        // -----------------------------------------
        return $this->db
            ->where('id', $id)
            ->delete('pengajuan');
    }
    // =========================================================
// BATALKAN PENGAJUAN MASYARAKAT
// =========================================================
public function batalkanPengajuan($id, $user_id)
{
    return $this->db
        ->where('id', $id)
        ->where('user_id', $user_id)
        ->where('status', 'Menunggu Verifikasi')
        ->update(
            'pengajuan',
            [
                'status' => 'Dibatalkan'
            ]
        );
}
}