<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Penduduk Pendatang</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size:12px;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:6px;
            font-size:11px;
            vertical-align:top;
        }

        table th{
            background:#eee;
        }

    </style>

</head>

<body onload="window.print()">

<h2>DATA PENDUDUK PENDATANG</h2>

<table>

    <thead>

    <tr>

        <th>No</th>
        <th>NIK</th>
        <th>Nama Lengkap</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Alamat Asal</th>
        <th>Alamat Tinggal</th>
        <th>No HP</th>
        <th>Pekerjaan</th>
        <th>Asal Daerah</th>
        <th>Status</th>

    </tr>

    </thead>

    <tbody>

    <?php $no=1; ?>

    <?php foreach($pendatang as $p): ?>

    <tr>

        <td><?= $no++; ?></td>

        <td><?= $p['nik']; ?></td>

        <td><?= $p['nama_lengkap']; ?></td>

        <td><?= $p['tempat_lahir']; ?></td>

        <td><?= date('d-m-Y',strtotime($p['tanggal_lahir'])); ?></td>

        <td><?= $p['jenis_kelamin']=='L' ? 'Laki-laki' : 'Perempuan'; ?></td>

        <td><?= $p['alamat_asal']; ?></td>

        <td><?= $p['alamat_tinggal']; ?></td>

        <td><?= $p['nomor_hp']; ?></td>

        <td><?= $p['pekerjaan']; ?></td>

        <td><?= $p['asal_daerah']; ?></td>

        <td><?= $p['status']; ?></td>

    </tr>

    <?php endforeach; ?>

    </tbody>

</table>

</body>
</html>