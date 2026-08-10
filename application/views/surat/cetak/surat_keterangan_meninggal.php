<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Surat Keterangan Meninggal</title>

    <style>

        @page {
            size: A4 portrait;
            margin: 15mm 20mm 20mm 25mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: #ffffff;

            font-family:
                "Times New Roman",
                Times,
                serif;

            font-size: 12pt;
            line-height: 1.5;

            color: #000;
        }

        .surat {
            width: 100%;
            max-width: 170mm;
            margin: 0 auto;
        }


        /* =====================================================
           KOP SURAT
        ===================================================== */

        .kop-surat {
            width: 100%;
            margin-bottom: 5mm;
            text-align: center;
        }

        .kop-surat img {
            display: block;

            width: 100%;
            height: auto;

            max-height: 45mm;

            object-fit: contain;

            margin: 0 auto;
        }

        .garis-kop {
            border-bottom: 3px solid #000;

            margin-top: 2mm;
            margin-bottom: 8mm;

            width: 100%;
        }


        /* =====================================================
           JUDUL
        ===================================================== */

        .judul {
            text-align: center;
            margin-bottom: 3px;
        }

        .judul h2 {
            margin: 0;

            font-size: 14pt;

            font-weight: bold;

            text-decoration: underline;
        }

        .nomor {
            text-align: center;
            margin-bottom: 20px;
        }


        /* =====================================================
           PARAGRAF
        ===================================================== */

        .paragraf {
            text-align: justify;

            margin-top: 0;
            margin-bottom: 15px;

            text-indent: 12mm;
        }


        /* =====================================================
           DATA PENDUDUK MENINGGAL
        ===================================================== */

        .data-penduduk {
            width: 100%;

            border-collapse: collapse;

            margin-bottom: 18px;

            margin-left: 12mm;
        }

        .data-penduduk td {
            vertical-align: top;

            padding: 1px 0;
        }

        .data-penduduk .label {
            width: 42mm;

            white-space: nowrap;
        }

        .data-penduduk .titik {
            width: 7mm;

            text-align: left;
        }

        .data-penduduk .nilai {
            width: auto;

            padding-right: 5mm;
        }


        /* =====================================================
           ISI SURAT
        ===================================================== */

        .isi {
            text-align: justify;

            margin-top: 10px;

            margin-bottom: 15px;

            text-indent: 12mm;
        }

        .isi p {
            margin: 0 0 15px 0;
        }


        /* =====================================================
           TANDA TANGAN
        ===================================================== */

        .ttd {
            width: 100%;

            margin-top: 30px;
        }

        .ttd-kanan {
            width: 75mm;

            margin-left: auto;

            text-align: center;
        }

        .ttd-kanan .tempat {
            margin-bottom: 0;
        }

        .ttd-kanan .jabatan {
            margin-top: 0;
        }

        .ttd-space {
            height: 30mm;
        }

        .ttd-nama {
            font-weight: bold;

            text-decoration: underline;
        }


        /* =====================================================
           TOMBOL
        ===================================================== */

        .tombol {
            margin-top: 30px;

            text-align: center;
        }

        .btn {
            display: inline-block;

            padding: 8px 15px;

            margin: 3px;

            text-decoration: none;

            border-radius: 4px;

            font-family: Arial, sans-serif;

            font-size: 13px;

            cursor: pointer;

            border: none;
        }

        .btn-print {
            background: #28a745;

            color: white;
        }

        .btn-back {
            background: #6c757d;

            color: white;
        }


        /* =====================================================
           PRINT
        ===================================================== */

        @media print {

            body {
                background: white;
            }

            .surat {
                width: 100%;

                max-width: none;
            }

            .tombol {
                display: none;
            }

            .kop-surat {
                margin-bottom: 5mm;
            }

        }

    </style>

</head>


<body>


<?php

/* ==========================================================
   DATA ORANG YANG MENINGGAL
   PENTING:
   Semua identitas mengambil dari $penduduk_meninggal
   BUKAN dari $pengajuan
========================================================== */


/* Nama */

$nama = !empty($penduduk_meninggal['nama_lengkap'])
    ? $penduduk_meninggal['nama_lengkap']
    : '-';


/* NIK */

$nik = !empty($penduduk_meninggal['nik'])
    ? $penduduk_meninggal['nik']
    : '-';


/* Tempat lahir */

$tempat_lahir = !empty($penduduk_meninggal['tempat_lahir'])
    ? $penduduk_meninggal['tempat_lahir']
    : '-';


/* Tanggal lahir */

$tanggal_lahir = !empty($penduduk_meninggal['tanggal_lahir'])
    ? date(
        'd-m-Y',
        strtotime($penduduk_meninggal['tanggal_lahir'])
    )
    : '-';


/* ==========================================================
   JENIS KELAMIN
========================================================== */

$jenis_kelamin = '-';

if (!empty($penduduk_meninggal['jenis_kelamin'])) {

    if (
        strtoupper(
            trim(
                $penduduk_meninggal['jenis_kelamin']
            )
        ) == 'L'
    ) {

        $jenis_kelamin = 'Laki-laki';

    }

    elseif (
        strtoupper(
            trim(
                $penduduk_meninggal['jenis_kelamin']
            )
        ) == 'P'
    ) {

        $jenis_kelamin = 'Perempuan';

    }

    else {

        $jenis_kelamin =
            $penduduk_meninggal['jenis_kelamin'];

    }

}


/* ==========================================================
   AGAMA
========================================================== */

$agama = !empty($penduduk_meninggal['agama'])
    ? $penduduk_meninggal['agama']
    : '-';


/* ==========================================================
   PEKERJAAN
   TETAP DITAMPILKAN
   Jika kosong -> -
========================================================== */

$pekerjaan = !empty($penduduk_meninggal['pekerjaan'])
    ? $penduduk_meninggal['pekerjaan']
    : '-';


/* ==========================================================
   ALAMAT
   HANYA ALAMAT
   RT DAN RW TIDAK DITAMPILKAN
========================================================== */

$alamat = !empty($penduduk_meninggal['alamat'])
    ? $penduduk_meninggal['alamat']
    : '-';


/* ==========================================================
   DATA SURAT
========================================================== */

$nomor_surat = !empty($surat['nomor_surat'])
    ? $surat['nomor_surat']
    : '-';


/* ==========================================================
   TANGGAL SURAT
========================================================== */

$tanggal_surat = !empty($surat['tanggal_surat'])
    ? $surat['tanggal_surat']
    : date('Y-m-d');


/* ==========================================================
   BULAN INDONESIA
========================================================== */

$bulanIndonesia = [

    1  => 'Januari',
    2  => 'Februari',
    3  => 'Maret',
    4  => 'April',
    5  => 'Mei',
    6  => 'Juni',
    7  => 'Juli',
    8  => 'Agustus',
    9  => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'

];


/* ==========================================================
   FORMAT TANGGAL SURAT
========================================================== */

$tanggal_ttd = date(
    'j',
    strtotime($tanggal_surat)
)
. ' '
. $bulanIndonesia[
    (int) date(
        'n',
        strtotime($tanggal_surat)
    )
]
. ' '
. date(
    'Y',
    strtotime($tanggal_surat)
);


/* ==========================================================
   TANGGAL MENINGGAL
   DIAMBIL DARI DATA ISI SURAT
========================================================== */

$tanggal_meninggal = '-';

if (
    !empty($isi_surat)
    &&
    !empty($isi_surat['tanggal_meninggal'])
) {

    $tanggal_meninggal =
        date(
            'j',
            strtotime(
                $isi_surat['tanggal_meninggal']
            )
        )
        . ' '
        . $bulanIndonesia[
            (int) date(
                'n',
                strtotime(
                    $isi_surat['tanggal_meninggal']
                )
            )
        ]
        . ' '
        . date(
            'Y',
            strtotime(
                $isi_surat['tanggal_meninggal']
            )
        );

}


/* ==========================================================
   PENYEBAB MENINGGAL
========================================================== */

$penyebab_meninggal = '-';

if (
    !empty($isi_surat)
    &&
    !empty($isi_surat['penyebab_meninggal'])
) {

    $penyebab_meninggal =
        $isi_surat['penyebab_meninggal'];

}


/* ==========================================================
   KELIAN DINAS
========================================================== */

$kelian_dinas = 'Kelian Dinas Br. Dangin Jalan';

if (
    !empty($isi_surat)
    &&
    !empty($isi_surat['kelian_dinas'])
) {

    $kelian_dinas =
        $isi_surat['kelian_dinas'];

}


/* ==========================================================
   KETERANGAN TAMBAHAN
========================================================== */

$keterangan_meninggal = '';

if (
    !empty($isi_surat)
    &&
    !empty($isi_surat['keterangan_meninggal'])
) {

    $keterangan_meninggal =
        $isi_surat['keterangan_meninggal'];

}


/* ==========================================================
   KEPERLUAN SURAT
========================================================== */

$keperluan_meninggal = '';

if (
    !empty($isi_surat)
    &&
    !empty($isi_surat['keperluan_meninggal'])
) {

    $keperluan_meninggal =
        $isi_surat['keperluan_meninggal'];

}


/* ==========================================================
   KOP SURAT
========================================================== */

$kop_surat = '';

if (
    !empty($logoDesa)
    &&
    !empty($logoDesa['kop_surat'])
) {

    $kop_surat =
        $logoDesa['kop_surat'];

}


/* ==========================================================
   NAMA KEPALA DESA
========================================================== */

$nama_kepala_desa = '-';

if (!empty($kepala_desa)) {

    if (is_object($kepala_desa)) {

        if (
            !empty(
                $kepala_desa->nama_kepala_desa
            )
        ) {

            $nama_kepala_desa =
                $kepala_desa->nama_kepala_desa;

        }

    }

    elseif (is_array($kepala_desa)) {

        if (
            !empty(
                $kepala_desa['nama_kepala_desa']
            )
        ) {

            $nama_kepala_desa =
                $kepala_desa['nama_kepala_desa'];

        }

    }

}

?>


<div class="surat">


    <!-- =====================================================
         KOP SURAT
    ===================================================== -->

    <?php if (!empty($kop_surat)): ?>

        <div class="kop-surat">

            <img
                src="<?= base_url($kop_surat); ?>"
                alt="Kop Surat Desa Kelating"
            >

        </div>

        <div class="garis-kop"></div>

    <?php endif; ?>



    <!-- =====================================================
         JUDUL
    ===================================================== -->

    <div class="judul">

        <h2>
            SURAT KETERANGAN MENINGGAL
        </h2>

    </div>


    <div class="nomor">

        Nomor :
        <?= html_escape($nomor_surat); ?>

    </div>



    <!-- =====================================================
         PEMBUKA
    ===================================================== -->

    <p class="paragraf">

        Yang bertanda tangan dibawah ini Perbekel Desa Kelating,
        Kecamatan Kerambitan, Kabupaten Tabanan, menerangkan bahwa:

    </p>



    <!-- =====================================================
         DATA ORANG MENINGGAL
    ===================================================== -->

    <table class="data-penduduk">


        <!-- NAMA -->

        <tr>

            <td class="label">
                N a m a
            </td>

            <td class="titik">
                :
            </td>

            <td class="nilai">

                <?= html_escape($nama); ?>

            </td>

        </tr>



        <!-- NIK -->

        <tr>

            <td class="label">
                NIK
            </td>

            <td class="titik">
                :
            </td>

            <td class="nilai">

                <?= html_escape($nik); ?>

            </td>

        </tr>



        <!-- JENIS KELAMIN -->

        <tr>

            <td class="label">
                Jenis Kelamin
            </td>

            <td class="titik">
                :
            </td>

            <td class="nilai">

                <?= html_escape($jenis_kelamin); ?>

            </td>

        </tr>



        <!-- TEMPAT / TANGGAL LAHIR -->

        <tr>

            <td class="label">
                Tempat/Tgl Lahir
            </td>

            <td class="titik">
                :
            </td>

            <td class="nilai">

                <?= html_escape($tempat_lahir); ?>,
                <?= html_escape($tanggal_lahir); ?>

            </td>

        </tr>



        <!-- WARGA NEGARA / AGAMA -->

        <tr>

            <td class="label">
                Warga Negara/ Agama
            </td>

            <td class="titik">
                :
            </td>

            <td class="nilai">

                Indonesia /
                <?= html_escape($agama); ?>

            </td>

        </tr>



        <!-- PEKERJAAN -->

        <tr>

            <td class="label">
                Pekerjaan
            </td>

            <td class="titik">
                :
            </td>

            <td class="nilai">

                -

            </td>

        </tr>



        <!-- ALAMAT -->

        <tr>

            <td class="label">
                Alamat
            </td>

            <td class="titik">
                :
            </td>

            <td class="nilai">

                <?= nl2br(
                    html_escape($alamat)
                ); ?>

            </td>

        </tr>


    </table>



    <!-- =====================================================
         KETERANGAN MENINGGAL
    ===================================================== -->

    <div class="isi">

        <p>

            Berdasarkan keterangan Kelian Dinas
            <strong>
                <?= html_escape($kelian_dinas); ?>
            </strong>,
            Desa Kelating, Kecamatan Kerambitan, Kabupaten Tabanan
            dan berdasarkan pengamatan kami memang benar yang tersebut
            di atas telah meninggal pada tanggal :

            <strong>
                <?= html_escape($tanggal_meninggal); ?>
            </strong>

            karena

            <strong>
                <?= html_escape($penyebab_meninggal); ?>
            </strong>.

            <?php if (!empty($keterangan_meninggal)): ?>

                <?= html_escape($keterangan_meninggal); ?>

            <?php endif; ?>

        </p>


        <!-- =================================================
             PENUTUP
        ================================================== -->

        <p>

            Demikian surat keterangan ini dibuat dengan sebenarnya
            agar dapat dipergunakan

            <?php if (!empty($keperluan_meninggal)): ?>

                <strong>
                    <?= html_escape($keperluan_meninggal); ?>
                </strong>

            <?php else: ?>

                <strong>
                    dimana diperlukan
                </strong>

            <?php endif; ?>.

        </p>

    </div>



    <!-- =====================================================
         TANDA TANGAN
    ===================================================== -->

    <div class="ttd">

        <div class="ttd-kanan">


            <div class="tempat">

                Kelating,
                <?= html_escape($tanggal_ttd); ?>

            </div>


            <div class="jabatan">

                Perbekel Desa Kelating,

            </div>


            <div class="ttd-space"></div>


            <div class="ttd-nama">

                <?= html_escape($nama_kepala_desa); ?>

            </div>


        </div>

    </div>



    <!-- =====================================================
         TOMBOL
    ===================================================== -->

    <div class="tombol">

        <button
            onclick="window.print();"
            class="btn btn-print">

            Cetak Surat

        </button>


        <a
            href="<?= base_url(
                'surat/surat_admin/detail/'
                . $surat['id']
            ); ?>"
            class="btn btn-back">

            Kembali

        </a>

    </div>


</div>


</body>

</html> 