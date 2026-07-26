<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Data Penduduk Berdasarkan Umur</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size:14px;
        }

        h2,h4{
            text-align:center;
            margin:0;
        }

        p{
            text-align:center;
            margin-top:5px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:8px;
            text-align:left;
        }

        table th{
            background:#f2f2f2;
            text-align:center;
        }

        @media print{
            .no-print{
                display:none;
            }
        }

    </style>

</head>
<body>

<h2>PEMERINTAH DESA KELATING</h2>
<h4>DATA PENDUDUK BERDASARKAN UMUR</h4>

<p>
Tanggal Cetak :
<?= date('d-m-Y H:i'); ?>
</p>

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
            <th>Pekerjaan</th>
        </tr>

    </thead>

    <tbody>

    <?php if(empty($penduduk)): ?>

        <tr>
            <td colspan="8" style="text-align:center;">
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

                <td style="text-align:center;">
                    <?= $no++; ?>
                </td>

                <td>
                    <?= $p['nik']; ?>
                </td>

                <td>
                    <?= $p['nama_lengkap']; ?>
                </td>

                <td>
                    <?= $p['tempat_lahir']; ?>,
                    <?= date('d-m-Y',strtotime($p['tanggal_lahir'])); ?>
                </td>

                <td style="text-align:center;">
                    <?= $umur; ?> Tahun
                </td>

                <td>
                    <?= ($p['jenis_kelamin']=='L')
                        ? 'Laki-laki'
                        : 'Perempuan'; ?>
                </td>

                <td>
                    <?= $p['alamat']; ?>
                </td>

                <td>
                    <?= $p['pekerjaan']; ?>
                </td>

            </tr>

        <?php endforeach; ?>

    <?php endif; ?>

    </tbody>

</table>

<script>
window.print();
</script>

</body>
</html>