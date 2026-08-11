<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();

        $this->load->model('Surat_model');
        $this->load->model('Pengajuan_model');
        $this->load->model('Logo_profil_model');
        $this->load->model('Pemerintahan_model');
        $this->load->model('Penduduk_model');
    }


    // ==========================================================
    // BUAT SURAT
    // ==========================================================

    public function buat($pengajuan_id)
    {
        $data['title'] = 'Buat Surat';

        $data['logoDesa'] =
            $this->Logo_profil_model
                ->getLogoDesa();


        // ======================================================
        // DATA PENGAJUAN
        // ======================================================

        $data['pengajuan'] =
            $this->Pengajuan_model
                ->getDetailPengajuan($pengajuan_id);


        if (!$data['pengajuan']) {
            show_404();
        }


        // ======================================================
        // FIELD SURAT
        // ======================================================

        $data['field_surat'] =
            $this->Surat_model
                ->getFieldByJenisSurat(
                    $data['pengajuan']['jenis_surat_id']
                );


        // ======================================================
        // DATA AWAL PENDUDUK MENINGGAL
        // ======================================================

        $data['penduduk_meninggal'] = null;


        // ======================================================
        // TAMPILKAN
        // ======================================================

        $this->load->view(
            'templates/header',
            $data
        );

        $this->load->view(
            'templates/sidebar',
            $data
        );

        $this->load->view(
            'templates/topbar',
            $data
        );

        $this->load->view(
            'surat/buat_surat',
            $data
        );

        $this->load->view(
            'templates/footer'
        );
    }


    // ==========================================================
    // AJAX CARI PENDUDUK MENINGGAL
    // ==========================================================

    public function cari_penduduk_meninggal()
    {
        $keyword =
            trim(
                $this->input->get(
                    'keyword',
                    true
                )
            );


        if ($keyword == '') {

            echo json_encode([]);

            return;
        }


        $this->db->select('
            id,
            nik,
            nama_lengkap,
            tempat_lahir,
            tanggal_lahir,
            jenis_kelamin,
            alamat,
            rt,
            rw,
            agama,
            pekerjaan,
            status_perkawinan
        ');


        $this->db->from('penduduk');


        $this->db->group_start();

        $this->db->like(
            'nik',
            $keyword
        );

        $this->db->or_like(
            'nama_lengkap',
            $keyword
        );

        $this->db->group_end();


        $this->db->order_by(
            'nama_lengkap',
            'ASC'
        );


        $this->db->limit(20);


        $query =
            $this->db
                ->get()
                ->result_array();


        echo json_encode($query);
    }


    // ==========================================================
    // SIMPAN SURAT
    // ==========================================================

    public function simpan()
    {
        $pengajuan_id =
            $this->input->post(
                'pengajuan_id',
                true
            );


        $nomor_surat =
            $this->input->post(
                'nomor_surat',
                true
            );


        $tanggal_surat =
            $this->input->post(
                'tanggal_surat',
                true
            );


        // ======================================================
        // DATA PENGAJUAN
        // ======================================================

        $pengajuan =
            $this->Pengajuan_model
                ->getDetailPengajuan(
                    $pengajuan_id
                );


        if (!$pengajuan) {
            show_404();
        }


        // ======================================================
        // JENIS SURAT
        // ======================================================

        $jenis_surat_id =
            $pengajuan['jenis_surat_id'];


        // ======================================================
        // KHUSUS SURAT KETERANGAN MENINGGAL
        // ======================================================

        $penduduk_meninggal_id = null;


        if ($jenis_surat_id == 3) {

            $penduduk_meninggal_id =
                $this->input->post(
                    'penduduk_meninggal_id',
                    true
                );


            if (empty($penduduk_meninggal_id)) {

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        Silakan pilih penduduk yang meninggal terlebih dahulu.
                    </div>'
                );


                redirect(
                    'surat/surat_admin/buat/'
                    .$pengajuan_id
                );

                return;
            }


            // Pastikan penduduk benar-benar ada

            $penduduk =
                $this->Penduduk_model
                    ->getPendudukById(
                        $penduduk_meninggal_id
                    );


            if (!$penduduk) {

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        Data penduduk yang dipilih tidak ditemukan.
                    </div>'
                );


                redirect(
                    'surat/surat_admin/buat/'
                    .$pengajuan_id
                );

                return;
            }
        }


        // ======================================================
        // CEK SURAT SUDAH ADA
        // ======================================================

        $cek =
            $this->Surat_model
                ->getByPengajuan(
                    $pengajuan_id
                );


        if ($cek) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning">
                    Surat untuk pengajuan ini sudah dibuat.
                </div>'
            );


            redirect(
                'surat/surat_admin/edit/'
                .$cek['id']
            );

            return;
        }


        // ======================================================
        // DATA SURAT
        // ======================================================

        $dataSurat = [

            'pengajuan_id' =>
                $pengajuan_id,

            'penduduk_meninggal_id' =>
                $penduduk_meninggal_id,

            'nomor_surat' =>
                $nomor_surat,

            'tanggal_surat' =>
                $tanggal_surat,

            'dibuat_oleh' =>
                $this->session
                    ->userdata('id')
        ];


        // ======================================================
        // TRANSAKSI
        // ======================================================

        $this->db->trans_start();


        // SIMPAN SURAT

        $this->db->insert(
            'surat',
            $dataSurat
        );


        $surat_id =
            $this->db->insert_id();


        // ======================================================
        // FIELD TAMBAHAN
        // ======================================================

        $field_surat =
            $this->Surat_model
                ->getFieldByJenisSurat(
                    $jenis_surat_id
                );


        foreach ($field_surat as $field) {

            $field_name =
                $field['field_name'];


            // field lama yang tidak dipakai

            if (
                $field_name ===
                'keterangan_usaha'
            ) {
                continue;
            }


            $field_value =
                $this->input->post(
                    $field_name,
                    true
                );


            $dataDetail = [

                'surat_id' =>
                    $surat_id,

                'field_name' =>
                    $field_name,

                'field_value' =>
                    $field_value
            ];


            $this->db->insert(
                'surat_detail',
                $dataDetail
            );
        }


        // ======================================================
        // SELESAI TRANSAKSI
        // ======================================================

        $this->db->trans_complete();


        if (
            $this->db->trans_status()
            === FALSE
        ) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Surat gagal disimpan.
                </div>'
            );


            redirect(
                'surat/surat_admin/buat/'
                .$pengajuan_id
            );

            return;
        }


        // ======================================================
        // BERHASIL
        // ======================================================

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
                Surat berhasil dibuat.
            </div>'
        );


        redirect(
            'surat/surat_admin/detail/'
            .$surat_id
        );
    }


    // ==========================================================
    // EDIT SURAT
    // ==========================================================

    public function edit($id)
{
    $data['title'] = 'Edit Surat';

    $data['logoDesa'] =
        $this->Logo_profil_model
            ->getLogoDesa();

    // =====================================================
    // DATA SURAT
    // =====================================================

    $data['surat'] =
        $this->Surat_model
            ->getById($id);

    if (!$data['surat']) {
        show_404();
    }

    // =====================================================
    // DATA PENGAJUAN
    // =====================================================

    $data['pengajuan'] =
        $this->Pengajuan_model
            ->getDetailPengajuan(
                $data['surat']['pengajuan_id']
            );

    if (!$data['pengajuan']) {
        show_404();
    }

    // =====================================================
    // FIELD SURAT
    // =====================================================

    $data['field_surat'] =
        $this->Surat_model
            ->getFieldByJenisSurat(
                $data['pengajuan']['jenis_surat_id']
            );

    // =====================================================
    // DETAIL SURAT
    // =====================================================

    $detail =
        $this->Surat_model
            ->getDetail($id);

    $data['isi_surat'] = [];

    foreach ($detail as $d) {

        $data['isi_surat']
            [$d['field_name']]
            =
            $d['field_value'];
    }

    // =====================================================
    // PENDUDUK YANG MENINGGAL
    // =====================================================

    $data['penduduk_meninggal'] = null;

    if (
        (int)$data['pengajuan']['jenis_surat_id'] === 3
        &&
        !empty($data['surat']['penduduk_id'])
    ) {

        $data['penduduk_meninggal'] =
            $this->Penduduk_model
                ->getPendudukById(
                    $data['surat']['penduduk_id']
                );
    }

    // =====================================================
    // TAMPILKAN
    // =====================================================

    $this->load->view(
        'templates/header',
        $data
    );

    $this->load->view(
        'templates/sidebar',
        $data
    );

    $this->load->view(
        'templates/topbar',
        $data
    );

    $this->load->view(
        'surat/edit_surat',
        $data
    );

    $this->load->view(
        'templates/footer'
    );
}


    // ==========================================================
    // UPDATE SURAT
    // ==========================================================

    // ==========================================================
// UPDATE SURAT
// ==========================================================

public function update()
{
    // ======================================================
    // AMBIL DATA POST
    // ======================================================

    $surat_id =
        $this->input->post(
            'surat_id',
            true
        );

    $nomor_surat =
        $this->input->post(
            'nomor_surat',
            true
        );

    $tanggal_surat =
        $this->input->post(
            'tanggal_surat',
            true
        );

    $penduduk_id =
        $this->input->post(
            'penduduk_id',
            true
        );


    // ======================================================
    // CEK SURAT
    // ======================================================

    $surat =
        $this->Surat_model
            ->getById($surat_id);


    if (!$surat) {

        show_404();

    }


    // ======================================================
    // DATA PENGAJUAN
    // ======================================================

    $pengajuan =
        $this->Pengajuan_model
            ->getDetailPengajuan(
                $surat['pengajuan_id']
            );


    if (!$pengajuan) {

        show_error(
            'Data pengajuan surat tidak ditemukan.'
        );

    }


    // ======================================================
    // KHUSUS SURAT KETERANGAN MENINGGAL
    // jenis_surat_id = 3
    // ======================================================

    if (
        (int)$pengajuan['jenis_surat_id'] === 3
    ) {

        // -----------------------------------------------
        // PENDUDUK WAJIB DIPILIH
        // -----------------------------------------------

        if (empty($penduduk_id)) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Silakan pilih penduduk yang meninggal.
                </div>'
            );

            redirect(
                'surat/surat_admin/edit/'
                .$surat_id
            );

            return;
        }


        // -----------------------------------------------
        // CEK PENDUDUK
        // -----------------------------------------------

        $penduduk =
            $this->Penduduk_model
                ->getPendudukById(
                    $penduduk_id
                );


        if (!$penduduk) {

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    Data penduduk yang dipilih tidak ditemukan.
                </div>'
            );

            redirect(
                'surat/surat_admin/edit/'
                .$surat_id
            );

            return;
        }

    } else {

        // Untuk surat selain surat kematian,
        // jangan ubah penduduk_id.

        $penduduk_id =
            !empty($surat['penduduk_id'])
                ? $surat['penduduk_id']
                : null;
    }


    // ======================================================
    // FIELD SURAT
    // ======================================================

    $field_surat =
        $this->Surat_model
            ->getFieldByJenisSurat(
                $pengajuan['jenis_surat_id']
            );


    // ======================================================
    // MULAI TRANSAKSI
    // ======================================================

    $this->db->trans_start();


    // ======================================================
    // UPDATE TABEL SURAT
    // ======================================================

    $this->Surat_model
        ->updateSurat(
            $surat_id,
            [

                'nomor_surat' =>
                    $nomor_surat,

                'tanggal_surat' =>
                    $tanggal_surat,

                'penduduk_id' =>
                    $penduduk_id

            ]
        );


    // ======================================================
    // HAPUS DETAIL LAMA
    // ======================================================

    $this->Surat_model
        ->deleteDetail(
            $surat_id
        );


    // ======================================================
    // SIMPAN DETAIL BARU
    // ======================================================

    foreach (
        $field_surat
        as $field
    ) {

        $field_name =
            $field['field_name'];


        // -----------------------------------------------
        // Ambil nilai field
        // -----------------------------------------------

        $field_value =
            $this->input->post(
                $field_name,
                true
            );


        // -----------------------------------------------
        // Simpan detail
        // -----------------------------------------------

        $this->Surat_model
            ->insertDetail(
                [

                    'surat_id' =>
                        $surat_id,

                    'field_name' =>
                        $field_name,

                    'field_value' =>
                        $field_value

                ]
            );
    }


    // ======================================================
    // SELESAIKAN TRANSAKSI
    // ======================================================

    $this->db->trans_complete();


    // ======================================================
    // CEK TRANSAKSI
    // ======================================================

    if (
        $this->db->trans_status()
        === FALSE
    ) {

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger">
                Surat gagal diperbarui.
            </div>'
        );

        redirect(
            'surat/surat_admin/edit/'
            .$surat_id
        );

        return;
    }


    // ======================================================
    // BERHASIL
    // ======================================================

    $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success">
            Surat berhasil diperbarui.
        </div>'
    );


    redirect(
        'surat/surat_admin/detail/'
        .$surat_id
    );
}


    // ==========================================================
    // DETAIL SURAT
    // ==========================================================

    public function detail($id)
    {
        $data['title'] = 'Detail Surat';


        $data['logoDesa'] =
            $this->Logo_profil_model
                ->getLogoDesa();


        // DATA SURAT

        $data['surat'] =
            $this->Surat_model
                ->getById($id);


        if (!$data['surat']) {
            show_404();
        }


        // DATA PENGAJUAN

        $data['pengajuan'] =
            $this->Pengajuan_model
                ->getDetailPengajuan(
                    $data['surat']['pengajuan_id']
                );


        if (!$data['pengajuan']) {
            show_404();
        }


        // DETAIL

        $data['detail'] =
            $this->Surat_model
                ->getDetail($id);


        // ======================================================
        // PENDUDUK MENINGGAL
        // ======================================================

        $data['penduduk_meninggal'] = null;


        if (
            $data['pengajuan']['jenis_surat_id']
            == 3
            &&
            !empty(
                $data['surat']
                ['penduduk_meninggal_id']
            )
        ) {

            $data['penduduk_meninggal'] =
                $this->Penduduk_model
                    ->getPendudukById(
                        $data['surat']
                        ['penduduk_meninggal_id']
                    );
        }


        // ======================================================
        // VIEW
        // ======================================================

        $this->load->view(
            'templates/header',
            $data
        );

        $this->load->view(
            'templates/sidebar',
            $data
        );

        $this->load->view(
            'templates/topbar',
            $data
        );

        $this->load->view(
            'surat/detail_surat',
            $data
        );

        $this->load->view(
            'templates/footer'
        );
    }


    // ==========================================================
    // CETAK SURAT
    // ==========================================================

    // ==========================================================
// CETAK SURAT
// ==========================================================

public function cetak($id)
{
    $data['title'] = 'Cetak Surat';


    // ======================================================
    // LOGO DESA
    // ======================================================

    $data['logoDesa'] =
        $this->Logo_profil_model
            ->getLogoDesa();


    // ======================================================
    // KEPALA DESA
    // ======================================================

    $data['kepala_desa'] =
        $this->Pemerintahan_model
            ->getKepalaDesa();


    // ======================================================
    // DATA SURAT
    // ======================================================

    $data['surat'] =
        $this->Surat_model
            ->getById($id);


    if (!$data['surat']) {

        show_404();

    }


    // ======================================================
    // DATA PENGAJUAN
    // ======================================================

    $data['pengajuan'] =
        $this->Pengajuan_model
            ->getDetailPengajuan(
                $data['surat']['pengajuan_id']
            );


    if (!$data['pengajuan']) {

        show_error(
            'Data pengajuan surat tidak ditemukan.'
        );

    }


    // ======================================================
    // DATA PENDUDUK MENINGGAL
    // ======================================================

    $data['penduduk_meninggal'] = null;


    /*
     * Khusus Surat Keterangan Meninggal
     *
     * jenis_surat_id = 3
     *
     * Data orang yang meninggal TIDAK diambil
     * dari data pemohon.
     *
     * Data diambil dari:
     *
     * surat.penduduk_id
     *        ↓
     * penduduk.id
     */

    if (
        (int)$data['pengajuan']['jenis_surat_id']
        === 3
    ) {

        if (
            !empty(
                $data['surat']['penduduk_id']
            )
        ) {

            $data['penduduk_meninggal'] =
                $this->Penduduk_model
                    ->getPendudukById(
                        $data['surat']['penduduk_id']
                    );
        }


        // Jika penduduk tidak ditemukan

        if (
            empty(
                $data['penduduk_meninggal']
            )
        ) {

            show_error(
                'Data penduduk yang meninggal belum dipilih.'
            );

        }

    }


    // ======================================================
    // DETAIL SURAT
    // ======================================================

    $detail =
        $this->Surat_model
            ->getDetail($id);


    // ======================================================
    // UBAH DETAIL MENJADI ARRAY
    // ======================================================

    $data['isi_surat'] = [];


    if (!empty($detail)) {

        foreach ($detail as $row) {

            $data['isi_surat'][
                $row['field_name']
            ] =
                $row['field_value'];

        }

    }


    // ======================================================
    // AMBIL JENIS SURAT
    // ======================================================

    $jenis_surat =
        $this->db
            ->where(
                'id',
                $data['pengajuan']['jenis_surat_id']
            )
            ->get('jenis_surat')
            ->row_array();


    if (!$jenis_surat) {

        show_error(
            'Jenis surat tidak ditemukan.'
        );

    }


    // ======================================================
    // CEK TEMPLATE
    // ======================================================

    if (
        empty(
            $jenis_surat['template']
        )
    ) {

        show_error(
            'Template cetak untuk jenis surat ini belum tersedia.'
        );

    }


    $template =
        $jenis_surat['template'];


    // ======================================================
    // NAMA VIEW
    // ======================================================

    $view =
        'surat/cetak/' .
        $template;


    // ======================================================
    // CEK FILE VIEW
    // ======================================================

    if (
        !file_exists(
            APPPATH .
            'views/' .
            $view .
            '.php'
        )
    ) {

        show_error(
            'File template cetak tidak ditemukan: '
            . $template
        );

    }


    // ======================================================
    // TAMPILKAN SURAT
    // ======================================================

    $this->load->view(
        $view,
        $data
    );
}


    public function cari_penduduk()
{
    // Ambil keyword
    $keyword = $this->input->post(
        'keyword',
        true
    );


    // Jika kosong
    if (empty($keyword)) {

        echo json_encode([]);

        return;
    }


    // Cari penduduk
    $hasil =
        $this->Penduduk_model
            ->cariPenduduk($keyword);


    // Pastikan response JSON
    $this->output
        ->set_content_type('application/json')
        ->set_output(
            json_encode($hasil)
        );
}
}