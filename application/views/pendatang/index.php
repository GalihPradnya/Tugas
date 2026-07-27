<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Data Penduduk Pendatang
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">

            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Pendatang
            </h6>

            <a href="<?= base_url('pendatang/pendatang/tambah'); ?>"
               class="btn btn-primary btn-sm">

                <i class="fas fa-plus"></i>
                Tambah Pendatang

            </a>

        </div>

        <div class="card-body">

            <!-- Filter -->
            <div class="row mb-3">

                <div class="col-md-4">

                    <label><strong>Filter Alamat Tinggal</strong></label>

                    <select id="filterAlamat" class="form-control">

                        <option value="">Semua Alamat</option>

                        <?php
                        $alamat = [];

                        foreach($pendatang as $p){

                            if(!in_array($p['alamat_tinggal'],$alamat)){

                                $alamat[] = $p['alamat_tinggal'];

                                echo '<option value="'.$p['alamat_tinggal'].'">'.$p['alamat_tinggal'].'</option>';

                            }

                        }
                        ?>

                    </select>

                </div>

                <div class="col-md-2 d-flex align-items-end">

                    <button class="btn btn-danger btn-block"
                            id="btnCetakAlamat">

                        <i class="fas fa-print"></i>
                        Cetak

                    </button>

                </div>

            </div>

            <div class="table-responsive">

                <table id="tablePendatang"
                       class="table table-bordered table-striped"
                       width="100%">

                    <thead class="thead-light">

                    <tr>

                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>JK</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Pekerjaan</th>
                        <th>Alamat Asal</th>
                        <th>Alamat Tinggal</th>
                        <th>Tanggal Datang</th>
                        <th>Tempat Tinggal</th>
                        <th>Lama Tinggal</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>

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

                            <td>
                                <?= !empty($p['tanggal_lahir']) ? date('d-m-Y',strtotime($p['tanggal_lahir'])) : '-'; ?>
                            </td>

                            <td>
                                <?= $p['jenis_kelamin']=='L' ? 'Laki-laki' : 'Perempuan'; ?>
                            </td>

                            <td><?= $p['nomor_hp']; ?></td>

                            <td>
                                <?= !empty($p['email']) ? $p['email'] : '-'; ?>
                            </td>

                            <td><?= $p['pekerjaan']; ?></td>

                            <td><?= $p['alamat_asal']; ?></td>

                            <td><?= $p['alamat_tinggal']; ?></td>

                            <td>
                                <?= !empty($p['tanggal_datang']) ? date('d-m-Y',strtotime($p['tanggal_datang'])) : '-'; ?>
                            </td>

                            <td><?= $p['tempat_tinggal']; ?></td>

                            <td><?= $p['lama_tinggal']; ?></td>

                            <td><?= $p['keterangan']; ?></td>

                            <td>

                                <?php if($p['status']=="Aktif"): ?>

                                    <span class="badge badge-success">
                                        Aktif
                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-secondary">
                                        Selesai
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>
                                <?= date('d-m-Y',strtotime($p['created_at'])); ?>
                            </td>

                            <td class="text-nowrap">

                                <a href="<?= base_url('pendatang/pendatang/edit/'.$p['id']); ?>"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <a href="<?= base_url('pendatang/pendatang/hapus/'.$p['id']); ?>"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')"
                                   class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash"></i>

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<style>

.table-responsive{
    overflow-x:auto;
}

.table{
    white-space:nowrap;
}

</style>

<script>

document.getElementById('btnCetakAlamat').addEventListener('click',function(){

    let alamat = document.getElementById('filterAlamat').value;

    if(alamat==''){

        window.open("<?= base_url('pendatang/pendatang/cetak'); ?>","_blank");

    }else{

        window.open("<?= base_url('pendatang/pendatang/cetakAlamat/'); ?>"+encodeURIComponent(alamat),"_blank");

    }

});

</script>