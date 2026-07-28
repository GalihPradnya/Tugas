    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');


    class Pengajuan_pendatang_model extends CI_Model
    {


        private $table = 'pengajuan_pendatang';



        // ==========================
        // GET ALL
        // ==========================
        public function getAll()
        {

            $this->db->select('
                pengajuan_pendatang.*,
                penduduk_pendatang.nama_lengkap,
                penduduk_pendatang.nomor_hp,
                penduduk_pendatang.email,
                jenis_surat.nama_surat
            ');


            $this->db->from($this->table);


            $this->db->join(
                'penduduk_pendatang',
                'penduduk_pendatang.id = pengajuan_pendatang.pendatang_id'
            );


            $this->db->join(
                'jenis_surat',
                'jenis_surat.id = pengajuan_pendatang.jenis_surat_id'
            );



           $this->db->order_by("
    CASE
        WHEN pengajuan_pendatang.status = 'Menunggu' THEN 1
        WHEN pengajuan_pendatang.status = 'Diproses' THEN 2
        WHEN pengajuan_pendatang.status = 'Selesai' THEN 3
        WHEN pengajuan_pendatang.status = 'Ditolak' THEN 4
        ELSE 5
    END
", '', FALSE);


$this->db->order_by(
    'pengajuan_pendatang.created_at',
    'DESC'
);


return $this->db
    ->get()
    ->result_array();

        }







        // ==========================
        // GET DETAIL
        // ==========================
        public function getById($id)
        {


            $this->db->select('
                
                pengajuan_pendatang.*,

                penduduk_pendatang.nama_lengkap,
                penduduk_pendatang.nik,
                penduduk_pendatang.alamat_asal,
                penduduk_pendatang.alamat_tinggal,
                penduduk_pendatang.nomor_hp,
                penduduk_pendatang.email,
                penduduk_pendatang.pekerjaan,
                jenis_surat.nama_surat

            ');



            $this->db->from($this->table);



            $this->db->join(
                'penduduk_pendatang',
                'penduduk_pendatang.id = pengajuan_pendatang.pendatang_id'
            );



            $this->db->join(
                'jenis_surat',
                'jenis_surat.id = pengajuan_pendatang.jenis_surat_id'
            );



            $this->db->where(
                'pengajuan_pendatang.id',
                $id
            );



            return $this->db
                ->get()
                ->row_array();

        }






        // ==========================
        // INSERT
        // ==========================
        public function insert($data)
        {

            $this->db->insert(
                $this->table,
                $data
            );


            return $this->db->insert_id();

        }







        // ==========================
        // UPDATE
        // ==========================
        public function update($id,$data)
        {


            return $this->db
                ->where(
                    'id',
                    $id
                )
                ->update(
                    $this->table,
                    $data
                );

        }

    }