<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>
        <?= html_escape($pengajuan['nama_surat']); ?>
    </title>


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
        ====================================================== */

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


        /* GARIS BAWAH KOP */

        .garis-kop {
            border-bottom: 3px solid #000;

            margin-top: 2mm;
            margin-bottom: 8mm;

            width: 100%;
        }



        /* =====================================================
           JUDUL
        ====================================================== */

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
        ====================================================== */

        .paragraf {
            text-align: justify;

            margin-top: 0;
            margin-bottom: 15px;

            text-indent: 12mm;
        }



        /* =====================================================
           DATA PEMOHON
        ====================================================== */

        .data-pemohon {
            width: 100%;

            border-collapse: collapse;

            margin-bottom: 18px;

            margin-left: 12mm;
        }


        .data-pemohon td {
            vertical-align: top;

            padding: 1px 0;
        }


        .data-pemohon .label {
            width: 42mm;

            white-space: nowrap;
        }


        .data-pemohon .titik {
            width: 7mm;

            text-align: left;
        }


        .data-pemohon .nilai {
            width: auto;

            padding-right: 5mm;
        }



        /* =====================================================
           ISI KETERANGAN ALIAS
        ====================================================== */

        .isi-alias {
            text-align: justify;

            margin-top: 10px;

            margin-bottom: 15px;

            text-indent: 12mm;
        }


        .isi-alias p {
            margin: 0 0 15px 0;
        }



        /* =====================================================
           TANDA TANGAN
        ====================================================== */

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
        ====================================================== */

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
        ====================================================== */

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
   DATA PEMOHON
========================================================== */

$nama = !empty($pengajuan['nama_lengkap'])
    ? $pengajuan['nama_lengkap']
    : '-';


$nik = !empty($pengajuan['nik'])
    ? $pengajuan['nik']
    : '-';


$tempat_lahir = !empty($pengajuan['tempat_lahir'])
    ? $pengajuan['tempat_lahir']
    : '-';


$tanggal_lahir = !empty($pengajuan['tanggal_lahir'])
    ? date(
        'd-m-Y',
        strtotime($pengajuan['tanggal_lahir'])
    )
    : '-';



/* ==========================================================
   JENIS KELAMIN
========================================================== */

$jenis_kelamin = '-';


if (!empty($pengajuan['jenis_kelamin'])) {

    if ($pengajuan['jenis_kelamin'] == 'L') {

        $jenis_kelamin = 'Laki-laki';

    } elseif ($pengajuan['jenis_kelamin'] == 'P') {

        $jenis_kelamin = 'Perempuan';

    } else {

        $jenis_kelamin =
            $pengajuan['jenis_kelamin'];

    }

}



/* ==========================================================
   DATA LAIN
========================================================== */

$pekerjaan = !empty($pengajuan['pekerjaan'])
    ? $pengajuan['pekerjaan']
    : '-';


$alamat = !empty($pengajuan['alamat'])
    ? $pengajuan['alamat']
    : '-';



/* ==========================================================
   DATA SURAT
========================================================== */

$nomor_surat = !empty($surat['nomor_surat'])
    ? $surat['nomor_surat']
    : '-';


$tanggal_surat = !empty($surat['tanggal_surat'])
    ? date(
        'd-m-Y',
        strtotime($surat['tanggal_surat'])
    )
    : date('d-m-Y');



/* ==========================================================
   DATA KOP SURAT
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
   DATA DETAIL SURAT
========================================================== */

$nama_lama = '';

$nama_baru = '';

$keterangan = '';


if (!empty($isi_surat)) {

    $nama_lama =
        !empty($isi_surat['nama_lama'])
        ? $isi_surat['nama_lama']
        : '';


    $nama_baru =
        !empty($isi_surat['nama_baru'])
        ? $isi_surat['nama_baru']
        : '';


    $keterangan =
        !empty($isi_surat['keterangan'])
        ? $isi_surat['keterangan']
        : '';

}



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


$tanggal_ttd = !empty($surat['tanggal_surat'])
    ? date('j', strtotime($surat['tanggal_surat']))
      . ' '
      . $bulanIndonesia[
            (int) date(
                'n',
                strtotime($surat['tanggal_surat'])
            )
        ]
      . ' '
      . date(
            'Y',
            strtotime($surat['tanggal_surat'])
        )
    : '-';

?>


<div class="surat">


    <!-- =====================================================
         KOP SURAT
    ====================================================== -->

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
    ====================================================== -->

    <div class="judul">

        <h2>

            SURAT KETERANGAN ALIAS

        </h2>

    </div>


    <div class="nomor">

        Nomor :
        <?= html_escape($nomor_surat); ?>

    </div>



    <!-- =====================================================
         PEMBUKA
    ====================================================== -->

    <p class="paragraf">

        Yang bertanda tangan dibawah ini Perbekel Desa Kelating,
        Kecamatan Kerambitan, Kabupaten Tabanan, menerangkan bahwa:

    </p>



    <!-- =====================================================
         DATA PEMOHON
    ====================================================== -->

    <table class="data-pemohon">


        <tr>

            <td class="label">
                Nama
            </td>

            <td class="titik">
                :
            </td>

            <td class="nilai">

                <?= html_escape($nama); ?>

            </td>

        </tr>


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


        <tr>

            <td class="label">
                Tempat, Tgl Lahir
            </td>

            <td class="titik">
                :
            </td>

            <td class="nilai">

                <?= html_escape($tempat_lahir); ?>,
                <?= html_escape($tanggal_lahir); ?>

            </td>

        </tr>


        <tr>

            <td class="label">
                Pekerjaan
            </td>

            <td class="titik">
                :
            </td>

            <td class="nilai">

                <?= html_escape($pekerjaan); ?>

            </td>

        </tr>


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
         ISI ALIAS
    ====================================================== -->

    <div class="isi-alias">


        <p>

            Memang benar nama yang tercantum dalam KTP adalah

            <strong>
                <?= html_escape(
                    $nama_lama
                ); ?>
            </strong>

            sedangkan nama yang tercantum dalam BPJS
            Ketenagakerjaan bernama

            <strong>
                <?= html_escape(
                    $nama_baru
                ); ?>
            </strong>

            dimana orangnya satu.

            <?php if (!empty($keterangan)): ?>

                <?= html_escape(
                    $keterangan
                ); ?>

            <?php endif; ?>

        </p>


        <p>

            Demikian surat keterangan ini dibuat dengan sebenarnya
            agar dapat dipergunakan sebagai pelengkap Administrasi
            BPJS Ketenagakerjaan.

        </p>


    </div>



    <!-- =====================================================
         TANDA TANGAN
    ====================================================== -->

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

                I MADE SUARGA, SH

            </div>


        </div>


    </div>



    <!-- =====================================================
         TOMBOL
    ====================================================== -->

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