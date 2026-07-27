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
            background:#eeeeee;
            text-align:center;
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
        <th>Email</th>
        <th>Pekerjaan</th>
        <th>Tanggal Datang</th>
        <th>Tempat Tinggal</th>
        <th>Lama Tinggal</th>
        <th>Keterangan</th>
        <th>Status</th>

    </tr>

    </thead>

    <tbody>

    <?php $no = 1; ?>

    <?php foreach($pendatang as $p): ?>

    <tr>

        <td><?= $no++; ?></td>

        <td><?= $p['nik']; ?></td>

        <td><?= $p['nama_lengkap']; ?></td>

        <td><?= $p['tempat_lahir']; ?></td>

        <td>
            <?= !empty($p['tanggal_lahir']) ? date('d-m-Y', strtotime($p['tanggal_lahir'])) : '-'; ?>
        </td>

        <td>
            <?= $p['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?>
        </td>

        <td><?= $p['alamat_asal']; ?></td>

        <td><?= $p['alamat_tinggal']; ?></td>

        <td><?= $p['nomor_hp']; ?></td>
        <td>
            <?= !empty($p['email']) ? $p['email'] : '-'; ?>
        </td>

        <td><?= $p['pekerjaan']; ?></td>

        <td>
            <?= !empty($p['tanggal_datang']) ? date('d-m-Y', strtotime($p['tanggal_datang'])) : '-'; ?>
        </td>

        <td><?= $p['tempat_tinggal']; ?></td>

        <td><?= $p['lama_tinggal']; ?></td>

        <td><?= $p['keterangan']; ?></td>

        <td><?= $p['status']; ?></td>

    </tr>

    <?php endforeach; ?>

    </tbody>

</table>

</body>
</html>