<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Data Penduduk</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size:12px;
        }

        h2,h4{
            text-align:center;
            margin:0;
        }

        hr{
            border:1px solid #000;
            margin:10px 0 20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:5px;
            font-size:11px;
        }

        table th{
            background:#f2f2f2;
            text-align:center;
        }

        td{
            vertical-align:middle;
        }

        .text-center{
            text-align:center;
        }

        .text-right{
            text-align:right;
        }

    </style>

</head>

<body onload="window.print()">

    <h2>PEMERINTAH DESA KELATING</h2>
    <h4>DATA PENDUDUK</h4>

    <hr>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>RT/RW</th>
                <th>Agama</th>
                <th>Pekerjaan</th>
                <th>Status</th>

            </tr>

        </thead>

        <tbody>

        <?php if(empty($penduduk)): ?>

            <tr>
                <td colspan="11" class="text-center">
                    Tidak ada data.
                </td>
            </tr>

        <?php else: ?>

            <?php $no=1; ?>

            <?php foreach($penduduk as $p): ?>

                <?php
                    $umur = date_diff(
                        date_create($p['tanggal_lahir']),
                        date_create('today')
                    )->y;
                ?>

                <tr>

                    <td class="text-center"><?= $no++; ?></td>

                    <td><?= $p['nik']; ?></td>

                    <td><?= $p['nama_lengkap']; ?></td>

                    <td>
                        <?= $p['tempat_lahir']; ?>,
                        <?= date('d-m-Y', strtotime($p['tanggal_lahir'])); ?>
                    </td>

                    <td class="text-center">
                        <?= $umur; ?> Tahun
                    </td>

                    <td class="text-center">
                        <?= ($p['jenis_kelamin']=='L') ? 'L' : 'P'; ?>
                    </td>

                    <td><?= $p['alamat']; ?></td>

                    <td class="text-center">
                        <?= $p['rt']; ?>/<?= $p['rw']; ?>
                    </td>

                    <td><?= $p['agama']; ?></td>

                    <td><?= $p['pekerjaan']; ?></td>

                    <td><?= $p['status_perkawinan']; ?></td>

                </tr>

            <?php endforeach; ?>

        <?php endif; ?>

        </tbody>

    </table>

    <br><br>

    <table style="border:none; width:100%;">

        <tr style="border:none;">

            <td style="border:none;"></td>

            <td style="border:none; width:250px; text-align:center;">

                Kelating,
                <?= date('d-m-Y'); ?>

                <br><br>

                Perbekel Desa Kelating

                <br><br><br><br><br>

                <strong>
                    _______________________
                </strong>

            </td>

        </tr>

    </table>

</body>
</html>